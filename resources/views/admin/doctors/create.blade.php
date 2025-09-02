@extends('layouts.dashboard')

@section('title', 'Add Doctor')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/add_doctor.css" />
@endpush

@section('content')
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Add Doctors</h1>
            <div class="user-info">
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }} " method="POST" style="display: inline">
                    @csrf
                    <button class="logout-btn" type="submit">
                        <span>🚪</span>
                        Logout
                    </button>
                </form>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.doctors.store') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter Doctor's name" />
            </div>

            <div class="form-group">
                <label for="specialization" class="form-label">Specialization</label>
                <input type="text" name="specialization" class="form-input" placeholder="Enter Doctor's specialization" />
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter Doctor's email" />
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-input" placeholder="Enter Doctor's phone" />
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter password" />
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">Image</label>
                <input type="file" name="photo" class="form-input" placeholder="Enter Doctor's image" />
            </div>

            <button type="submit" class="login-btn">Add</button>
        </form>
    </main>
@endsection

@push('scrips')
    <script>
        document.getElementById("logout-btn").addEventListener("click", function() {
            window.location.href = "../login.html";
        });
    </script>
@endpush
