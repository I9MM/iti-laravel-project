<?php

use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\DoctorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('index');
});

Route::get('/dashboard/patients', [PatientController::class, 'index'])->name('patients.index');


Route::get('/dashboard/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/dashboard/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/dashboard/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::delete('/dashboard/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
Route::get('/dashboard/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/dashboard/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');