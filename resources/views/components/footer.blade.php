<footer class="footer">
      <div class="footer-top">
        <div class="footer-card">
          <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">D</div>
            <span class="logo-footer">DocPlace</span>
          </a>
          <p>
            Your trusted healthcare partner providing quality<br />
            medical services with compassionate <br />care for over 15 years.
          </p>
          <div>
            <a><img src="{{ asset('assets/images/facebook.png') }}" /></a>
            <a><img src="{{ asset('assets/images/twitter.png') }}" /></a>
            <a><img src="{{ asset('assets/images/instagram.png') }}" /></a>
            <a><img src="{{ asset('assets/images/linkedin.png') }}" /></a>
          </div>
        </div>
        <div class="footer-card">
          <h3>Quick Links</h3>
          <ul class="footer-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('find_doctors') }}">Find Doctors</a></li>
            <li><a href="{{ route('about_us') }}">About</a></li>
            <li><a href="{{ route('contact_us') }}">Contact</a></li>
          </ul>
        </div>
        <div class="footer-card">
          <h3>Contact Us</h3>
          <p>+1 (555) 123-4567</p>
          <p>info@docplace.com</p>
          <p>
            123 Medical Center Drive<br />
            Healthcare City, HC 12345
          </p>
          <p>Mon - Fri: 8:00 AM - 6:00 PM</p>
        </div>
      </div>
      <hr />
      <div class="footer-bottom">
        <div class="footer-bottom-left">
          <p>© 2024 DocPlace. All rights reserved.</p>
        </div>
        <div class="footer-bottom-right">
          <p>Privacy Policy</p>
          <p>Terms of Service</p>
          <p>HIPAA Notice</p>
        </div>
      </div>
    </footer>