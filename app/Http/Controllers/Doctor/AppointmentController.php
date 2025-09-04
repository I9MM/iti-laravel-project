<?php

namespace  App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())->with(['doctor', 'patient'])->get();
        return view('doctor.appointments', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->doctor_id != Auth::id()) {
            return back()->with('error', 'You are not authorized to access this appointment.');
        }

        $status = $request->validate([
            'status' => ['required', 'in:pending,canceled,done'],
        ]);
        $appointment->update($status);
        return redirect()->route('doctor.appointments.index');
    }
}
