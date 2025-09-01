@extends('layouts.dashboard')

@section('title', 'Users Dashboard')

@push('styles')
    <link rel="stylesheet" href="/css/Dashboard/doctors.css" />
@endpush

@section('content')
    <main class="main-content">
        <div class="header">
            <h1 class="page-title">Users</h1>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    <tr>
                        <td>1</td>
                        <td>Dr. John Smith</td>
                        <td>01234567891</td>
                        <td>example@gmail.com</td>
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
            window.location.href = "edit.html";
        });
        document.getElementById("logout-btn").addEventListener("click", function() {
            window.location.href = "../login.html";
        });
    </script>
@endpush