@extends('layouts.app')

@section('title', 'About Us')

@push('styles')
    <link rel="stylesheet" href="/css/about_us.css" />
@endpush

@section('content')
    <section class="first-section">
        <div class="first-section-about">
            <h1>
                More than a clinic, it's a<br />
                <span class="highlight">caring place</span>
            </h1>
            <p class="first-section-para">
                We provide comprehensive healthcare services with a focus<br />
                on compassionate care. Our team of experienced medical
                <br />professionals is dedicated to helping you achieve optimal
                <br />health and wellness.
            </p>
            <p class="first-section-para">
                ounded with the mission to make quality healthcare <br />accessible
                and convenient, we combine expert medical care <br />with modern
                technology to serve our community better.
            </p>
        </div>
        <div class="first-section-image">
            <img src="/assets/images/hospital.jpg" alt="Doctor image" />
        </div>
    </section>

    <div class="middle-section">
        <h2>Why Choose DocPlace?</h2>
        <p>Committed to excellence in healthcare delivery</p>
    </div>

    <section class="second-section">
        <div class="second-section-container">
            <div class="second-section-values">
                <div class="second-section-cards">
                    <h3>
                        <span class="cards-value">✓</span>Expert Medical Professionals
                    </h3>
                    <p>
                        Board-certified physicians and specialists dedicated to patient
                        care
                    </p>
                </div>
                <div class="second-section-cards">
                    <h3>
                        <span class="cards-value">✓</span>State-of-the-art Facilities
                    </h3>
                    <p>
                        Modern equipment and comfortable environment for optimal care
                    </p>
                </div>
                <div class="second-section-cards">
                    <h3>
                        <span class="cards-value">✓</span>Personalized Care Plans
                    </h3>
                    <p>
                        Customized treatment approaches for individual patient needs
                    </p>
                </div>
                <div class="second-section-cards">
                    <h3>
                        <span class="cards-value">✓</span>Emergency Services Available
                    </h3>
                    <p>
                        24/7 emergency care when you need it most
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="third-section">
        <h2>Ready to Experience Better Healthcare?</h2>
        <p>Join thousands of satisfied patients who trust DocPlace</p>
        <a href="./find_doctors.html" class="third-section-btn">Find Doctor</a>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById("sign-up-btn").addEventListener("click", function() {
            window.location.href = "signup.html";
        });
        document.getElementById("login-btn").addEventListener("click", function() {
            window.location.href = "login.html";
        });
    </script>
@endpush
