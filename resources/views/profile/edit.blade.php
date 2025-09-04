@extends(Auth::user()->role !== 'patient' ? 'layouts.dashboard' : 'layouts.app')

@section('title', 'Edit Doctors')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/add_doctor.css" />
@endpush

@section('content')
    <main class="main-content" style = "{{ Auth::user()->role === 'patient' ? 'margin: 100px 250px' : '' }}">
        @if (Auth::user()->role !== 'patient')
            <!-- Header -->
            <div class="header">
                <h1 class="page-title">Edit Profile</h1>
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
        @else
            <div class="head">
                <h1>Edit Profile</h1>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter Doctor's name"
                    value="{{ $user->name }}" />
            </div>

            @if ($user->role === 'doctor')
                <div class="form-group">
                    <label for="specialization" class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-input"
                        placeholder="Enter Doctor's specialization" value="{{ $user->specialization->name }}" />
                </div>
            @endif

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter email"
                    value="{{ $user->email }}" />
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-input" placeholder="Enter phone"
                    value="{{ $user->phone }}" />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Enter password" />
            </div>

            <div class="form-group">
                <label for="photo" class="form-label">Image</label>
                <input type="file" name="photo" class="form-input" placeholder="Enter image" />
            </div>

            <button type="submit" class="login-btn">Edit</button>
        </form>
    </main>
@endsection
