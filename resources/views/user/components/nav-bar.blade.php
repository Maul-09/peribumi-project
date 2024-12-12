<header>
    <a href="#home" class="logo">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="logo">
        <p class="logo-title">PERI BUMI CONSULTANT</p>
    </a>
    <div class="toggle"></div>
    <ul class="menu">
        <li><a href="{{ route('beranda') }}#home" class="link-bar">Home</a></li>
        <li><a href="{{ route('beranda') }}#about" class="link-bar">About us</a></li>
        <li class="dropdown">
            <button class="dropdown-button" id="dropdownButton">Product</button>
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="{{ route('manajemen') }}" class="link-dropdown">Management Business</a>
                <a href="{{ route('training') }}" class="link-dropdown">Training Center</a>
                <a href="{{ route('digital') }}" class="link-dropdown">Digital Solution</a>
                <a href="{{ route('personal') }}" class="link-dropdown">Potential Development</a>
                <a href="{{ route('event') }}" class="link-dropdown">Event Organizer</a>
            </div>
        </li>
        <li><a href="{{ route('beranda') }}#mitra" class="link-bar">Client</a></li>
        <li><a href="{{ route('beranda') }}#footer" class="link-bar">Contact us</a></li>
        @guest
            <li><a href="{{ route('login') }}" class="link-bar">Sign in</a></li>
        @endguest
        @auth
            <li class="dropbutton">
                <button class="dropdown-button" id="userDropdownButton" onclick="toggleDropdown()">
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
                </button>
                <div class="drop-down">
                    <div class="drop-menu" id="userDropdownMenu">
                        @if (Auth::check())
                            <h6 class="username"><span>Hello, </span>{{ Auth::user()->name }}</h6>
                        @endif
                        <hr>
                        <a href="{{ route('editProfile', auth()->user()->id) }}" class="menu-items">
                            <i class="fas fa-user-edit"></i> Profile
                        </a>
                        <a href="{{ route('produk.show', auth()->user()->id) }}" class="menu-items">
                            <i class="fas fa-box"></i> Product
                        </a>
                        <button type="drop-button" class="menu-items logout-button" onclick="confirmLogout()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>

        @endauth
    </ul>
</header>

<div id="logoutModal" class="modal">
    <div class="modal-content">
        <h2>Confirm Logout</h2>
        <p>Apa Anda serius ingin Signup?</p>
        <div class="modal-buttons">
            <button onclick="performLogout()" class="button-confirm">Yes</button>
            <button onclick="closeModal()" class="button-cancel">Cancel</button>
        </div>
    </div>
</div>
