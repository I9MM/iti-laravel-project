@extends('layouts.app')

@section('title', 'Find a Doctor')

@push('styles')
    <link rel="stylesheet" href="/css/find_doctors.css" />
@endpush

@section('content')
    <section class="find-doctors">
        <div class="container">
            <h2 class="title">Find and Book Your <span>Doctor</span></h2>
            <p class="subtitle">
                Search for the right specialist based on your location and need.
            </p>

            <div class="filters">
                <select class="filter-input">
                    <option>Select Specialty</option>
                    <option>Cardiologist</option>
                    <option>Neurologist</option>
                    <option>Pediatrician</option>
                    <option>Dermatologist</option>
                </select>
                <button class="search-btn">Search Doctors</button>
            </div>

            <div class="doctors-list">
                <!-- Examples -->
                <div class="doctor-card">
                    <img src="/assets/images/doctor.jpg" alt="Dr. Sarah Johnson" class="doctor-img" />
                    <h3>Dr. Sarah Johnson</h3>
                    <p class="specialty">Cardiologist</p>
                    <p class="rating">⭐ 4.9 (127 reviews)</p>
                    <p class="location">Medical Center East</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor2.jpg" alt="Dr. yosif sayed" class="doctor-img" />
                    <h3>Dr. Michael Chen</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor6.jpg" alt="Dr. Ahmed Ali" class="doctor-img" />
                    <h3>Dr. ali ahmed </h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor4.jpg" alt="Dr. Ahmed Ali" class="doctor-img" />
                    <h3>Dr. David Kim</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor3.jpg" alt="Dr. Sarah mohamed" class="doctor-img" />
                    <h3>Dr. Emily Rodriguez</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor5.jpg" alt="Dr. ibrahim mohamed" class="doctor-img" />
                    <h3>Dr.ibrahim Mohamed</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor7.jpg" alt="Dr. Ashraf alI" class="doctor-img" />
                    <h3>Dr. Sama Mohamed</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

                <div class="doctor-card">
                    <img src="/assets/images/doctor8.jpg" alt="Dr. hager Ahmed" class="doctor-img" />
                    <h3>Dr. hager Ahmed</h3>
                    <p class="specialty">Pediatrician</p>
                    <p class="rating">⭐ 4.7 (85 reviews)</p>
                    <p class="location">HealthCare West</p>
                    <button class="book-btn"><a href="./appointment.html">Book Appointment</a></button>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById("login-btn").addEventListener("click", function() {
            window.location.href = "login.html";
        });
        document.getElementById("sign-up-btn").addEventListener("click", function() {
            window.location.href = "signup.html";
        });
        const book = document.querySelectorAll('.book-btn');
        const names = document.querySelectorAll('h3');
        book.forEach(function(btn, index) {
            btn.addEventListener('click', function(e) {
                const doctorName = names[index].textContent;
                localStorage.setItem('selectedDoctor', doctorName);
                window.location.href = 'appointment.html';
            });
        });
    </script>
@endpush
