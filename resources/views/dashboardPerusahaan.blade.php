@extends('layouts.main')

@section('conten')

@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold">
                        @if (Auth::user()->role == 'Alumni')
                        {{ $alumniLogin->nama }}
                        @elseif (Auth::user()->role == 'Admin BKK')
                        {{ Auth::user()->role }}
                        @elseif (Auth::user()->role == 'Perusahaan')
                        {{ $perusahaanLogin->nama }}
                        @endif
                        </span></h1>
                      <h3 class="welcome-sub-text">SMKN 11 Bandung </h3>
                    </li>
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
                                    <i class="fas fa-user-check"></i>
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
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Alumni Yang Bekerja</p>
                                    <h4 class="card-title">23</h4>
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
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Alumni Yang Belum Bekerja</p>
                                    <h4 class="card-title">10</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
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
                    <div class="col-md-6">
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Daily Sales</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-label-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-category">March 25 - April 02</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2">
                            <h1>$4,578.58</h1>
                        </div>
                        <div class="pull-in">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card card-round">
                    <div class="card-body pb-0">
                        <div class="h1 fw-bold float-end text-primary">+5%</div>
                        <h2 class="mb-2">17</h2>
                        <p class="text-muted">Users online</p>
                        <div class="pull-in sparkline-fix">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('BKK2/assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{ asset('BKK2/assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('BKK2/assets/js/core/bootstrap.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{ asset('BKK2/assets/js/plugin/chart.js/chart.min.js')}}"></script>
<!-- jQuery Scrollbar -->
<script src="{{ asset('BKK2/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<!-- Kaiadmin JS -->
<script src="{{ asset('BKK2/assets/js/kaiadmin.min.js')}}"></script>
<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "ForIT", "Telkom", "Chlorine", "Kabayan", "Bara", "Titik Terang",
                "Scola",
            ],
            datasets: [{
                label: "Alumni masuk ke Perusahaan",
                backgroundColor: "rgb(23, 125, 255)",
                borderColor: "rgb(23, 125, 255)",
                data: [3, 2, 9, 5, 4, 6, 4, 6,],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>

@endsection


@endsection
