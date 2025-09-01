@extends('layouts.dashboard')

@section('title', 'Edit Doctors')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/add_doctor.css" />
@endpush

@section('content')
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Edit Doctors</h1>
            <div class="user-info">
                <span>Dr. Sarah Johnson</span>
                <button class="logout-btn">
                    <span>🚪</span>
                    Logout
                </button>
            </div>
        </div>

        <form action="{{ route('doctors.update', $doctor) }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter Doctor's name" value="{{ $doctor->user->name }}"/>
            </div>

            <div class="form-group">
                <label for="specialization" class="form-label">Specialization</label>
                <input type="text" name="specialization" class="form-input" placeholder="Enter Doctor's specialization" value="{{ $doctor->specialization }}"/>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter Doctor's email" value="{{ $doctor->user->email }}"/>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-input" placeholder="Enter Doctor's phone" value="{{ $doctor->phone }}"/>
            </div>
            
            <div class="form-group">
                <label for="photo" class="form-label">Image</label>
                <input type="file" name="photo" class="form-input" placeholder="Enter Doctor's image" />
            </div>
            
            <button type="submit" class="login-btn">Edit</button>
        </form>
    </main>
@endsection