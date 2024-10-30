<header>
    <a href="#home" class="logo"><img src="{{ asset('image/logo-peribumi.png') }}" alt="logo">PERIBUMI
        CONSULTANT</a>
    <div class="toggle"></div>
    <ul class="menu">
        <li><a href="{{ route('beranda') }}#home">Home</a></li>
        <li><a href="{{ route('beranda') }}#about">About us</a></li>
        <li class="dropdown">
            <button class="dropdown-button" id="dropdownButton">Product</button>
            <div class="dropdown-menu" id="dropdownMenu">
                <a href={{ route('manajemen') }}>Management Bussines</a>
                <a href={{ route('training') }}>Training Center</a>
                <a href={{ route('digital') }}>Digital Solution</a>
                <a href={{ route('personal') }}>Personal Development</a>
                <a href={{ route('event') }}>Organizer</a>
            </div>
        </li>
        <li><a href="{{ route('beranda') }}#mitra">Mitra</a></li>
        <li><a href="{{ route('beranda') }}#footer">Contact us</a></li>
        @guest
        <li><a href="{{ route('logreg') }}">Sign in</a></li>
        @endguest
        @auth
        <li class="dropbutton">
            <button class="drop-button" id="userDropdownButton">
                <img src="{{ asset('aset/assets/img/profile-img.jpg') }}" alt="User Logo" class="user-logo">
                @if (Auth::check())
                    <p>{{ Auth::user()->name }}</p>
                @endif
            </button>
            <div class="drop-menu" id="userDropdownMenu">
                <a href="">Profile</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </li>
        @endauth
    </ul>
</header>
