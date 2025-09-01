@extends('layouts.dashboard')

@section('title', 'Doctors Dashboard')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
@endpush

@section('content')
    <main class="main-content">
        <div class="header">
            <h1 class="page-title">Doctors</h1>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="/images/doctor1.jpg" alt="Doctor Image" width="40" />
                        </td>
                        <td>Dr. John Smith</td>
                        <td>john@example.com</td>
                        <td>012343255</td>
                        <td>
                            <button class="btn btn-edit" id="edit-btn">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.getElementById("edit-btn").addEventListener("click", function() {
            window.location.href = "edit.html"; // Redirect to edit.html
        });
        document.getElementById("logout-btn").addEventListener("click", function() {
            window.location.href = "../login.html";
        });
    </script>
@endpush
