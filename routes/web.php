<?php

use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;


Route::get('/', function () {
    return view('index');
})->name('home');


Route::middleware(['auth', 'isAdmin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('index');

    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');


    Route::get('/appoitments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appoitments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

    Route::controller(DoctorController::class)->group(function () {
        Route::get('/doctors', 'index')->name('doctors.index');
        Route::get('/doctors/create', 'create')->name('doctors.create');
        Route::post('/doctors', 'store')->name('doctors.store');
        Route::delete('/doctors/{doctor}', 'destroy')->name('doctors.destroy');
        Route::get('/doctors/{doctor}/edit', 'edit')->name('doctors.edit');
        Route::put('/doctors/{doctor}', 'update')->name('doctors.update');
    });
});





// login & signup

Route::get('/signup', [App\Http\Controllers\Auth\SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\SignupController::class, 'signup'])->name('signup.submit');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// --
Route::get('/find-doctors', [App\Http\Controllers\Dashboard\DoctorController::class, 'showdoc'])->name('find_doctors');
Route::get('/appointment/create', [App\Http\Controllers\AppointmentController::class, 'create'])
    ->middleware('auth')
    ->name('appointment.create');

Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])
    ->middleware('auth')
    ->name('appointment.store');
