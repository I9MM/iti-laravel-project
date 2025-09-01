<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index() {
        $doctors = Doctor::with('user')->get();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create() {
        return view('dashboard.doctors.create');
    }

    public function store(Request $request) {
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $doctorVlaidated = $request->validate([
            'specialization' => 'required',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:doctors,phone'],
            'photo' => 'nullable|image',
        ]);

        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $userValidated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName);
            $doctorVlaidated['photo'] = $photo;
        }
        
        $user = User::create($userValidated);
        $doctorVlaidated['user_id'] = $user->id;
        $doctor = Doctor::create($doctorVlaidated);
        return redirect()->route('doctors.index')->with('msg', 'Doctor Added Successfuly');
    }

    public function edit(Doctor $doctor) {
        $doctor->load('user');
        return view('dashboard.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor) {
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users,email,' . $doctor->user->id],
        ]);

        $doctorVlaidated = $request->validate([
            'specialization' => 'required',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:doctors,phone,' . $doctor->id],
            'photo' => 'nullable|image',
        ]);

        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $userValidated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName);
            $doctorVlaidated['photo'] = $photo;
        }

        $doctor->user->update($userValidated);
        $doctor->update($doctorVlaidated);
        return redirect()->route('doctors.index')->with('msg', 'Doctor Edited Successfuly');
    }

    public function destroy(Doctor $doctor) {
        if (!empty($doctor->photo) && Storage::exists($doctor->photo)) {
            Storage::delete($doctor->photo);
            if (empty(Storage::files('images'))) {
                Storage::deleteDirectory('images');
            }
        }
        $doctor->user->delete();
        return redirect()->route('doctors.index')->with('msg', 'Doctor Deleted Successfuly');
    }
}
