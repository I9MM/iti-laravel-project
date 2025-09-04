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
                <button class="signup-btn" id="sign-up-btn" onclick="window.location.href='{{ route('signup') }}'">Sign
                    Up</button>
                <button class="login-btn" id="login-btn"
                    onclick="window.location.href='{{ route('login') }}'">Login</button>
            @else
                <li class="dropdown">
                    <a href=""><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('profile.index') }}" style="font-size: 15px"><span class="nav-icon">👤</span> Profile</a>
                        <a href="{{ route('user.appointments') }}" style="font-size: 15px"><span class="nav-icon">📅</span> My Appointments</a>
                    </div>
                </li>
                <button type="button" class="logout-btn" onclick="confirmLogout()"> <span>🚪</span> Logout</button>
            @endguest
        </div>
    </nav>
</header>

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
