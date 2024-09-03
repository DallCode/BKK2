@extends('layouts.main')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">
                        Selamat Datang,
                        <span class="text-black fw-bold">
                            @if (Auth::user()->role == 'Alumni')
                                {{ $alumniLogin->nama }}
                            @elseif (Auth::user()->role == 'Admin BKK')
                                {{ Auth::user()->role }}
                            @elseif (Auth::user()->role == 'Perusahaan')
                                {{ $perusahaanLogin->nama }}
                            @endif
                        </span>
                    </h1>
                    <h3 class="welcome-sub-text">SMKN 11 Bandung</h3>
                </li>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Alumni</p>
                                    <h4 class="card-title">{{ $jumlahAlumni }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Perusahaan</p>
                                    <h4 class="card-title">{{ $jumlahPerusahaan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Alumni Yang Bekerja</p>
                                    <h4 class="card-title">{{$alumniBekerja}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="fas fa-user-slash"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Alumni Yang Belum Bekerja</p>
                                    <h4 class="card-title">{{$alumniBelumBekerja}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Statistik Alumni Bekerja</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label"><i class="fa fa-pencil"></i></span>
                            Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                            <span class="btn-label"><i class="fa fa-print"></i></span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Dropdown Tahun -->
                <div class="form-group col-md-2">
                    <label for="yearSelect">Pilih Tahun:</label>
                    <select id="yearSelect" class="form-select">
                        <option value="2023" {{ $currentYear == '2023' ? 'selected' : '' }}>2023</option>
                        <option value="2024" {{ $currentYear == '2024' ? 'selected' : '' }}>2024</option>
                        <!-- Tambahkan tahun lain jika perlu -->
                    </select>
                </div>
                <!-- Chart Container -->
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

            {{-- <div class="card card-round">
                <div class="card-body pb-0">
                    <div class="h1 fw-bold float-end text-primary">+5%</div>
                    <h2 class="mb-2">17</h2>
                    <p class="text-muted">Users online</p>
                    <div class="pull-in sparkline-fix">
                        <div id="lineChart"></div>
                    </div> --}}
                {{-- </div>
            </div>
        </div> --}}
    </div>
</div>

<script src="{{ asset('BKK2/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('BKK2/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('BKK2/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('BKK2/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('BKK2/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('BKK2/assets/js/kaiadmin.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('barChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels), // Mengirimkan data label dari controller
                datasets: [{
                    label: 'Alumni Masuk Perusahaan',
                    backgroundColor: 'rgba(23, 125, 255, 0.7)',
                    borderColor: 'rgb(23, 125, 255)',
                    borderWidth: 2,
                    data: @json($values) // Mengirimkan data nilai dari controller
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltips: {
                    enabled: true
                },
                animation: {
                    duration: 500,
                    easing: 'linear',
                }
            }
        });

        // Fungsi untuk memperbarui data grafik berdasarkan tahun yang dipilih
        function updateChartData(year) {
            // Implementasikan logika jika Anda perlu mengubah data saat tahun dipilih
        }

        // Event listener untuk dropdown tahun
        document.getElementById('yearSelect').addEventListener('change', function(event) {
            var selectedYear = event.target.value;
            updateChartData(selectedYear);
        });

        // Initial load
        updateChartData(document.getElementById('yearSelect').value);
    });
    </script>

@endsection
