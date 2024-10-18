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
                <a href="manajemen">Management Bussines</a>
                <a href="training">Training Center</a>
                <a href="digital">Digital Solution</a>
                <a href="personal">Personal Development</a>
                <a href="event">Organizer</a>
            </div>
        </li>
        <li><a href="{{ route('beranda') }}#mitra">Mitra</a></li>
        <li><a href="{{ route('beranda') }}#footer">Contact us</a></li>
        <li><a href="{{ route('beranda') }}#">Sign in</a></li>
    </ul>
</header>
