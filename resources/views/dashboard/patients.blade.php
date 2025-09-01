@extends('layouts.dashboard')

@section('title', 'Patients Dashboard')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
@endpush

@section('content')
    <main class="main-content">
        <div class="header">
            <h1 class="page-title">Patients</h1>
            <div class="user-info">
                <span>Dr. Sarah Johnson</span>
                <button class="logout-btn" id="logout-btn">
                    <span>🚪</span>
                    Logout
                </button>
            </div>
        </div>

        <div class="table-container">
            <table class="doctors-table" id="doctorsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->user->name }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->user->email }}</td>
                            <td> <img src="/{{ $patient->photo }}" alt="" srcset=""> </td>
                            <td>Actions</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.getElementById("edit-btn").addEventListener("click", function() {
            window.location.href = "edit.html";
        });
        document.getElementById("logout-btn").addEventListener("click", function() {
            window.location.href = "../login.html";
        });
    </script>
@endpush
