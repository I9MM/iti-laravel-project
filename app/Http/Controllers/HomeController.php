<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $doctors = User::where('role', 'doctor')->with('specialization')
                        ->inRandomOrder()
                        ->take(4)
                        ->get();
        return view('index', compact('doctors'));
    }
}
