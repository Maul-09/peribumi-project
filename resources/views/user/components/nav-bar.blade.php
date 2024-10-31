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
        <li><a href="javascript:void(0);" onclick="openProfileModal()">Edit Profile</a></li>
    </ul>
</header>

<!-- Modal Popup Edit Profile -->
<div id="modalProfile" class="modal-profile">
    <div class="modal-content-profile">
        <span class="close-btn" onclick="closeProfileModal()">&times;</span>
        <h2>Edit Profile</h2>
        <form action="" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>IMAGE</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
            <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $field->name) }}" placeholder="Masukkan Nama">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $field->email) }}" placeholder="Masukkan Email Baru">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $field->username) }}" placeholder="Masukkan Username">
                @error('username')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password Baru">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
        <form action="{{ route('deleteAccount', $field->id) }}" method="post">
            @csrf
            <button type="submit" class="btn-danger">Hapus Akun</button>
        </form>
    </div>
</div>
