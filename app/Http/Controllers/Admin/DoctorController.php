<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index() {
        $doctors = User::where('role', 'doctor')->with('specialization')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create() {
        return view('admin.doctors.create');
    }

    public function store(Request $request) {
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:users,phone'],
            'photo' => 'nullable|image',
        ]);
        $userValidated['role'] = 'doctor';

        $request->validate([
            'specialization' => 'required',
        ]);

        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $userValidated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName, 'public');
            $userValidated['photo'] = $photo;
        }
        
        $user = User::create($userValidated);
        $specializationValidated['user_id'] = $user->id;
        $specializationValidated['name'] = $request->specialization;
        $specialization = Specialization::create($specializationValidated);
        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor Added Successfuly');
    }

    public function edit(User $doctor) {
        $doctor->load('specialization');
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, User $doctor) {
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $doctor->id],
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:users,phone,' . $doctor->id],
            'photo' => 'nullable|image',
        ]);
        $userValidated['role'] = 'doctor';

        $request->validate([
            'specialization' => 'required',
        ]);

        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $userValidated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName, 'public');
            $userValidated['photo'] = $photo;
        }

        $doctor->update($userValidated);
        $doctor->specialization->update(['name' => $request->specialization]);
        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor Edited Successfuly');
    }

    public function destroy(User $doctor) {
        if (!empty($doctor->photo) && Storage::disk('public')->exists($doctor->photo)) {
            Storage::disk('public')->delete($doctor->photo);
            if (empty(Storage::disk('public')->files('images'))) {
                Storage::disk('public')->deleteDirectory('images');
            }
        }
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor Deleted Successfuly');
    }

    public function showdoc() {
        $doctors = User::where('role', 'doctor')->with('specialization')->get();
        return view('find_doctors', compact('doctors'));
    }
}
