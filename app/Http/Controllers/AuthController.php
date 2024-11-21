<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function register (Request $request){
        
        $fields = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required',"max:255",'email','unique:users'],
            'password'=> ['required', 'min:8','confirmed']
        ]);
        
        $user = User::create($fields);

        
        Auth::login($user);

        event(new Registered($user));
        
        return redirect()->route('dashboard');
    }

    Public function verifyNotice() {
        return view('auth.verify-email');
    }

    Public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('/dashboard');
    }

    Public function verifySend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
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

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = auth()->user();

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Store the new image
            $path = $request->file('image')->store('images', 'public');
            $user->image = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}