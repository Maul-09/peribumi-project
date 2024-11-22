<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    {{-- <div class="profile-container">
        <!-- Profile Image Section with Icons -->
        <div class="profile-image-section">
            @php
                $initial = strtolower(substr($field->name, 0, 1));
                $defaultImageName = 'default_' . $initial . '.png';
                $defaultImagePath = public_path('profile/' . $defaultImageName);
            @endphp

            @if ($field->image)
                <img src="{{ asset('profile/' . $field->image) }}" alt="Profile Image" class="profile-image">
            @else
                <div class="profile-image"
                    style="background-color: #ccc; display: flex; justify-content: center; align-items: center;">
                    <span style="font-size: 60px; color: white;">{{ strtoupper($initial) }}</span>
                </div>
            @endif


            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Profile Forms Section -->
        <div class="profile-forms">
            <!-- Profile Information Card -->
            <div class="profile-card">
                <form action="{{ route('update.profile', $field->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="image-buttons">
                        <label for="file-upload" class="icon-button" title="Choose Photo">
                            <i class="fas fa-upload"></i>
                        </label>
                        <input id="file-upload" type="file" class="file-input @error('image') is-invalid @enderror"
                            name="image" style="display: none;">
                        <button type="button" class="icon-button icon-delete" title="Delete Photo">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <!-- Name -->
                    <div class="form-profile">
                        <label class="label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $field->name) }}" placeholder="Enter your name">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-profile">
                        <label class="label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', $field->email) }}" placeholder="Enter your new email">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="form-profile">
                        <label class="label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username', $field->username) }}"
                            placeholder="Enter your username">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>

            <!-- Password Update Card -->
            <div class="profile-card">
                <form action="{{ route('change.password', $field->id) }}" method="POST">
                    @csrf

                    <div class="form-profile">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-profile">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-profile">
                        <label for="new_password_confirmation">Confirm Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>
            <!-- Delete Account Card -->
            <div class="profile-card">
                <form action="{{ route('deleteAccount', $field->id) }}" method="post">
                    @csrf
                    <button type="submit" class="delete-btn">Delete Account</button>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="screen">
        <div class="account-settings">
            <div class="arrow-back">
                <a href="{{ route('beranda') }}" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                <div class="title">
                    <p>Profile Settings</p>
                </div>
            </div>
            <div class="settings-container">
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="tabs">
                        <a href="#" class="tab-link active" data-target="general">
                            <i class="fas fa-user"></i> General
                        </a>
                        <a href="#" class="tab-link" data-target="change-password">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                        <a href="#" class="tab-link" data-target="info">
                            <i class="fas fa-info-circle"></i> Info
                        </a>
                        <a href="#" class="tab-link" data-target="social-links">
                            <i class="fas fa-share-alt"></i> Social Links
                        </a>
                        <a href="#" class="tab-link" data-target="product">
                            <i class="fas fa-box"></i> Product
                        </a>
                    </div>
                </div>

            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="photo-upload">
                        <div class="photo-container">
                            @php
                                $initial = strtolower(substr($field->name, 0, 1));
                                $defaultImageName = 'default_' . $initial . '.png';
                            @endphp

                            @if ($field->image)
                                <img src="{{ asset('profile/' . $field->image) }}" alt="Profile Image" class="profile-photo">
                            @else
                                <div class="photo-placeholder" style="background-color: #ccc; display: flex; justify-content: center; align-items: center; border-radius:50%; width: 150px; height: 150px;">
                                    <span style="font-size: 60px; color: white;">{{ strtoupper($initial) }}</span>
                                </div>
                            @endif

                                @error('image')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                            <div class="hover-overlay">
                                <i class="fas fa-eye"></i> Preview
                            </div>
                            <label for="file-input" class="upload-icon">
                                <i class="fas fa-pencil-alt"></i>
                            </label>
                            <input type="file" class="file-input" id="file-input" accept="image/*" hidden>
                        </div>

                        <small>Allowed JPG, GIF, or PNG. Max size 800KB</small>
                    </div>

                        <div class="form-section">
                            <div class="form-group">
                                <label class="form-label"><i class="icon-user"></i> Name</label>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="icon-envelope"></i> Email</label>
                                <input type="text" class="form-control" placeholder="example@mail.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i class="icon-user-circle"></i> Username</label>
                                <input type="text" class="form-control" placeholder="Your Username">
                                <div class="alert">
                                    Your email is not confirmed. Please check your inbox.<br>
                                    <a href="javascript:void(0)">Resend confirmation</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="tab-pane" id="change-password">
                        <h5>Change Your Password</h5>
                        <div class="form-section">
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" placeholder="Masukan Password Lama">
                            </div>
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" placeholder="Masukan Password Baru">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" placeholder="Konfirmasi Password Baru">
                            </div>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="tab-pane" id="info">
                        <h5>Personal Information</h5>
                        <div class="form-section">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" rows="3">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" placeholder="+62">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamis</label>
                                <select class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Social Links -->
                    <div class="tab-pane" id="social-links">
                        <h5>Social Media Links</h5>
                        <div class="form-section">
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="url" class="form-control"
                                    placeholder="https://facebook.com/username">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="url" class="form-control"
                                    placeholder="https://twitter.com/username">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instagram</label>
                                <input type="url" class="form-control"
                                    placeholder="https://instagram.com/username">
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="tab-pane" id="product">
                        <h3>Produk yang sudah Anda beli:</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Status Akses</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkDibeli as $produk)
                                    <tr>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>
                                            @if ($produk->pivot->tanggal_berakhir && $produk->pivot->tanggal_berakhir->isPast())
                                                Nonaktif
                                            @else
                                                Aktif
                                            @endif
                                        </td>
                                        <td>
                                            {{ $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : 'Tidak Tersedia' }}
                                        </td>
                                        <td>
                                            {{ $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : 'Tidak Tersedia' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="form-section">
                    <div class="form-group">
                        <label class="form-label">Email Notifications</label>
                        <input type="checkbox" class="form-control"> Enable
                    </div>
                    <div class="form-group">
                        <label class="form-label">Push Notifications</label>
                        <input type="checkbox" class="form-control"> Enable
                    </div>
                </div> --}}
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button type="button" class="btn-save">Save changes</button>
                <button type="button" class="btn-cancel">Cancel</button>
            </div>
        </div>

    </div>

</x-layout>
