@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('BKK3/css/custom-bs.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/fonts/line-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('BKK3/css/quill.snow.css') }}">
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('BKK3/css/style.css') }}">

<section class="site-section" id="next">
    <div class="p-5">
        <div class="row mb-5 justify-content-left">
            <div class="col-md-7 text-left">
                <h2 class="section-title mb-2">Dashboard</h2>
            </div>
        </div>

           <!-- Search Form -->
           <form method="GET" action="{{ route('job.search') }}" class="mb-5">
            <div class="input-group ">
                <input type="text" name="search" class="form-control" placeholder="Cari lowongan..." value="{{ request()->query('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <ul class="job-listings mb-5">
            @if ($Loker->isEmpty())
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-center mx-4">
                        <p class="text-center">Saat ini tidak ada lowongan kerja yang dipublikasi.</p>
                    </div>
                </li>
            @else
                @foreach ($Loker as $loker)
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="{{ route('job.detail', $loker->id_lowongan_pekerjaan) }}"></a>
                    <div class="job-listing-logo">
                        <img src="{{ asset('BKK3/images/logo-kabayan-group.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{ $loker->jabatan }}</h2>
                            <strong>{{ $loker->perusahaan->nama }}</strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> {{ $loker->perusahaan->alamat }}
                        </div>
                        <div class="job-listing-meta">
                            <span class="badge badge-primary">{{ $loker->jenis_waktu_pekerjaan }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            @endif
        </ul>
    </div>
</section>



<!-- SCRIPTS -->
<script src="{{ asset('BKK3/js/jquery.min.js') }}"></script>
<script src="{{ asset('BKK3/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('BKK3/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('BKK3/js/stickyfill.min.js') }}"></script>
<script src="{{ asset('BKK3/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('BKK3/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('BKK3/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('BKK3/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('BKK3/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('BKK3/js/quill.min.js') }}"></script>
<script src="{{ asset('BKK3/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('BKK3/js/custom.js') }}"></script>

@endsection
