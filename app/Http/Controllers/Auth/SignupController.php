<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => [
                'required',
                'regex:/^(010|011|012|015)[0-9]{8}$/',
                'unique:users,phone'
            ],
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'email.unique' => 'This email is already registered.',
            'phone.regex' => 'Phone number must be Egyptian and start with 010, 011, 012, or 015 and contain 8 digits after.',
            'phone.unique' => 'This phone number is already registered.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->email . '.' . $ext;
            $imagePath = $request->file('image')->storeAs('users', $imageName,'public');
        }

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'patient',
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'photo' => $imagePath,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
