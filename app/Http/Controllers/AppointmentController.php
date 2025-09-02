<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        if (!$request->doctor) {
            return redirect()->route('find_doctors')->withErrors(['doctor' => 'Please select a doctor first.']);
        }
        $doctor = User::where('role', 'doctor')->find($request->doctor);
        if (!$doctor) {
            return redirect()->route('find_doctors')->withErrors(['doctor' => 'Doctor not found.']);
        }

        if (!auth()->check()) {
            return view('appointment', compact('doctor'))->with('login_required', true);
        }

        return view('appointment', compact('doctor'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('find_doctors')->withErrors(['login' => 'You must be logged in to book an appointment.']);
        }

        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'appointmentDate' => 'required|date|after_or_equal:today|before_or_equal:9999-12-31',
            'appointmentTime' => 'required|string',
        ]);

        $appointmentDateTime = $request->appointmentDate . ' ' . $request->appointmentTime;

        $year = date('Y', strtotime($appointmentDateTime));
        if ($year > 9999) {
            return redirect()->back()->withErrors(['appointmentDate' => 'Invalid date. Year must be 9999 or less.']);
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_at' => $appointmentDateTime,
            'status' => 'pending',
        ]);

        return redirect()->route('find_doctors')->with('success', 'Appointment Booked Successfully');
    }
}
