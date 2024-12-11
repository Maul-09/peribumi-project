<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    <div class="screen">
        <div class="account-settings">
            <div class="arrow-back">
                <a href="{{ route('beranda') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="title">
                    <p>Profile Settings</p>
                </div>
            </div>

            <div class="settings-container">
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="tabs">
                        <a href="#" class="tab-link active" data-target="general">
                            <i class="fas fa-user"></i><span class="title-nav">General</span>
                        </a>
                        <a href="#" class="tab-link" data-target="change-password">
                            <i class="fas fa-key"></i><span class="title-nav">Change Password</span>
                        </a>
                        <a href="#" class="tab-link" data-target="info">
                            <i class="fas fa-info-circle"></i><span class="title-nav">Info</span>
                        </a>
                        <a href="#" class="tab-link" data-target="social-links">
                            <i class="fas fa-share-alt"></i><span class="title-nav">Social Links</span>
                        </a>
                        <a href="#" class="tab-link" data-target="product">
                            <i class="fas fa-box"></i><span class="title-nav">Product</span>
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
                                    <button type="submit" class="btn-save">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password -->
                    <div class="tab-pane" id="change-password">
                        <h5>Change Your Password</h5>
                        <form class="form-section" action="{{ route('change.password', $field->id) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password"
                                    placeholder="Masukan Password Lama">
                            </div>
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password"
                                    placeholder="Masukan Password Baru">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    placeholder="Konfirmasi Password Baru">
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <!-- Info -->
                    <div class="tab-pane" id="info">
                        <h5>Personal Information</h5>
                        <form class="form-section" action="{{ route('update.profile', $field->id) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" placeholder="+62" name="nomor_telepon">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <!-- Social Links -->
                    <div class="tab-pane" id="social-links">
                        <h5>Social Media Links</h5>
                        <form class="form-section" action="{{ route('update.profile', $field->id) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="url" class="form-control"
                                    placeholder="https://facebook.com/username" name="facebook">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="url" class="form-control" placeholder="https://twitter.com/username"
                                    name="twitter">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instagram</label>
                                <input type="url" class="form-control"
                                    placeholder="https://instagram.com/username" name="instagram">
                            </div>
                            <div class="action-buttons">
                                <button type="submit" class="btn-save">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <!-- Product -->
                    <div class="tab-pane" id="product">
                        <h3>Produk Anda:</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Produk</th>
                                    <th>Status Transaksi</th>
                                    <th>Status Akses</th> <!-- Tambahkan kolom Status Akses -->
                                    <th>Nomor Transaksi</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkSemua as $produk)
                                    <tr>
                                        <td>{{ $produk->nama_user }}</td>
                                        <td>{{ $produk->nama_produk ?? 'Tidak Tersedia' }}</td>
                                        <td class="text-center">
                                            @if ($produk->status_transaksi === 'Pending')
                                                <span class="icon" title="Pending">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" fill="#FFA500" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm1-7h4v2h-6V7h2v6z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            @elseif ($produk->status_transaksi === 'Rejected')
                                                <span class="icon" title="Rejected">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" fill="red" viewBox="0 0 24 24">
                                                        <path d="M18 6L6 18M6 6l12 12" stroke="red" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            @elseif ($produk->status_transaksi === 'Confirmed')
                                                <span class="icon" title="Confirmed">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" fill="green" viewBox="0 0 24 24">
                                                        <path
                                                            d="M10 15.172l-3.586-3.586-1.414 1.414L10 18 19 9l-1.414-1.414z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $produk->status_akses }}</td>
                                        <td>{{ $produk->pivot->nomor_transaksi ?? '-' }}</td>
                                        <td>
                                            {{ $produk->pivot && $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : '-' }}
                                        </td>
                                        <td>
                                            {{ $produk->pivot && $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


</x-layout>
