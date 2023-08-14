<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AuthController extends Controller
{
    
    public function index(){
        return view('auth/login');
    }  
    public function login(Request $req){
        $auth = Auth::attempt([
            "name" => $req->name , 
            "password" => $req->password
        ]);
        if(!$auth) {
            return redirect()->back()->with('danger','name or password incorrect');
        }
        return redirect()->route('admin.dashboard');  
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth/register');
    }  
}

