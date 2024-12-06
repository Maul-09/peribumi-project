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
                    <button class="add-account-btn">+ Tambah Akun</button>
                </div>

                <table class="account-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Akun</th>
                            <th>User Type</th>
                            <th>Sosmed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="#" alt="Foto Profil" class="profile-pic"></td>
                            <td>Fulan</td>
                            <td>Admin</td>
                            <td>@john_doe</td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="#" alt="Foto Profil" class="profile-pic"></td>
                            <td>Fulan</td>
                            <td>User</td>
                            <td>@jane_smith</td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-adminlayout>
