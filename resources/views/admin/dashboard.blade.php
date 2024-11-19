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
                            <div class="card info-card sales-card">
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
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
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
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Rating</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $formattedAverageRating }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                                            beginAtZero: true,
                                                            title: {
                                                                display: true,
                                                                text: 'Jumlah Pengunjung' // Judul sumbu Y
                                                            }
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Verifikasi Produk</h5>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Nama Pengguna</th>
                                                <th>Status Transaksi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksiPending as $transaksi)
                                            <tr>
                                                <td>{{ $transaksi->produk->nama_produk }}</td>
                                                <td>{{ $transaksi->user->name }}</td>
                                                <td>{{ $transaksi->status_transaksi }}</td>
                                                <td>
                                                    <form action="{{ route('admin.konfirmasi', $transaksi->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                    </form>

                                                    <form action="{{ route('admin.tolak', $transaksi->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
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
                    </div>
                </div> --}}

        </section>
    </main>

</x-adminlayout>
