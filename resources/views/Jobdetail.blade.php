<!doctype html>
<html lang="en">
<head>
    <title>Karier Sebelas</title>
    <link
      rel="icon"
      href="{{ asset ('BKK2/assets/img/kaiadmin/karir1.png')}}"
      type="image/x-icon"
    />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('BKK3/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BKK3/css/style.css') }}">
</head>
<body id="top">

    <div class="site-wrap">
        <!-- HOME -->
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <!-- Content Here -->
                </div>
            </div>
        </div>

        <section class="site-section">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <div class="border p-2 d-inline-block mr-3 rounded">
                                <img src="{{ asset('BKK3/images/logo-kabayan-group.png') }}" alt="Image" style="height: 100px; width:auto">
                            </div>
                            <div>
                                <h2>{{ $loker->jabatan }}</h2>
                                <div>
                                    <span class="ml-0 mr-2 mb-2">
                                        <span class="icon-briefcase mr-2"></span>{{ $loker->perusahaan->nama }}
                                    </span>
                                    <span class="m-2">
                                        <span class="icon-room mr-2"></span>{{ $loker->perusahaan->alamat }}
                                    </span>
                                    <span class="m-2">
                                        <span class="icon-clock-o mr-2"></span>
                                        <span class="text-info">{{ $loker->jenis_waktu_pekerjaan }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-info">
                                <span class="icon-align-left mr-3"></span>Deskripsi Pekerjaan
                            </h3>
                            <p>{{ $loker->deskripsi }}</p>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-info">
                                <span class="icon-rocket mr-3"></span>Responsibilities
                            </h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2">
                                    <span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-info">
                                <span class="icon-book mr-3"></span>Education + Experience
                            </h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2">
                                    <span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-info">
                                <span class="icon-turned_in mr-3"></span>Other Benefits
                            </h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2">
                                    <span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span>
                                </li>
                            </ul>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                <a href=" {{ route('dashboardalumni') }} " class="btn btn-block btn-light btn-md">
                                    <span class=""></span>Kembali
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-block btn-info btn-md">Lamar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-info mt-3 h5 pl-3 mb-3">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{ $loker->jenis_waktu_pekerjaan }} </li>
                                <li class="mb-2"><strong class="text-black">Alamat:</strong> {{ $loker->alamat }} </li>
                                <li class="mb-2"><strong class="text-black">Gaji:</strong> $60k - $100k</li>
                                <li class="mb-2"><strong class="text-black">Tanggal Akhir:</strong> {{ $loker->tanggal_akhir }}</li>
                            </ul>
                        </div>

                        {{-- <div class="bg-light p-3 border rounded">
                            <h3 class="text-info mt-3 h5 pl-3 mb-3">Share</h3>
                            <div class="px-3">
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- CSS Files (Duplicated Links Removed) -->
</body>
</html>
