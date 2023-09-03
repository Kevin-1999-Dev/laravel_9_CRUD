<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credantial = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($credantial)){
            return redirect()->route('item#index');
        }else{
            return back()->with('message','Login details are not valid.');
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('auth#loginPage')->with('logout','Logout Successfully...');
    }

}
