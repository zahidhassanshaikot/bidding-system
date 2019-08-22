<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;

use App\RegisterCourse;
use DB;
use File;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('front-end.index');
    }
    public function registration(){
        return view('front-end.register');
    }
    public function userLogin(){
        return view('front-end.login');
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
