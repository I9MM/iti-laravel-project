<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// login & signup
Route::middleware('guest')->group(function () {
    Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('notAdminOrDoctor')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::get('/about-us', function () {
        return view('about_us');
    })->name('about_us');

    Route::get('/contact-us', function () {
        return view('contact_us');
    })->name('contact_us');

    Route::get('/find-doctors', [AdminDoctorController::class, 'showdoc'])->name('find_doctors');

    Route::middleware(['auth'])->group(function () {
        Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::get('/my-appointments', [AppointmentController::class, 'userAppointments'])->name('user.appointments');
    });
});



// Admin Routes
Route::middleware(['auth', 'isAdmin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('index');

    Route::get('/patients', [AdminPatientController::class, 'index'])->name('patients.index');

    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/{appointment}', [AdminAppointmentController::class, 'update'])->name('appointments.update');

    Route::controller(AdminDoctorController::class)->group(function () {
        Route::get('/doctors', 'index')->name('doctors.index');
        Route::get('/doctors/create', 'create')->name('doctors.create');
        Route::post('/doctors', 'store')->name('doctors.store');
        Route::delete('/doctors/{doctor}', 'destroy')->name('doctors.destroy');
        Route::get('/doctors/{doctor}/edit', 'edit')->name('doctors.edit');
        Route::put('/doctors/{doctor}', 'update')->name('doctors.update');
    });
    Route::resource('patients', AdminPatientController::class)->only(['index','edit','update','destroy']);
});

Route::middleware(['auth', 'isDoctor'])->prefix('/doctor')->name('doctor.')->group(function () {
    Route::get('/', DoctorDashboardController::class)->name('index');
    Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/{appointment}', [DoctorAppointmentController::class, 'update'])->name('appointments.update');
});

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile.index');
    Route::get('/profile-edit', 'edit')->name('profile.edit');
    Route::put('/profile', 'update')->name('profile.update');
});