<?php

use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
})->name('home');

Route::get('/about-us', function() {
    return view('about_us');
})->name('about_us');

Route::get('/contact-us', function() {
    return view('contact_us');
})->name('contact_us');


// login & signup
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/find-doctors', [DoctorController::class, 'showdoc'])->name('find_doctors');

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', function() {
        return view('profile');
    })->name('profile');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/patients', [PatientController::class, 'index'])->name('patients.index');


    Route::get('/dashboard/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/dashboard/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/dashboard/doctors', [DoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/dashboard/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
    Route::get('/dashboard/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/dashboard/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');


    Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
});
