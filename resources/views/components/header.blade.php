<header class="header">
      <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
          <div class="logo-icon">D</div>
          DocPlace
        </a>
        <ul class="nav-links">
          <li><a href="{{ route('home') }}" class="Active">Home</a></li>
          <li><a href="{{ route('find_doctors') }}">Find Doctors</a></li>
          <li><a href="{{ route('about_us') }}">About</a></li>
          <li><a href="{{ route('contact_us') }}">Contact</a></li>
        </ul>

        <div class="nav-buttons">
          @guest
            <button class="signup-btn" id="sign-up-btn" onclick="window.location.href='{{ route('signup') }}'">Sign Up</button>
            <button class="login-btn" id="login-btn" onclick="window.location.href='{{ route('login') }}'">Login</button>
          @else
            <div class="user-menu">
              <button class="user-btn">{{ auth()->user()->name }}</button>
              <div class="dropdown">
                @if(auth()->user()->role == 'admin')
                  <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                  <a href="{{ route('profile') }}">Profile</a>
                @endif
                <button type="button" class="logout-btn" onclick="confirmLogout()">Logout</button>
              </div>
            </div>
          @endguest
        </div>
      </nav>
    </header>

    <style>
      .user-menu {
        position: relative;
        display: inline-block;
      }
      .user-btn {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
      .dropdown {
        display: none;
        position: absolute;
        background: white;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        z-index: 1;
        min-width: 120px;
        right: 0;
      }
      .user-menu:hover .dropdown {
        display: block;
      }
      .dropdown a, .dropdown button {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border: none;
        background: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
      }
      .dropdown a:hover, .dropdown button:hover {
        background: #f1f1f1;
      }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
      function confirmLogout() {
        Swal.fire({
          title: "Are you sure?",
          text: "You will be logged out!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, logout!"
        }).then((result) => {
          if (result.isConfirmed) {
            // Submit the logout form
            document.getElementById('logout-form').submit();
          }
        });
      }
    </script>

    @auth
      <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
      </form>
    @endauth
