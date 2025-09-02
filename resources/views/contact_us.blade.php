@extends('layouts.app')

@section('title', 'Contact Us')

@push('styles')
    <link rel="stylesheet" href="/css/contact_us.css" />
@endpush

@section('content')
    <div class="contact-wrapper">
        <div class="contact-card">

            <div class="contact-left">
                <h2>📩 Contact Us</h2>
                <p class="sub">We'd love to hear from you!</p>

                <form>
                    <div class="form-group">
                        <label>Your Name <span>*</span></label>
                        <input type="text" placeholder="Full name" required />
                    </div>

                    <div class="form-group">
                        <label>Mobile Number <span>*</span></label>
                        <input type="text" placeholder="e.g. 0100 123 4567" required />
                    </div>

                    <div class="form-group">
                        <label>Email Address <span>*</span></label>
                        <input type="email" placeholder="example@email.com" required />
                    </div>

                    <div class="form-group">
                        <label>Comments <span>*</span></label>
                        <textarea rows="4" placeholder="Write your message..." required></textarea>
                    </div>

                    <button type="submit" class="btn-send">Send Message</button>
                </form>
            </div>

            <div class="contact-right">
                <h3>📞 Call Us</h3>
                <p><strong>16676</strong> — regular call rate</p>
                <p><strong>From outside Egypt:</strong> +2 02 259 83 999</p>

                <h3>📍 Address</h3>
                <p>124 Othman Ibn Affan St. behind Military College – Heliopolis</p>

                <h3>📧 Mail Us</h3>
                <p>customercare@medico.com</p>

                <div class="social">
                    <a href="#"><img src="{{ asset('assets/images/facbook.png') }}" alt="Facebook" /></a>
                    <a href="#"><img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram" /></a>
                    <a href="#"><img src="{{ asset('assets/images/twitter.png') }}" alt="Twitter" /></a>
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
    </script>
@endpush
