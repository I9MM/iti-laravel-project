@extends('layouts.app')

@section('title', 'DocPlace')

@push('styles')
    <link rel="stylesheet" href="/css/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
    <section class="first-section">
        <div class="first-section-about">
            <h1>
                Feeling Better Starts Here.<br />
                <span class="highlight">Find and Book</span> Your Doctor.
            </h1>
            <p class="first-section-para">
                Connect with qualified healthcare professionals in your area.<br />
                Book appointments online and get the care you deserve.
            </p>
        </div>
        <div class="first-section-image">
            <img src="/assets/images/doctor.jpg" alt="Doctor image" />
        </div>
    </section>

    <section class="second-section">
        <div class="second-section-card">
            <div class="second-section-number">20K+</div>
            <div class="second-section-stat">Happy Patients</div>
            <div class="second-section-about">Trusted by thousands</div>
        </div>
        <div class="second-section-card">
            <div class="second-section-number">99%</div>
            <div class="second-section-stat">Patient Satisfaction</div>
            <div class="second-section-about">Excellent care rating</div>
        </div>
        <div class="second-section-card">
            <div class="second-section-number">3K+</div>
            <div class="second-section-stat">Qualified Doctors</div>
            <div class="second-section-about">Expert specialists</div>
        </div>
    </section>

    <section class="third-section">
        <div class="third-section-image">
            <img src="/assets/images/hospital.jpg" alt="clinic image" />
        </div>
        <div class="third-section-about">
            <h2>
                More than a clinic, <span class="highlight">It's a caring place</span>
            </h2>
            <p>
                We provide comprehensive healthcare services with a focus on
                compassionate care. Our team of experienced medical professionals is
                dedicated to helping you achieve optimal health and wellness.
            </p>
            <ul class="third-section-list">
                <li>Expert medical professionals</li>
                <li>State-of-the-art facilities</li>
                <li>Personalized care plans</li>
                <li>Emergency services available</li>
            </ul>
            <button class="third-section-button" id="learn-more-btn"><a href="{{ route('about_us') }}">Learn More About
                    Us</a></button>
        </div>
    </section>

    <div class="middle-section">
        <h2>Meet Our <span class="highlight">Featured Specialists</span></h2>
        <p>
            Our team of expert doctors provides specialized care across various
            medical fields
        </p>
    </div>

    <div class="fourth-section">
        <div class="fourth-section-card">
            @foreach ($doctors as $doctor)
                <div class="doctor-card">
                    <img src="{{ asset('storage/' . ($doctor->photo?? 'images/default.png')) }}" alt="{{ $doctor->name }}" class="doctor-img" />
                    <h3>{{ $doctor->name }}</h3>
                    <p class="specialty">{{ $doctor->specialization->name }}</p>
                    <button class="book-btn" onclick="bookAppointment({{ $doctor->id }})">
                        Book Appointment
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <div class="fourth-section-after">
        <button class="login-btn" id="find_doctor-btn" onclick="window.location.href='{{ route('find_doctors') }}'">
            Find Doctors
        </button>
    </div>

    <div class="middle-section">
        <h2>
            Read stories from our<span class="highlight"> happy patients</span>
        </h2>
        <p>
            See what our patients say about their experience with our healthcare
            services
        </p>
    </div>

    <div class="fifth-section">
        <div class="fifth-section-card">
            <div class="quote-mark">"</div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>
                "The care I received was exceptional. Dr. Johnson was thorough and
                took the time to explain everything. I felt heard and well cared for
                throughout my treatment."
            </p>
            <hr />
            <div class="patient-info">
                <div>
                    <img class="patient-img" src="/assets/images/patient1.jpg" alt="patient image" />
                </div>
                <div>
                    <h3>Sarah Mitchell</h3>
                    <p>patient</p>
                </div>
            </div>
        </div>

        <div class="fifth-section-card">
            <div class="quote-mark">"</div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>
                "The care I received was exceptional. Dr. Johnson was thorough and
                took the time to explain everything. I felt heard and well cared for
                throughout my treatment."
            </p>
            <hr />
            <div class="patient-info">
                <div>
                    <img class="patient-img" src="/assets/images/patient2.jpg" alt="patient image" />
                </div>
                <div>
                    <h3>John Davis</h3>
                    <p>patient</p>
                </div>
            </div>
        </div>
        <div class="fifth-section-card">
            <div class="quote-mark">"</div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>
                "The care I received was exceptional. Dr. Johnson was thorough and
                took the time to explain everything. I felt heard and well cared for
                throughout my treatment."
            </p>
            <hr />
            <div class="patient-info">
                <div>
                    <img class="patient-img" src="/assets/images/patient3.jpg" alt="patient image" />
                </div>
                <div>
                    <h3>Maria Garcia</h3>
                    <p>patient</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById("sign-up-btn").addEventListener("click", function() {
            window.location.href = "{{ route('signup') }}";
        });
        document.getElementById("login-btn").addEventListener("click", function() {
            window.location.href = "{{ route('login') }}";
        });
        document.getElementById("learn-more-btn").addEventListener("click", function() {
            window.location.href = "{{ route('about_us') }}";
        });
        document.getElementById("doctor-btn").addEventListener("click", function() {
            window.location.href = "{{ route('find_doctors') }}";
        });
        document.getElementById("find-doctor-btn").addEventListener("click", function() {
            window.location.href = "{{ route('find_doctors') }}";
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function bookAppointment(doctorId) {
            @if (!auth()->check())
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You Should login First!",
                    footer: '<a href="{{ route('home') }}">Ok</a>',
                    showConfirmButton: true,
                    confirmButtonText: 'Login',
                    timer: 10000,
                    timerProgressBar: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        window.location.href = "{{ route('home') }}";
                    }
                });
            @else
                window.location.href = "{{ route('appointment.create', ['doctor' => '']) }}" + doctorId;
            @endif
        }

        @if (session('success'))
            Swal.fire({
                title: "Appointment Booked Successfully!",
                icon: "success",
                draggable: true,
                confirmButtonColor: '#007bff'
            });
        @endif
    </script>
@endpush
