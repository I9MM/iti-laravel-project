<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Appointment;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('dashboard.index', [
            'doctorsCount' => User::where('role', 'doctor')->count(),
            'patientsCount' => User::where('role', 'patient')->count(),
            'appointmentsCount' => Appointment::count(),
            'recentAppointments' => Appointment::with(['doctor', 'patient'])
                                               ->latest()
                                               ->take(5)
                                               ->get(),
        ]);
    }
}