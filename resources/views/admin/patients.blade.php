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

        <div class="table-container">
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif

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
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->phone ?? 'Not Available' }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>
                                <img src="{{ $patient->photo ? asset('storage/' . $patient->photo) : asset('assets/images/default.png') }}"
                                     alt=""
                                     style="height: 50px; width: 50px; object-fit: cover; object-position: center; border-radius: 4px;">
                            </td>
                            <td>
                                <a class="btn btn-edit" href="{{ route('admin.patients.edit', $patient) }}">Edit</a>
                                <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
