<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register (Request $request){
        //validate
        $fields = $request->validate([
            'firstname' => ['required','max:255'],
            'lastname' => ['required','max:255'],
            'email' => ['required',"max:255",'email','unique:users'],
            'password'=> ['required', 'min:8','confirmed']
        ]);
        //Creating user. Saving Data to the Database
        $user = User::create($fields);

        //Login
        Auth::login($user);

        //Redirect user to dashboard
        return redirect()->route('dashboard');
    }

    public function login (Request $request){
         $fields = $request->validate([
            'email' => ['required',"max:255",'email'],
            'password'=> ['required']
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }  
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
