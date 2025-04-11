<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        return redirect()->route('dashboard')->with('success', 'Welcome form Trading Journal web app!');
    }

    public function login(Request $request){
        //Validate
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($formData)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Welcome Back!');
        }

        return redirect()->back()->with('error', 'Email or password invalid');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function updateAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $user = Auth::user();

        //delete old avatar if exists
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)){
            Storage::disk('public')->delete($user->avatar);
        }

        //store new image
        $path = $request->file('avatar')->store('avatars', 'public');

        //update in db
        $user->update([
            'avatar' => $path
        ]);

        return redirect()->back()->with('success', 'Avatar updated successfully');
    }

    public function updateBalance(Request $request){

        $formData = $request->validate([
            'balance' => 'required|numeric|max:1000000',
        ]);

        $user = Auth::user();

        $user->update([
            'balance' => $formData['balance']
        ]);

        return redirect()->back()->with('success', 'Balance updated successfully');
    }
}
