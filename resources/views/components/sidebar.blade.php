<nav class="sidebar">
    <div class="logo">
        <div class="logo-icon">D</div>
        <div class="logo-text">DocPlace</div>
    </div>

    <!-- Dashboard Section -->
    <div class="nav-section">
        <div class="nav-section-title">Dashboard</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.index') : route('doctor.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="nav-icon">🏠</span>
                    Overview
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-section">
        <div class="nav-section-title">Profile</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('profile.index') }}"
                    class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                    <span class="nav-icon">👤</span>
                    Profile
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-divider"></div>

    @if (Auth::user()->role === 'admin')
        <div class="nav-section">
            <div class="nav-section-title">Doctors</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.doctors.index') }}" class="nav-link active">
                        <span class="nav-icon">👨‍⚕️</span>
                        Doctors
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.doctors.create') }}" class="nav-link">
                        <span class="nav-icon">➕</span>
                        Add Doctor
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-divider"></div>

        <div class="nav-section">
            <div class="nav-section-title">Patients</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.patients.index') }}" class="nav-link">
                        <span class="nav-icon">👥</span>
                        Patients
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-divider"></div>
    @endif

    <div class="nav-section">
        <div class="nav-section-title">Appointments</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.appointments.index') : route('doctor.appointments.index') }}"
                    class="nav-link">
                    <span class="nav-icon">📅</span>
                    Appointments
                </a>
            </li>
        </ul>
    </div>
</nav>
