<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login_signup.css') }}" />
  </head>
  <body>
    <div class="login-container">
      <div class="login-container-left">
        <a href="#" class="logo">
          <div class="logo-icon">D</div>
          DocPlace
        </a>

        <div class="login-form">
          <h1 class="login-title">Welcome Back</h1>
          <p class="login-subtitle">Sign in to your account to continue</p>
          @if ($errors->any())
              <div style="background: #ffe5e5; border: 1px solid #ff4d4d; color: #b30000; padding: 16px; border-radius: 8px; margin-bottom: 20px; font-size: 15px;">
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

          <form method="POST" action="{{ route('login.submit') }}">
            @csrf
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
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                name="password"
                class="form-input"
                placeholder="Enter your password"
              />
            </div>

            <button type="submit" class="login-btn">Sign In</button>
          </form>

          <div class="switch-form">Don't have an account? <a href="{{ route('signup') }}">Sign up</a></div>
        </div>
      </div>

      <div class="login-container-right">
        <h2>Your Health Journey Starts Here</h2>
        <p>
          Connect with qualified healthcare professionals, book appointments
          online, and get the care you deserve.
        </p>
        <ul class="feature-list">
          <li>Expert medical professionals</li>
          <li>State-of-the-art facilities</li>
          <li>Personalized care plans</li>
          <li>Emergency services available</li>
        </ul>
      </div>
    </div>
  </body>
</html>
