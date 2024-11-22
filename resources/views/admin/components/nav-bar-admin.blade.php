<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="" style="width: 70px; height: auto;">
        <a href="#" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block pe-3">Adminisitrator</span>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </a>

    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-5">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @php

                        $initial = strtoupper(substr(auth()->user()->name, 0, 1));
                        $hasImage = auth()->user()->image ? true : false;
                    @endphp
                    @if ($hasImage)
                        <img src="{{ asset('profile/' . auth()->user()->image) }}" alt="User  Logo" class="user-logo"
                            style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover;">
                    @else
                        <div
                            style="width: 40px; height: 40px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                            <span style="font-size: 20px; color: white;">{{ $initial }}</span>
                        </div>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        @if (Auth::check())
                            <h6>{{ Auth::user()->name }}</h6>
                        @endif

                        <span>Admin</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center"
                            onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Management Product</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('manajemen.admin') }}">
                        <i class="bi bi-circle"></i><span>Management Bussines</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('training.admin') }}">
                        <i class="bi bi-circle"></i><span>Training Center</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('digital.admin') }}">
                        <i class="bi bi-circle"></i><span>Digital Solution</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('personal.admin') }}">
                        <i class="bi bi-circle"></i><span>Personal Development</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('organizer.admin') }}">
                        <i class="bi bi-circle"></i><span>Organizer</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-journal-text"></i>
                <span>LMS</span>
            </a>
        </li>
</aside><!-- End Sidebar-->
