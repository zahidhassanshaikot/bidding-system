<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Role;
use App\User;
use Carbon\Carbon;
use DB;
use File;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FrontEndController extends Controller
{
    public function index(){
        $recent_prodcut=Product::orderBy('id','DESC')->take(3)->get();
        $pns=Product::where('p_type','Mobile Phone')->orderBy('id','DESC')->take(3)->get();
        $headphones=Product::where('p_type','Headphone')->orderBy('id','DESC')->take(3)->get();
        $pn_covers=Product::where('p_type','Phone Cover')->orderBy('id','DESC')->take(3)->get();
        // return $recent_prodcut;
        return view('front-end.index',[
            'recent_prodcut'=>$recent_prodcut,
            'pns'=>$pns,
            'headphones'=>$headphones,
            'pn_covers'=>$pn_covers,
        ]);
    }
    public function registration(){
        return view('front-end.register');
    }
    public function userLogin(){
        return view('front-end.login');
    }
    public function dashboard(){
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Buyer');
        })
        ->orderBy('users.created_at', 'desc')->get();
        return view('front-end.dashboard',[
            'users'=>$users
        ]);
    }
    public function removeUser($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message','Successfully remove user');
    }
    public function removeProduct($id){
        $product = Product::find($id);
        $bids=Bid::where('product_id',$id)->get();
        foreach($bids as $bid){
            $bid->delete();
        }
        if (File::exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();
        return redirect()->back()->with('message','Successfully remove product');
    }
    public function addProduct(){
        return view('front-end.add-product');
    }
    public function saveProductInfo(Request $request){
        // return $request;
        $this->validate($request, [
            'p_name' => 'required|max:100|min:2',
            'price' => 'required',
            'auction_id' => 'required',
            'auction_credit' => 'required',
            'bid_amount' => 'required',
            'last_date' => 'required',
            
        ]);
        $product=new Product();
        $product->p_name=$request->p_name;
        $product->price=$request->price;
        $product->auction_id=$request->auction_id;
        $product->auction_credit=$request->auction_credit;
        $product->bid_amount=$request->bid_amount;
        $product->last_date=$request->last_date;
        $product->description=$request->description;
        $product->p_type=$request->p_type;
        $product->user_id=Auth::user()->id;
        if ($request->file('image')) {
            $this->validate($request, [
                'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,png|max:2048',
            ]);
           
            $profilelogo = $request->file('image');
            $fileType = $profilelogo->getClientOriginalExtension();
            $imageName = date('YmdHis') . "image" . rand(1, 100) . '.' . $fileType;
            $directory = 'images/';
            $imageUrl = $directory . $imageName;
            Image::make($profilelogo)->save($imageUrl);
            $product->image = $imageUrl;
        }
        $product->save();
        return redirect()->back()->with('message','Info save sucessfully');
    }

    public function allProduct(){
        $user_id=Auth::user()->id;
        $product=Product::where('user_id',$user_id)->get();
        // return $product;
        return view('front-end.all-product',[
            'product'=>$product
        ]);
    }
    public function allOrder($id){
        $bids=Bid::where('product_id',$id)
        ->join('users','users.id','=','bid_info.bidder_id')
        ->join('product','product.id','=','bid_info.product_id')
        
        ->select('bid_info.*','product.p_name','product.price','product.auction_id','users.fname','users.lname','users.phone_no','users.email')
        ->orderBy('bid_info.bid_price','DESC')
        ->get();
        // return $bids;
        return view('front-end.all-order',['bids'=>$bids]);
    }
    public function bidStatus($status,$id){
        $bid=Bid::find($id);
        $bid->status=$status;
        $bid->save();
        return redirect()->back()->with('message','Bid status successfully changed');
    }
    public function monthlySellProduct(){
// $month=Carbon::now()->format('Y-m');
// return $month;
        $bids=Bid::where('status','Accept')
        ->whereMonth('bid_info.created_at',Carbon::now()->month)
        ->join('users','users.id','=','bid_info.bidder_id')
        ->join('product','product.id','=','bid_info.product_id') 
        ->select('bid_info.*','product.p_name','product.price','product.auction_id','users.fname','users.lname','users.phone_no','users.email')
        ->orderBy('bid_info.bid_price','DESC')
        ->get();
        return view('front-end.monthly-sell-product',['bids'=>$bids]);
    }
    public function singleProduct($id){
        $product=Product::find($id);
        
        return view('front-end.single-product',['product'=>$product]);
    }
    public function bidNow(Request $request ){
        
        $this->validate($request, [
            'bid_price' => 'required',
 
        ]);
        if(Auth::check()){
        $product=new Bid();
        $product->product_id=$request->p_id;
        $product->bidder_id=Auth::user()->id;
        $product->bid_price=$request->bid_price; 
        $product->save();
        return Redirect()->back()->with('message','Successfully bid');
    }else{
        return Redirect()->back()->with('message','Please login for bid');
    }
    }


    public function userReg( Request $request){
        $this->validate($request, [
            'fname' => 'required|max:30|min:2',
            'email' => 'email|unique:users,email|required',
            
            'password' => ['required',
                'min:6',
                'confirmed'],
            'password_confirmation' => 'required_with:password|same:password',
        ]);
// return $request;
        $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->phone_no = $request->phone_no; 
            $user->password = Hash::make($request->password);

            $user->save();
            $user->attachRole(Role::where('name', $request->answer)->first());
     
            Auth::login($user);
            return redirect('/');
    }

    public function searchProduct(Request $request){ 
        $prodcuts=Product::where('p_name','like','%'.$request->search_string.'%')
        ->orwhere('p_type','like','%'.$request->search_string.'%')->get(); 
        return view('front-end.product',['prodcuts'=>$prodcuts]);
    }
    public function searchDdl($search_string){ 
        $prodcuts=Product::where('p_type','like','%'.$search_string.'%')->get(); 
        return view('front-end.product',['prodcuts'=>$prodcuts]);
    }
}
