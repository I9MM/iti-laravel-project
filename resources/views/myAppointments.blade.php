@extends('layouts.app')

@section('title', 'Appointment')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
    <link rel="stylesheet" href="/css/appointment.css" />
@endpush

@section('content')
    <div class="container" style="max-width: 1000px">
        <div class="head">
            <h1>My Appointments</h1>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
