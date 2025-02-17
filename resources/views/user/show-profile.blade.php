<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Profile</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-show-profile.css') }}</x-slot>
    <div class="profile-layout">
        <!-- Foto Profil -->
        @php
            $initial = strtolower(substr($user->name, 0, 1));
            $defaultImageName = 'default_' . $initial . '.png';
        @endphp

        <div class="profile-photo-wrapper">
            @if ($user->image)
                <img src="{{ asset('profile/' . $user->image) }}" alt="Profile Image" class="profile-photo">
            @else
                <div class="photo-placeholder">
                    <span class="initial">{{ strtoupper($initial) }}</span>
                </div>
            @endif
        </div>

        <!-- Informasi User -->
        <div class="profile-info">
            <h3 class="profile-name">{{ $user->name }}</h3>
            <div class="user-info">
                <h6>{{ $user->email }}</h6>
                <span class="separator mx-2"></span>
                <h6>{{ $user->username }}</h6>
            </div>
            <!-- Sosial Media -->
            <div class="mt-3 social-media">
                @if ($user->informasiUser && $user->informasiUser->facebook)
                    <a href="{{ $user->informasiUser->facebook }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                @endif

                @if ($user->informasiUser && $user->informasiUser->twitter)
                    <a href="{{ $user->informasiUser->twitter }}" class="btn btn-info btn-sm" target="_blank">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                @endif

                @if ($user->informasiUser && $user->informasiUser->instagram)
                    <a href="{{ $user->informasiUser->instagram }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                @endif
            </div>
        </div>
        <div class="button-edit-beranda">
            <a href="{{ route('editProfile', $user->id) }}"><i class="fas fa-edit"></i></a>
            <a href="{{ route('beranda') }}"><i class="fas fa-home"></i></a>
        </div>
    </div>

    <div class="profile-layout-info">
        <div class="profile-info-user">
            <div class="mt-3 additional-info">
                @if ($user->informasiUser)
                    <div class="title-profile">
                        <p class="des-profile">Alamat<span>:</span></p>
                        <p>{{ $user->informasiUser->alamat ?? 'Data tidak ditemukan' }}</p>
                    </div>
                        <div class="title-profile">
                        <p class="des-profile">Tanggal Lahir<span>:</span></p>
                        <p>{{ $user->informasiUser->tanggal_lahir ?? 'Data tidak ditemukan' }}</p>
                    </div>
                    <div class="title-profile">
                        <p class="des-profile">Nomor Telepon<span>:</span></p>
                        <p>{{ $user->informasiUser->nomor_telepon ?? 'Data tidak ditemukan' }}</p>
                    </div>
                    <div class="title-profile">
                        <p class="des-profile">Jenis Kelamin<span>:</span></p>
                        <p>{{ $user->informasiUser->jenis_kelamin ?? 'Data tidak ditemukan' }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
