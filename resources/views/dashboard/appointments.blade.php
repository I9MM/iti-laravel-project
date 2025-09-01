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
                        <th>Doctor Id</th>
                        <th>User Id</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    <tr>
                        <td>12</td>
                        <td>10</td>
                        <td>sunday,10 A.M.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('scrips')
    <script>
        document.getElementById("logout-btn").addEventListener("click", function() {
            window.location.href = "../login.html";
        });
    </script>
@endpush
