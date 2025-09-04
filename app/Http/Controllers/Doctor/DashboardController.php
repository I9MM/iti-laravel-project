<?php

namespace  App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('doctor.index', [
            'appointmentsCount' => Appointment::where('doctor_id', Auth::id())->count(),
            'recentAppointments' => Appointment::where('doctor_id', Auth::id())->with(['doctor', 'patient'])
                                               ->latest()
                                               ->take(5)
                                               ->get(),
        ]);
    }
}