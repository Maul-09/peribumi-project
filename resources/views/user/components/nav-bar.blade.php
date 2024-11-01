<header>
    <a href="#home" class="logo">
        <img src="{{ asset('image/logo-peribumi.png') }}" alt="logo"> PERIBUMI CONSULTANT
    </a>
    <div class="toggle"></div>
    <ul class="menu">
        <li><a href="{{ route('beranda') }}#home">Home</a></li>
        <li><a href="{{ route('beranda') }}#about">About us</a></li>
        <li class="dropdown">
            <button class="dropdown-button" id="dropdownButton">Product</button>
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="{{ route('manajemen') }}">Management Business</a>
                <a href="{{ route('training') }}">Training Center</a>
                <a href="{{ route('digital') }}">Digital Solution</a>
                <a href="{{ route('personal') }}">Personal Development</a>
                <a href="{{ route('event') }}">Organizer</a>
            </div>
        </li>
        <li><a href="{{ route('beranda') }}#mitra">Mitra</a></li>
        <li><a href="{{ route('beranda') }}#footer">Contact us</a></li>
        @guest
        <li><a href="{{ route('logreg') }}">Sign in</a></li>
        @endguest
        @auth
        <li class="dropbutton">
            <button class="dropdown-button" id="userDropdownButton" onclick="toggleDropdown()">
                <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('image/user-icon.png') }}" alt="User Logo" class="user-logo">
            </button>
            <div class="drop-menu" id="userDropdownMenu">
                <a href="{{ route('editProfile', auth()->user()->id) }}">Profile</a>
                <button type="submit" class="logout-button" onclick="confirmLogout()">Logout</button>
                <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
                    @csrf
                </form>
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

