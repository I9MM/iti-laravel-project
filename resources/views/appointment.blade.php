@extends('layouts.app')

@section('title', 'Appointment')

@push('styles')
    <link rel="stylesheet" href="/css/appointment.css" />
@endpush

@section('content')
    <div class="container">
        <div class="head">
            <a href="{{ route('find_doctors') }}" class="back-button"> ← Back </a>
            <h1>Book Appointment</h1>
            <p>Schedule your visit with our specialist</p>
        </div>

        @if ($errors->any())
            <div style="background: #ffe5e5; border: 1px solid #ff4d4d; color: #b30000; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="list-style: none; margin: 0; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li style="margin-bottom: 8px; display: flex; align-items: center;">
                            <span style="font-weight: bold; margin-right: 8px;">&#9888;</span>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="doctor-info">
            <div class="doctor-name">{{ $doctor->name }}</div>
        </div>
        <div class="form-section">
            <form id="appointment_form" method="POST" action="{{ route('appointment.store') }}">
                @csrf
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <input type="hidden" name="patient_id" value="{{ auth()->user()->id }}">

                <div class="date-time-row">
                    <div class="form-group">
                        <label for="appointmentDate">Preferred Date</label>
                        <input type="date" id="appointmentDate" name="appointmentDate" value="{{ old('appointmentDate') }}" min="{{ date('Y-m-d') }}" max="9999-12-31" required />
                    </div>
                    <div class="form-group">
                        <label for="appointmentTime">Preferred Time</label>
                        <select id="appointmentTime" name="appointmentTime" required>
                            <option value="">Select a time</option>
                            <option value="09:00" {{ old('appointmentTime') == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                            <option value="09:30" {{ old('appointmentTime') == '09:30' ? 'selected' : '' }}>9:30 AM</option>
                            <option value="10:00" {{ old('appointmentTime') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                            <option value="10:30" {{ old('appointmentTime') == '10:30' ? 'selected' : '' }}>10:30 AM</option>
                            <option value="11:00" {{ old('appointmentTime') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                            <option value="11:30" {{ old('appointmentTime') == '11:30' ? 'selected' : '' }}>11:30 AM</option>
                            <option value="14:00" {{ old('appointmentTime') == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                            <option value="14:30" {{ old('appointmentTime') == '14:30' ? 'selected' : '' }}>2:30 PM</option>
                            <option value="15:00" {{ old('appointmentTime') == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                            <option value="15:30" {{ old('appointmentTime') == '15:30' ? 'selected' : '' }}>3:30 PM</option>
                            <option value="16:00" {{ old('appointmentTime') == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                            <option value="16:30" {{ old('appointmentTime') == '16:30' ? 'selected' : '' }}>4:30 PM</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-button">Book Appointment</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        @if(session('login_required'))
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
        @endif
    </script>
@endpush
