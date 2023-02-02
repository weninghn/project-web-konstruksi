<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }

        return redirect('admin.login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
