<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex align-items-center justify-content-between pe-4">
                <h1>Training Center</h1>
                <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-plus me-1"></i> Tambah Data</a>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Management Product</li>
                    <li class="breadcrumb-item active">Training Center</li>
                </ol>
            </nav>
        </div>
        <x-card-produk></x-card-produk>
    </main>
</x-adminlayout>
