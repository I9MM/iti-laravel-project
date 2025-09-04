<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('role', 'patient')->get();
        return view('admin.patients', compact('patients'));
    }

    public function edit(User $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, User $patient)
    {
        $userValidated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $patient->id],
            'phone' => ['nullable', 'regex:/^(010|011|012|015)\d{8}$/', 'unique:users,phone,' . $patient->id],
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo')) {
            if (!empty($patient->photo) && Storage::disk('public')->exists($patient->photo)) {
                Storage::disk('public')->delete($patient->photo);
            }
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoName = $userValidated['email'] . '.' . $ext;
            $photo = $request->file('photo')->storeAs('images', $photoName, 'public');
            $userValidated['photo'] = $photo;
        }

        $patient->update($userValidated);

        return redirect()->route('admin.patients.index')->with('msg', 'Patient Edited Successfully');
    }

    public function destroy(User $patient)
    {
        if (!empty($patient->photo) && Storage::disk('public')->exists($patient->photo)) {
            Storage::disk('public')->delete($patient->photo);
            if (empty(Storage::disk('public')->files('images'))) {
                Storage::disk('public')->deleteDirectory('images');
            }
        }

        $patient->delete();

        return redirect()->route('admin.patients.index')->with('msg', 'Patient Deleted Successfully');
    }
}
