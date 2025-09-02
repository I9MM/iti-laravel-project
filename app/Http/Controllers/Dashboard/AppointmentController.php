<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with(['doctor', 'patient'])->get();
        return view('admin.appointments', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment) {
        $status = $request->validate([
            'status' => ['required', 'in:pending,canceled,done'],
        ]);
        $appointment->update($status);
        return redirect()->route('admin.appointments.index');
    }
}
