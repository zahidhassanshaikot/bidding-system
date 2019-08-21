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

    
}
