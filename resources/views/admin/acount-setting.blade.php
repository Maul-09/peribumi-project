<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex align-items-center justify-content-between pe-3">
                <h1>Account Setting</h1>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Account Setting</li>
                    <li class="breadcrumb-item active">Peri bumi Consultant</li>
                </ol>
            </nav>
            <div class="container">
                <div class="headtb">
                    <h1 class="title">Daftar Akun</h1>
                    <button class="add-account-btn" data-bs-toggle="modal" data-bs-target="#addAccountModal">+ Tambah Akun</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAccountModalLabel">Tambah Akun Baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('add.account') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="usertype" id="usertype" value="admin">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Akun</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username: </label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email: </label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="account-table">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Akun</th>
                                <th>User Type</th>
                                <th>Sosial Media</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                            <tr>
                                <td><img src="{{ $admin->photo_url ?? '#' }}" alt="Foto Profil" class="profile-pic"></td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ ucfirst($admin->usertype) }}</td>
                                <td>
                                    @if ($admin->informasiUser)
                                        @if ($admin->informasiUser->instagram)
                                            <a href="{{ $admin->informasiUser->instagram }}" target="_blank">
                                                <i class="fab fa-instagram social-icon"></i>
                                            </a>
                                        @endif
                                        @if ($admin->informasiUser->twitter)
                                            <a href="{{ $admin->informasiUser->twitter }}" target="_blank">
                                                <i class="fab fa-twitter social-icon"></i>
                                            </a>
                                        @endif
                                        @if ($admin->informasiUser->facebook)
                                            <a href="{{ $admin->informasiUser->facebook }}" target="_blank">
                                                <i class="fab fa-facebook social-icon"></i>
                                            </a>
                                        @endif
                                        @if (!$admin->informasiUser->instagram && !$admin->informasiUser->twitter && !$admin->informasiUser->facebook)
                                            -
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Tidak ada data admin.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </main>
</x-adminlayout>
