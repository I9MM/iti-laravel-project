@extends('layouts.app')

@section('title', 'DocPlace')

@push('styles')
    <link rel="stylesheet" href="/css/index.css" />
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
            <buttin class="third-section-button" id="learn-more-btn"><a href="#">Learn More About Us</a></buttin>
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
            <div class="doctor-card">
                <image src="/assets/images/doctor1.jpg" alt="doctor image" />
                <h3>Dr. Sarah Johnson</h3>
                <p>Cardiologist</p>
                <div><span>⭐</span>4.9 (127)</div>
                <div><span>📍</span>Medical Center East</div>
                <div>
                    <button class="fourth-section-button" id="doctor-btn">
                        <a href="./appointment.html">Book appointment</a>
                    </button>
                </div>
            </div>
            <div class="doctor-card">
                <image src="/assets/images/doctor2.jpg" alt="doctor image" />
                <h3>Dr. Michael Chen</h3>
                <p>Neurologist</p>
                <div><span>⭐</span>4.8 (98)</div>
                <div><span>📍</span>Downtown Clinic</div>
                <div>
                    <button class="fourth-section-button" id="doctor-btn">
                        <a href="./appointment.html">Book appointment</a>
                    </button>
                </div>
            </div>
            <div class="doctor-card">
                <image src="/assets/images/doctor3.jpg" alt="doctor image" />
                <h3>Dr. Emily Rodriguez</h3>
                <p>Dariatricion</p>
                <div><span>⭐</span>4.9 (156)</div>
                <div><span>📍</span>Children's Hospital</div>
                <div>
                    <button class="fourth-section-button" id="doctor-btn">
                        <a href="./appointment.html">Book appointment</a>
                    </button>
                </div>
            </div>
            <div class="doctor-card">
                <image src="/assets/images/doctor4.jpg" alt="doctor image" />
                <h3>Dr. David Kim</h3>
                <p>Dermatologist</p>
                <div><span>⭐</span>4.7 (89)</div>
                <div><span>📍</span>Skin Care Center</div>
                <div>
                    <button class="fourth-section-button" id="doctor-btn">
                        <a href="./appointment.html">Book appointment</a>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="fourth-section-after">
        <button class="fourth-section-button-after" id="find-doctor-btn">
            <a href="./find_doctors.html">Find Doctors</a>
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

    <div class="middle-section">
        <h2>
            Read stories from our<span class="highlight"> happy patients</span>
        </h2>
        <p>
            See what our patients say about their experience with our healthcare
            services
        </p>
    </div>

    <div class="faq-container">
        <div class="faq-container-card">
            <h3>How do book an appointment?</h3>
            <p>
                You can book an appointment by calling our office directly, using our
                online booking system on our website, or by visiting us in person.
            </p>
        </div>
        <div class="faq-container-card">
            <h3>What should bring to my appointment?</h3>
            <p>
                Please bring a valid photo ID, your insurance card (if applicable), a
                list of current medications, and any relevant medical records or
                previous test results.
            </p>
        </div>
        <div class="faq-container-card">
            <h3>Do vou accept insurance?</h3>
            <p>
                We accept most major insurance plans. Please contact our office with
                your insurance information to verify coverage and benefits.
            </p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById("sign-up-btn").addEventListener("click", function() {
            window.location.href = "signup.html";
        });
        document.getElementById("login-btn").addEventListener("click", function() {
            window.location.href = "login.html";
        });
        document.getElementById("learn-more-btn").addEventListener("click", function() {
            window.location.href = "about_us.html";
        });
        document.getElementById("doctor-btn").addEventListener("click", function() {
            window.location.href = "find_doctors.html";
        });
        document.getElementById("find-doctor-btn").addEventListener("click", function() {
            window.location.href = "find_doctors.html";
        });
        const book = document.querySelectorAll('#doctor-btn');
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
