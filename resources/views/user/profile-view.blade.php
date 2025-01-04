<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    <div class="screen">
        <div class="account-settings">
            <div class="arrow-back">
                <a href="{{ route('profile.show', $field->id) }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="title">
                    <p>Pengaturan Akun</p>

                </div>
            </div>

            <div class="settings-container">
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="tabs">
                        <a href="#" class="tab-link active" data-target="general">
                            <i class="fas fa-user"></i><span class="title-nav">Umum</span>
                        </a>
                        <a href="#" class="tab-link" data-target="change-password">
                            <i class="fas fa-key"></i><span class="title-nav">Ganti Kata Sandi</span>
                        </a>
                        <a href="#" class="tab-link" data-target="info">
                            <i class="fas fa-info-circle"></i><span class="title-nav">Data Diri</span>
                        </a>
                        <a href="#" class="tab-link" data-target="social-links">
                            <i class="fas fa-share-alt"></i><span class="title-nav">Sosial Media</span>
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="tab-content">
                    <!-- General -->
                    <div class="tab-pane active" id="general">
                        <form class="form-section" action="{{ route('update.profile', $field->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="photo-upload">
                                <div class="photo-container">
                                    @php
                                        $initial = strtolower(substr($field->name, 0, 1));
                                        $defaultImageName = 'default_' . $initial . '.png';
                                    @endphp

                                    @if ($field->image)
                                        <img src="{{ asset('profile/' . $field->image) }}" alt="Profile Image"
                                            class="profile-photo">
                                    @else
                                        <div class="photo-placeholder">
                                            <span class="initial">{{ strtoupper($initial) }}</span>
                                        </div>
                                    @endif

                                    @error('image')
                                        <div class="error">{{ $message }}</div>
                                    @enderror

                                    <label for="file-input" class="upload-icon">
                                        <i class="fas fa-pencil-alt"></i>
                                    </label>
                                    <input type="file" name="image" class="file-input" id="file-input"
                                        accept="image/*" hidden>
                                    <button type="submit" name="delete_image" value="1"
                                        onclick="return confirm('Apakah Aa yakin ingin menghapus gambar ini?')"
                                        class="delete-icon">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                                <small>Allowed JPG, GIF, or PNG. Max size 800KB</small>
                            </div>

                            <div class="custom-alert">
                                <div class="alert-box">
                                    <p class="alert-message"></p>
                                    <div class="alert-buttons">
                                        <button class="alert-confirm">Ya</button>
                                        <button class="alert-cancel">Tidak</button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-section">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label"><i class="icon-user"></i>Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                                        value="{{ old('name', auth()->user()->name ?? '') }}">

                                    @if (session('successFields.name'))
                                        <div style="color: #0af248">
                                            {{ session('successFields.name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><i class="icon-envelope"></i>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        placeholder="example@mail.com"
                                        value="{{ old('email', auth()->user()->email ?? '') }}">

                                    @if (session('successFields.email'))
                                        <div style="color: #0af248">
                                            {{ session('successFields.email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><i class="icon-user-circle"></i>Username</label>
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Your Username"
                                        value="{{ old('username', auth()->user()->username ?? '') }}">

                                    @if (session('successFields.username'))
                                        <div style="color: #0af248">
                                            {{ session('successFields.username') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="action-buttons">
                                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password -->
                    <div class="tab-pane" id="change-password">
                        <h5>Ganti Kata Sandi Anda</h5>
                        <form class="form-section" action="{{ route('change.password', $field->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Kata Sandi Lama</label>
                                <input type="password" class="form-control" name="current_password"
                                    placeholder="Masukan Kata Sandi Lama">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password"
                                    placeholder="Masukan Kata Sandi Baru">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    placeholder="Konfirmasi Kata Sandi Baru">
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- Info -->
                    <div class="tab-pane" id="info">
                        <h5>Data Diri</h5>
                        <form class="form-section" action="{{ route('update.profile', $field->id) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{ $field->InformasiUser->tanggal_lahir ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat">{{ $field->InformasiUser->alamat ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" placeholder="+62" name="nomor_telepon"
                                    value="{{ $field->InformasiUser->nomor_telepon ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki"
                                        {{ $field->InformasiUser->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $field->InformasiUser->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                    <option value="Lainnya"
                                        {{ $field->InformasiUser->jenis_kelamin == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- Social Links -->
                    <div class="tab-pane" id="social-links">
                        <h5>Link Sosial Media</h5>
                        <form class="form-section" action="{{ route('update.profile', $field->id) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="url" class="form-control"
                                    placeholder="https://facebook.com/username" name="facebook" value="{{ $field->InformasiUser->facebook ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="url" class="form-control" placeholder="https://twitter.com/username"
                                    name="twitter" value="{{ $field->InformasiUser->twitter ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instagram</label>
                                <input type="url" class="form-control"
                                    placeholder="https://instagram.com/username" name="instagram" value="{{ $field->InformasiUser->instagram ?? '' }}">
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


</x-layout>
