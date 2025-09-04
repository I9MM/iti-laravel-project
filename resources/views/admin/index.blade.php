@extends('layouts.dashboard')

@section('title', 'Dashboard Overview')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/dashboard.css" />
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
@endpush

@section('content')
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Dashboard</h1>
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

        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-card">
                <h3>Total Doctors</h3>
                <p>{{ $doctorsCount }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Patients</h3>
                <p>{{ $patientsCount }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Appointments</h3>
                <p>{{ $appointmentsCount }}</p>
            </div>
        </div>

        <!-- Recent activity -->
        <div class="table-container">
            <h2>Recent Appointments</h2>
            <table class="doctors-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Appointment At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentAppointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->appointment_at }}</td>
                            <td>
                                <span class="status-badge {{ $appointment->status }}">
                                    {{ ucfirst($appointment->status) ?? '—' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
