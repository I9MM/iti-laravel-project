<header class="header">
    <nav class="navbar">
        <a href="./index.html" class="logo">
            <div class="logo-icon">D</div>
            DocPlace
        </a>
        <ul class="nav-links">
            <li><a href="./index.html" class="Active">Home</a></li>
            <li><a href="./find_doctors.html">Find Doctors</a></li>
            <li><a href="./about_us.html">About</a></li>
            <li><a href="./contact_us.html">Contact</a></li>
        </ul>
        @guest
            <div class="nav-buttons">
                <button class="signup-btn" id="sign-up-btn">Sign Up</button>
                <button class="login-btn" id="login-btn">Login</button>
            </div>
        @else
            <div class="user-info">
                <span style="font-size: 20px">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }} " method="POST" style="display: inline">
                    @csrf
                    <button class="logout-btn" type="submit">
                        <span>🚪</span>
                        Logout
                    </button>
                </form>
            </div>
        @endguest
            
    </nav>
</header>
