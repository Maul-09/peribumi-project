<header class="sticky">
    <a href="#home" class="logo"><img src="{{ asset('image/logo-peribumi.png') }}" alt="logo">PERIBUMI
        CONSULTANT</a>
    <div class="toggle"></div>
    <ul class="menu">
        <li><a href="{{ route('beranda') }}#home">Home</a></li>
        <li><a href="{{ route('beranda') }}#about">About us</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Product</a>
            <div class="dropdown-content">
              <a href="#">Management Bussines</a>
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
