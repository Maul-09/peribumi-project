<header class="sticky">
    <a href="#home" class="logo"><img src="{{ asset('image/logo-peribumi.png') }}" alt="logo">PERIBUMI
        CONSULTANT</a>
    <div class="toggle"></div>
    <ul class="menu">
        <li><a href="{{ route('beranda') }}#home">Home</a></li>
        <li><a href="{{ route('beranda') }}#about">About us</a></li>
        <li class="dropdown">
            <button class="dropbtn">Product</button>
            <div class="dropdown-content">
                <a href="manajemen">Management Business</a>
                <a href="#">Training Center</a>
                <a href="#">Digital Solution</a>
                <a href="#">Personal Development</a>
                <a href="#">Event Organizer</a>
            </div>
        </li>
        <li><a href="{{ route('beranda') }}#mitra">Mitra</a></li>
        <li><a href="{{ route('beranda') }}#footer">Contact us</a></li>
        <li><a href="{{ route('beranda') }}#">Sign in</a></li>
    </ul>
</header>
