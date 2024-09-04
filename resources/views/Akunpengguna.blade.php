@extends('layouts.main')

@section('content')

<!-- Fonts and icons -->
<script src="{{ asset('BKK2/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{ asset('BKK2/assets/css/fonts.min.css') }}"],
        },
        active: function () {
            sessionStorage.fonts = true;
        },
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/kaiadmin.min.css') }}" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/demo.css') }}" />

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Akun Pengguna</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="alumni-table">
                                    @foreach($users as $us)
                                    <tr>
                                        <td>{{ $us->username }}</td>
                                        <td>{{ $us->role }}</td>
                                        <td>
                                            <!-- Button to trigger the modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aktivitasPenggunaModal{{ $us->username }}">
                                                Pemantauan
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="aktivitasPenggunaModal{{ $us->username }}" tabindex="-1" aria-labelledby="aktivitasPenggunaModalLabel{{ $us->username }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="aktivitasPenggunaModalLabel{{ $us->username }}">Aktivitas Pengguna: {{ $us->username }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Waktu</th>
                                                                            <th scope="col">Keterangan</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Pastikan Anda mem-filter aktivitas berdasarkan pengguna -->
                                                                        @foreach ($aktivitas as $ak) <!-- Jika Anda memiliki relasi -->
                                                                        <tr>
                                                                            <td>{{ $ak->tanggal }}</td>
                                                                            <td>{{ $ak->keterangan }}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
