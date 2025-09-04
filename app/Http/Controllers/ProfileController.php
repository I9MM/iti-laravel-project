<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:users,phone,' . $user->id],
            'photo' => 'nullable|image',
        ]);

        $request->validate([
            'password' => 'nullable|confirmed|min:8',
            'specialization' => 'sometimes|required',
        ]);

        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $validated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName);
            $validated['photo'] = $photo;
        }

        $user->update($validated);
        
        if ($request->filled('specialization') && $user->role === 'doctor') {
            $user->specialization->update(['name' => $request->specialization]);
        }

        if (isset($request->password) && !empty($request->password)) {
            $user->update(['password' => $request->password]);
        }

        return redirect()->route('profile.index');
    }
}
