<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>signup</title>
    <link rel="stylesheet" href="{{ asset('css/login_signup.css') }}" />
  </head>
  <body>
    <div class="login-container">
      <div class="login-container-left">
        <a href="#html" class="logo">
          <div class="logo-icon">D</div>
          DocPlace
        </a>

        <div class="login-form">
          <h1 class="login-title">Create Your Account</h1>
          <p class="login-subtitle">
            Join DocPlace and start your healthcare journey
          </p>

          @if ($errors->any())
              <div style="background: #ffe5e5; border: 1px solid #ff4d4d; color: #b30000; padding: 16px; border-radius: 8px; margin-bottom: 20px; font-size: 15px;">
                  <ul style="list-style: none; margin: 0; padding: 0;">
                      @foreach ($errors->all() as $error)
                          <li style="margin-bottom: 8px; display: flex; align-items: center;">
                              <span style="font-weight: bold; margin-right: 8px;">&#9888;</span> <!-- warning icon -->
                              {{ $error }}
                          </li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form method="POST" action="{{ route('signup.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input
                type="name"
                name="name"
                class="form-input"
                placeholder="Enter your name"
              />
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                name="email"
                class="form-input"
                placeholder="Enter your email"
              />
            </div>

            <div class="form-group">
              <label for="phone" class="form-label">Phone</label>
              <input
                type="phone"
                name="phone"
                class="form-input"
                placeholder="Enter your phone"
              />
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                name="password"
                class="form-input"
                placeholder="Enter your password"
              />
            </div>
            <div class="form-group">
              <label for="confirm-password" class="form-label">Confirm Password</label>
              <input
                type="password"
                name="password_confirmation"
                class="form-input"
                placeholder="Enter your confirm-password"
              />
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-input" accept="image/*" />
            </div>

            <button type="submit" class="login-btn">Create Account</button>
          </form>

          <div class="switch-form">Already have an account? <a href="{{ route('login') }}">Log In</a></div>
        </div>
      </div>

      <div class="login-container-right">
        <h2>Join Thousands of Satisfied Patients</h2>
        <p>
          Experience world-class healthcare with our network of certified
          professionals and cutting-edge medical facilities.
        </p>
        <ul class="feature-list">
          <li>24/7 online appointment booking</li>
          <li>Secure medical records access</li>
          <li>Telemedicine consultations</li>
          <li>Prescription management</li>
          <li>Health tracking & reminders</li>
        </ul>
      </div>
    </div>
  </body>
</html>
