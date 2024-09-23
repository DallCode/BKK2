@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2>Informasi Lowongan Pekerjaan</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('job.search') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari lowongan..."
                    value="{{ request()->query('search') }}">
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
                                <i class="fas fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($item->waktu)->format('j M Y H:i') }} sampai
                                {{ $item->tanggal_akhir }}<br>
                            </p>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <a href="{{ route('job.detail', $item->id_lowongan_pekerjaan) }}"
                                class="btn btn-primary">Detail</a>
                            <button class="btn btn-outline-primary ml-2" data-bs-toggle="modal"
                                data-bs-target="#lamarModal{{ $item->id_lowongan_pekerjaan }}">Lamar</button>
                        </div>
                    </div>
                </div>

               <!-- Modal Lamar -->
<div class="modal fade" id="lamarModal{{ $item->id_lowongan_pekerjaan }}" tabindex="-1"
    aria-labelledby="lamarModalLabel{{ $item->id_lowongan_pekerjaan }}" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="lamarModalLabel{{ $item->id_lowongan_pekerjaan }}">Upload File Tambahan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <p>Jika Anda tidak mengupload file tambahan, maka kami akan menggunakan informasi dari profil Anda.</p>
               <!-- File Upload Form -->
               <form method="POST" action="{{ route('lamar', $item->id_lowongan_pekerjaan) }}"
                     enctype="multipart/form-data" id="lamarForm{{ $item->id_lowongan_pekerjaan }}">
                   @csrf
                   <div class="mb-3">
                       <label for="file_tambahan{{ $item->id_lowongan_pekerjaan }}" class="form-label">Upload File Tambahan (opsional)</label>
                       <input type="file" class="form-control"
                              id="file_tambahan{{ $item->id_lowongan_pekerjaan }}" name="file_tambahan">
                       <div class="invalid-feedback" id="fileError{{ $item->id_lowongan_pekerjaan }}" style="display: none;">
                           Mohon upload file terlebih dahulu.
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                       <button type="submit" class="btn btn-primary" onclick="return validateFile('{{ $item->id_lowongan_pekerjaan }}')">Submit Lamaran</button>
                   </div>
               </form>
           </div>
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

    <script>
        function validateFile(itemId) {
            const fileInput = document.getElementById('file_tambahan' + itemId);
            const errorDiv = document.getElementById('fileError' + itemId);

            if (!fileInput.files.length) {
                errorDiv.style.display = 'block'; // Tampilkan pesan kesalahan
                return false; // Cegah form dari pengiriman
            } else {
                errorDiv.style.display = 'none'; // Sembunyikan pesan kesalahan
                return true; // Izinkan pengiriman form
            }
        }
    </script>

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

    .modal-backdrop {
    pointer-events: none; /* Nonaktifkan interaksi dengan backdrop */
}
</style>
@endsection


