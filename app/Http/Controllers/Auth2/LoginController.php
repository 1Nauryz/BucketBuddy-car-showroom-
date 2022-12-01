<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('cars.index');
    }
    public function create(){
        return view('auth.login');
    }
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended('/cars');
        }
        $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        if(Auth::attempt($validated)){
            if(Auth::user()->role->name == "admin" or Auth::user()->role->name == "editor")
                return redirect()->intended('/adm/users');
            return redirect()->route('cars.index');
        }
        return back()->withErrors('Incorrect email or password');
    }
}
