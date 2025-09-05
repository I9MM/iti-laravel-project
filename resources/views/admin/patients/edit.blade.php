@extends('layouts.dashboard')

@section('title', 'Edit Patient')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/add_doctor.css" />
@endpush

@section('content')
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Edit Patient</h1>
            <div class="user-info">
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline">
                    @csrf
                    <button class="logout-btn" type="submit">
                        <span>🚪</span>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 16px 0;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.patients.update', $patient) }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter patient's name" value="{{ old('name', $patient->name) }}" required/>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter patient's email" value="{{ old('email', $patient->email) }}" required/>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-input" placeholder="Enter patient's phone" value="{{ old('phone', $patient->phone ?? '') }}"/>
            </div>

            <div class="form-group">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-input" />
            </div>

            <button type="submit" class="login-btn">Save</button>
            <a href="{{ route('admin.patients.index') }}" class="btn btn-cancel" style="margin-left:12px; display:inline-block; padding:10px 16px; background:#f2f2f2; border-radius:6px; color:#333; text-decoration:none;">Cancel</a>
        </form>
    </main>
@endsection

@push('scripts')
@endpush