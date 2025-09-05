@extends('layouts.app')

@section('title', 'Find a Doctor')

@push('styles')
    <link rel="stylesheet" href="/css/find_doctors.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
    <section class="find-doctors">
        <div class="container">
            <h2 class="title">Find and Book Your <span>Doctor</span></h2>

            <div class="doctors-list">
                @foreach($doctors as $doctor)
                    <div class="doctor-card">
                        <img src="{{ $doctor->photo ? asset('storage/' . $doctor->photo) : asset('assets/images/default.png') }}" alt="{{ $doctor->name }}" class="doctor-img" />
                        <h3>{{ $doctor->name }}</h3>
                        <p class="specialty">{{ $doctor->specialization->name }}</p>
                        <button class="book-btn" onclick="bookAppointment({{ $doctor->id }})">
                            Book Appointment
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function bookAppointment(doctorId) {
            @if(!auth()->check())
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You Should login First!",
                    footer: '<a href="{{ route('find_doctors') }}">Ok</a>',
                    showConfirmButton: true,
                    confirmButtonText: 'Login',
                    timer: 10000,
                    timerProgressBar: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        window.location.href = "{{ route('find_doctors') }}";
                    }
                });
            @else
                window.location.href = "{{ route('appointment.create', ['doctor' => '']) }}" + doctorId;
            @endif
        }

        @if(session('success'))
            Swal.fire({
                title: "Appointment Booked Successfully!",
                icon: "success",
                draggable: true,
                confirmButtonColor: '#007bff'
            });
        @endif
    </script>
@endpush
