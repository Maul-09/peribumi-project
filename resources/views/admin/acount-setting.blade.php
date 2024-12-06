<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex align-items-center justify-content-between pe-3">
                <h1>Account Setting</h1>
                <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i> Tambah
                    Akun</a>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Account Setting</li>
                    <li class="breadcrumb-item active">Peri bumi Consultant</li>
                </ol>
            </nav>
        </div>
</x-adminlayout>
