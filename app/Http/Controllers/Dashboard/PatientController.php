<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::with('user')->get();
        return view('dashboard.patients', compact('patients'));
    }
}
