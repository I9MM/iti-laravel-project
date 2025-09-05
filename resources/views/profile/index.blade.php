@extends(Auth::user()->role !== 'patient' ? 'layouts.dashboard' : 'layouts.app')

@section('title', 'My Profile')

@push('styles')
    <style>
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .profile-photo {
            flex: 1 1 250px;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .profile-photo img {
            height: 160px;
            width: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #2196f3;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .profile-details {
            flex: 2 1 500px;
            padding: 30px;
        }

        .profile-details h2 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #222;
        }

        .profile-details p {
            margin: 10px 0;
            font-size: 15px;
            line-height: 1.6;
        }

        .profile-details strong {
            display: inline-block;
            width: 140px;
            color: #444;
        }

        .profile-actions {
            margin-top: 20px;
        }

        .profile-actions .edit-btn {
            background: #2196f3;
            color: #fff;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background 0.2s ease-in-out;
        }

        .profile-actions .edit-btn:hover {
            background: #1976d2;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                text-align: center;
            }

            .profile-photo {
                padding: 20px;
            }

            .profile-details {
                padding: 20px;
            }

            .profile-details strong {
                width: auto;
                display: block;
                margin-bottom: 5px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="main-content" style="{{ Auth::user()->role === 'patient' ? 'margin: 100px 20px' : '' }}">
        @if (Auth::user()->role !== 'patient')
            <!-- Header -->
            <div class="header">
                <h1 class="page-title">My Profile</h1>
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
        @else
            <div class="head" style="text-align: center">
                <h1>My Profile</h1>
            </div>
        @endif
        <div class="profile-container">
            <!-- Profile Photo -->
            @php
                $photoPath =
                    $user->photo && Storage::disk('public')->exists($user->photo)
                        ? asset('storage/' . $user->photo)
                        : asset('assets/images/default.png');
            @endphp
            <div class="profile-photo">
                <img src="{{ $photoPath }}" alt="Profile Photo">
            </div>

            <!-- Profile Details -->
            <div class="profile-details">
                <h2>{{ $user->name }}</h2>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>

                @if ($user->role === 'doctor' && $user->specialization)
                    <p><strong>Specialization:</strong> {{ $user->specialization->name }}</p>
                @endif

                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                <div class="profile-actions">
                    <a href="{{ route('profile.edit') }}" class="edit-btn">✏️ Edit Profile</a>
                </div>
            </div>
        </div>
    </main>
@endsection
