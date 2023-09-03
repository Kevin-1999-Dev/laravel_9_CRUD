<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            echo "Error";
        }
    }

}
