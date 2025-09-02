@extends('layouts.dashboard')

@section('title', 'Appointments Dashboard')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
@endpush

@section('content')
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Appointments</h1>
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
        <div class="table-container">
            <table class="doctors-table" id="doctorsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Appointment At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    @foreach ($appointments as $appointment)
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
                            <td>
                                <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    <button type="submit" name="status" value="done" class="btn btn-done">
                                        Done
                                    </button>

                                    <button type="submit" name="status" value="pending" class="btn btn-pending">
                                        Pending
                                    </button>

                                    <button type="submit" name="status" value="canceled" class="btn btn-canceled">
                                        Canceled
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection