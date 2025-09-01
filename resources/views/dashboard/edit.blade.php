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

        <form novalidate>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-input" placeholder="Enter your name" />
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter your email" />
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-input" placeholder="Enter your phone" />
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter your password" />
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-input" placeholder="Enter your image" />
            </div>

            <button type="submit" class="login-btn">Edit</button>
        </form>
    </main>
@endsection