<x-adminlayout>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card" data-bs-toggle="modal" data-bs-target="#userModal"
                                style="cursor: pointer;">
                                <div class="card-body">
                                    <h5 class="card-title">Member</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $userCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content rounded-4 shadow-lg">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="userModalLabel">Daftar User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Daftar User -->
                                        <ul class="list-group list-group-flush mb-3 user-list">
                                            @foreach ($usersByType as $type => $users)
                                                <h6 class="text-primary text-uppercase mt-3">{{ ucfirst($type) }}</h6>
                                                @foreach ($users as $user)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="user-name">{{ $user->name }}</span>
                                                        <small class="text-muted">{{ $user->email }}</small>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div id="produkCard" class="card info-card revenue-card" style="cursor: pointer;">
                                <div class="card-body">
                                    <h5 class="card-title">Produk</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalProducts }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="produkModalLabel">Daftar Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Konten Produk akan dimuat di sini -->
                                            <ul id="produkList" class="list-group">
                                                <!-- Contoh Produk -->
                                                @foreach ($products as $product)
                                                    <li class="list-group-item">{{ $product->nama_produk }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.getElementById('produkCard').addEventListener('click', function() {
                                    var modal = new bootstrap.Modal(document.getElementById('produkModal'));
                                    modal.show();
                                });
                            </script> --}}
                        </div>



                        <!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div id="ratingCard" class="card info-card customers-card" style="cursor: pointer;">
                                <div class="card-body">
                                    <h5 class="card-title">Rating</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $formattedGlobalAverageRating }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ratingModalLabel">Rating Berdasarkan Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($productsWithRatings as $produk)
                                            <div class="product-rating mb-4">
                                                <h6 class="product-name">{{ $produk['nama_produk'] }}</h6>
                                                <p><strong>Rata-rata Rating:</strong>
                                                    <!-- Menampilkan satu bintang -->
                                                    {!! '<i class="fa-solid fa-star text-warning"></i>' !!}
                                                    <!-- Menampilkan rata-rata rating dengan angka -->
                                                    {{ $produk['average_rating'] }}
                                                </p>

                                                <div class="rating-stars mb-2">
                                                    {!! str_repeat('<i class="fa-solid fa-star text-warning"></i>', $produk['average_rating']) !!}
                                                </div>

                                                <ul class="list-group review-list">
                                                    @forelse($produk['ratings'] as $review)
                                                        <li class="list-group-item review-item">
                                                            @php
                                                                $emote = '';
                                                                switch ($review->star_rating) {
                                                                    case 5:
                                                                        $emote = '🥳';
                                                                        break;
                                                                    case 4:
                                                                        $emote = '😄';
                                                                        break;
                                                                    case 3:
                                                                        $emote = '🤔';
                                                                        break;
                                                                    case 2:
                                                                        $emote = '😞';
                                                                        break;
                                                                    case 1:
                                                                        $emote = '🤬';
                                                                        break;
                                                                    default:
                                                                        $emote = '❓';
                                                                        break;
                                                                }
                                                            @endphp
                                                            <div class="review-header">
                                                                <strong>{!! $emote !!}
                                                                    {{ $review->user->name ?? 'Tidak diketahui' }}</strong>
                                                                <span
                                                                    class="review-date"><em>{{ $review->created_at->format('d-m-Y') }}</em></span>
                                                            </div>
                                                            <div class="review-stars">
                                                                {!! str_repeat('<i class="fa-solid fa-star text-warning"></i>', $review->star_rating) !!}
                                                            </div>
                                                            <p class="review-comments">{{ $review->comments }}</p>
                                                        </li>
                                                    @empty
                                                        <li class="list-group-item">Belum ada rating.</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            document.getElementById('ratingCard').addEventListener('click', function() {
                                var modal = new bootstrap.Modal(document.getElementById('ratingModal'));
                                modal.show();
                            });
                        </script>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card notification-card" data-bs-toggle="modal"
                                data-bs-target="#verifikasiModal" style="cursor: pointer;">
                                <div class="card-body">
                                    <h5 class="card-title">Verifikasi Produk</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bell"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $jumlahTransaksiPending }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="verifikasiModal" tabindex="-1"
                            aria-labelledby="verifikasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verifikasiModalLabel">Verifikasi Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Search bar -->
                                        <input type="text" id="search-name" class="form-control mb-3"
                                            placeholder="Cari berdasarkan nama pengguna...">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Pengguna</th>
                                                    <th>Status Transaksi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="transaction-list">
                                                @foreach ($transaksiPending as $transaksi)
                                                    <tr>
                                                        <td>{{ $transaksi->produk->nama_produk }}</td>
                                                        <td>{{ $transaksi->user->name }}</td>
                                                        <td>{{ $transaksi->status_transaksi }}</td>
                                                        <td>
                                                            <form
                                                                action="{{ route('admin.konfirmasi', $transaksi->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-success">Konfirmasi</button>
                                                            </form>

                                                            <form action="{{ route('admin.tolak', $transaksi->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Tolak</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#search-name').on('input', function() {
                                    var query = $(this).val();

                                    $.ajax({
                                        url: "{{ route('admin.search-transaksi') }}",
                                        method: 'GET',
                                        data: {
                                            query: query
                                        },
                                        success: function(data) {
                                            $('.transaction-list').html(data);
                                        }
                                    });
                                });
                            });
                        </script>



                        {{-- chart --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span id="dateLabel">/Today</span></h5>

                                    <div id="reportsChart"></div>
                                    <canvas id="visitorChart" width="400" height="200"></canvas>
                                    <script>
                                        const ctx = document.getElementById('visitorChart').getContext('2d');
                                        let visitorChart;

                                        // Data pengunjung dari controller
                                        const chartData = {
                                            today: {
                                                labels: [
                                                    @foreach ($todayVisitors as $data)
                                                        "{{ $data->hour }}:00"
                                                        {{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ],
                                                data: [
                                                    @foreach ($todayVisitors as $data)
                                                        {{ $data->count }}{{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ]
                                            },
                                            week: {
                                                labels: [
                                                    @foreach ($weekVisitors as $data)
                                                        "{{ $data->day }}"
                                                        {{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ],
                                                data: [
                                                    @foreach ($weekVisitors as $data)
                                                        {{ $data->count }}{{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ]
                                            },
                                            month: {
                                                labels: [
                                                    @foreach ($monthVisitors as $data)
                                                        "Minggu ke-{{ $data->week }}"
                                                        {{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ],
                                                data: [
                                                    @foreach ($monthVisitors as $data)
                                                        {{ $data->count }}{{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                ]
                                            }
                                        };

                                        // Fungsi untuk menampilkan chart berdasarkan periode
                                        function showChart(period) {
                                            if (visitorChart) {
                                                visitorChart.destroy(); // Hapus chart lama
                                            }

                                            visitorChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: chartData[period].labels, // Label untuk periode
                                                    datasets: [{
                                                        label: 'Jumlah Pengunjung',
                                                        data: chartData[period].data, // Data jumlah pengunjung
                                                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area di bawah garis
                                                        borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                                                        borderWidth: 2, // Ketebalan garis
                                                        tension: 0.4, // Garis melengkung
                                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)', // Warna titik data
                                                        pointRadius: 5, // Ukuran titik data
                                                        fill: true // Isi area di bawah garis
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    plugins: {
                                                        legend: {
                                                            display: true, // Menampilkan legenda
                                                            position: 'top' // Posisi legenda di atas
                                                        }
                                                    },
                                                    scales: {
                                                        x: {
                                                            title: {
                                                                display: true,
                                                                text: 'Periode' // Judul sumbu X
                                                            }
                                                        },
                                                        y: {
                                                            beginAtZero: false,
                                                            title: {
                                                                display: true,
                                                                text: 'Jumlah Pengunjung'
                                                            },
                                                            ticks: {
                                                                stepSize: 1, // Langkah antar angka
                                                                min: 1, // Mulai dari angka 1
                                                                max: 10 // Max sesuai data
                                                            },
                                                            suggestedMin: 1,
                                                            suggestedMax: 10
                                                        }
                                                    }
                                                }
                                            });
                                        }

                                        // Tampilkan chart untuk 'Hari Ini (Jam)' secara default
                                        document.addEventListener('DOMContentLoaded', () => {
                                            showChart('today');
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>



                        {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Verifikasi Produk</h5>
                            <div class="activity">


                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-adminlayout>
