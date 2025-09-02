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
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="nav-icon">🏠</span>
                    Overview
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-divider"></div>

    <div class="nav-section">
        <div class="nav-section-title">Doctors</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('doctors.index') }}" class="nav-link active">
                    <span class="nav-icon">👨‍⚕️</span>
                    Doctors
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('doctors.create') }}" class="nav-link">
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
                <a href="{{ route('patients.index') }}" class="nav-link">
                    <span class="nav-icon">👥</span>
                    Patients
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-divider"></div>

    <div class="nav-section">
        <div class="nav-section-title">Appointments</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="./appointments.html" class="nav-link">
                    <span class="nav-icon">📅</span>
                    Appointments
                </a>
            </li>
        </ul>
    </div>
</nav>
