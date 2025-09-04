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
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif
            <table class="doctors-table" id="doctorsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->id }}</td>
                            <td> <img src="{{ asset('/storage/' . ($doctor->photo?? 'images/default.png')) }}" alt="" srcset=""
                                    style="height: 50px; width: 50px; object-fit: cover; object-position: center; border-radius: 4px;"> </td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->specialization->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->phone ?? 'Not Available' }}</td>
                            <td>
                                <a class="btn btn-edit" href="{{ route('admin.doctors.edit', $doctor) }}">Edit</a>
                                <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
