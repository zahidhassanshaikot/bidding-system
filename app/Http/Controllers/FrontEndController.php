<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Role;
use App\User;

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
        return view('front-end.dashboard');
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
        return view('front-end.all-product');
    }
    public function allOrder(){
        return view('front-end.all-order');
    }
    public function monthlySellProduct(){
        return view('front-end.monthly-sell-product');
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

    
}
