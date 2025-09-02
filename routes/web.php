<?php

use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;


Route::get('/', function() {
    return view('index');
})->name('home');



Route::get('/dashboard', DashboardController::class)->name('dashboard');


Route::get('/dashboard/patients', [PatientController::class, 'index'])->name('patients.index');


Route::get('/dashboard/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/dashboard/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/dashboard/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::delete('/dashboard/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
Route::get('/dashboard/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/dashboard/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');


// login & signup

Route::get('/signup', [App\Http\Controllers\Auth\SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\SignupController::class, 'signup'])->name('signup.submit');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');

// --
Route::get('/find-doctors', [App\Http\Controllers\Dashboard\DoctorController::class, 'showdoc'])->name('find_doctors');
Route::get('/appointment/create', [App\Http\Controllers\AppointmentController::class, 'create'])
    ->middleware('auth')
    ->name('appointment.create');

Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])
    ->middleware('auth')
    ->name('appointment.store');