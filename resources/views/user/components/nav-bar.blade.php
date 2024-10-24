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
        <li><a href="{{ route('logreg') }}">Sign in</a></li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>logout</button>
        </form>
    </ul>
</header>
