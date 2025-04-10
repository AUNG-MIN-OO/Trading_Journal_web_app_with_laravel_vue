<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class UserController extends Controller
{
    public function register(Request $request){
//      validate
        $formData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

//        register
        $user = User::create($formData);

//        login
        Auth::login($user);

//        redirect
        return redirect()->route('dashboard');
    }

    public function login(Request $request){
        //Validate
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($formData)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors();
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
