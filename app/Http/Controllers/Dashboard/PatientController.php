<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        $patients = User::where('role', 'patient')->get();
        return view('admin.patients', compact('patients'));
    }
}
