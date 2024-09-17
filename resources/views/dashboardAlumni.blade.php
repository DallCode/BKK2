@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Informasi Lowongan Pekerjaan</h2>

  <!-- Search Form -->
  <form method="GET" action="{{ route('job.search') }}" class="mb-5">
    <div class="input-group ">
        <input type="text" name="search" class="form-control" placeholder="Cari lowongan..." value="{{ request()->query('search') }}">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form>

    <div class="row">
        @forelse($Loker as $item)
            <div class="col-md-6 mb-4">
                <div class="card hover-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->jabatan }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->perusahaan->nama }}</h6>
                        <p class="card-text">
                            <i class="fas fa-clock"></i> {{ $item->jenis_waktu_pekerjaan }}<br>
                            <i class="fas fa-map-marker-alt"></i> {{ $item->perusahaan->alamat }}<br>
                            <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($item->waktu)->format('j M Y H:i')  }} sampai {{ $item->tanggal_akhir }}<br>
                        </p>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <a href="{{ route('job.detail', $item->id_lowongan_pekerjaan) }}" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-outline-primary ml-2" data-bs-toggle="modal" data-bs-target="#lamarModal">Lamar</a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <strong>Belum ada lowongan</strong>
                </div>
            </div>
        @endforelse

         <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $Loker->links() }}
    </div>
    </div>
</div>
@endsection

<style>
    .card {
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-body {
        display: flex;
        flex-direction: column;
    }
    .card-text {
        flex-grow: 1;
    }
    .fas {
        width: 20px;
        text-align: center;
        margin-right: 5px;
    }
    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
    .btn-outline-primary.ml-2 {
        margin-top: 0.5rem;
    }
</style>
