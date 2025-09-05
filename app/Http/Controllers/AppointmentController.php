<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $maxDate = Carbon::now()->addYears(2)->toDateString();

        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'appointmentDate' => "required|date|after_or_equal:today|before_or_equal:$maxDate",
            'appointmentTime' => 'required|string',
        ]);

        $appointmentDateTime = $request->appointmentDate . ' ' . $request->appointmentTime;

        $maxDateTime = Carbon::now()->addYears(2)->endOfDay();
        $selected = Carbon::parse($appointmentDateTime);
        if ($selected->gt($maxDateTime)) {
            return redirect()->back()->withErrors(['appointmentDate' => 'Invalid date. Appointment must be within 2 years from today.'])->withInput();
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_at' => $appointmentDateTime,
            'status' => 'pending',
        ]);

        return redirect()->route('find_doctors')->with('success', 'Appointment Booked Successfully');
    }

    public function userAppointments()
    {
        $user = Auth::user();

        $appointments = Appointment::where('patient_id', $user->id)
            ->with(['doctor', 'patient']) 
            ->orderBy('appointment_at', 'desc')
            ->get();

        return view('myAppointments', compact('appointments'));
    }
}
