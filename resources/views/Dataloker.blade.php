@extends('layouts.main')

@section('content')

<!-- Fonts and icons -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('BKK2/assets/js/plugin/webfont/webfont.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
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
      urls: ["{{ asset('BKK2/assets/css/fonts.min.css')}}"],
    },
    active: function () {
      sessionStorage.fonts = true;
    },
  });
</script>
<script>
    @if (session('success'))
    $.notify({
        title: '<strong>Success</strong>',
        message: "{{ session('success') }}"
    },{
        type: 'success',
        placement: {
            from: "top",
            align: "right"
        },
        delay: 5000,
        timer: 1000
    });
@endif

</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/plugins.min.css')}}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/kaiadmin.min.css') }}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/demo.css')}}" />

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- @if (session('success'))
    console.log("Success: {{ session('success') }}");
@endif --}}


<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Loker</h3>
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
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJobModal">Tambah Data Loker</button>
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="alumni-table">
                                    @foreach($loker as $lowongan)
                                    <tr>
                                        <td>{{ $lowongan->jabatan }}</td>
                                        <td>{{ $lowongan->status }}</td>
                                        <td>
                                            <!-- Button to Open the Modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $lowongan->id_lowongan_pekerjaan }}">
                                                Lihat Detail
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" data-bs-backdrop="false" aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}">Detail Lowongan: {{ $lowongan->jabatan }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Jabatan:</strong> {{ $lowongan->jabatan }}</p>
                                                            <p><strong>Jenis Waktu Pekerjaan:</strong> {{ $lowongan->jenis_waktu_pekerjaan }}</p>
                                                            <p><strong>Deskripsi:</strong> {{ $lowongan->deskripsi }}</p>
                                                            <p><strong>Tanggal Akhir:</strong> {{ $lowongan->tanggal_akhir }}</p>
                                                            <p><strong>Status:</strong> {{ $lowongan->status }}</p>
                                                            @if (file_exists(public_path("alasan_lowongan_{$lowongan->id_lowongan_pekerjaan}.txt")))
                                                                @php
                                                                    $alasan = file_get_contents(public_path("alasan_lowongan_{$lowongan->id_lowongan_pekerjaan}.txt"));
                                                                @endphp
                                                                <div class="alert alert-info">
                                                                    <strong>Alasan Tidak Dipublikasi:</strong> {{ $alasan }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button to Open the Edit Modal -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $lowongan->id_lowongan_pekerjaan }}">
                                                Edit
                                            </button>

                                            <!-- The Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" data-bs-backdrop="false" aria-labelledby="editModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $lowongan->id_lowongan_pekerjaan }}">Edit Lowongan: {{ $lowongan->jabatan }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('lowongan.update', $lowongan->id_lowongan_pekerjaan) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="jabatan{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Jabatan Pekerjaan</label>
                                                                    <input class="form-control" type="text" id="jabatan{{ $lowongan->id_lowongan_pekerjaan }}" name="jabatan" value="{{ $lowongan->jabatan }}" placeholder="Jabatan pekerjaan" autofocus required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jenis_waktu_pekerjaan{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Jenis Waktu Pekerjaan</label>
                                                                    <select class="form-control" id="jenis_waktu_pekerjaan{{ $lowongan->id_lowongan_pekerjaan }}" name="jenis_waktu_pekerjaan" required>
                                                                        <option value="">Pilih Jenis Waktu Pekerjaan</option>
                                                                        <option value="Waktu Kerja Standar (Full-Time)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Standar (Full-Time)' ? 'selected' : '' }}>Waktu Kerja Standar (Full-Time)</option>
                                                                        <option value="Waktu Kerja Paruh Waktu (Part-Time)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Paruh Waktu (Part-Time)' ? 'selected' : '' }}>Waktu Kerja Paruh Waktu (Part-Time)</option>
                                                                        <option value="Waktu Kerja Fleksibel (Flexible Hours)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Fleksibel (Flexible Hours)' ? 'selected' : '' }}>Waktu Kerja Fleksibel (Flexible Hours)</option>
                                                                        <option value="Shift Kerja (Shift Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Shift Kerja (Shift Work)' ? 'selected' : '' }}>Shift Kerja (Shift Work)</option>
                                                                        <option value="Waktu Kerja Bergilir (Rotating Shift)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Bergilir (Rotating Shift)' ? 'selected' : '' }}>Waktu Kerja Bergilir (Rotating Shift)</option>
                                                                        <option value="Waktu Kerja Jarak Jauh (Remote work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Jarak Jauh (Remote work)' ? 'selected' : '' }}>Waktu Kerja Jarak Jauh (Remote work)</option>
                                                                        <option value="Waktu Kerja Kontrak (Contract Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Kontrak (Contract Work)' ? 'selected' : '' }}>Waktu Kerja Kontrak (Contract Work)</option>
                                                                        <option value="Waktu Kerja Proyek (Project-Based Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Proyek (Project-Based Work)' ? 'selected' : '' }}>Waktu Kerja Proyek (Project-Based Work)</option>
                                                                        <option value="Waktu Kerja Musiman (Seasonal Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Musiman (Seasonal Work)' ? 'selected' : '' }}>Waktu Kerja Musiman (Seasonal Work)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Deskripsi Pekerjaan</label>
                                                                    <textarea class="form-control" id="deskripsi{{ $lowongan->id_lowongan_pekerjaan }}" name="deskripsi" rows="4" required>{{ $lowongan->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tanggal_akhir{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Tanggal Akhir Lowongan</label>
                                                                    <input class="form-control" type="date" id="tanggal_akhir{{ $lowongan->id_lowongan_pekerjaan }}" name="tanggal_akhir" value="{{ $lowongan->tanggal_akhir }}" required />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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
    </div>
</div>

<!-- Modal untuk menambah data loker -->
<div class="modal fade" id="addJobModal" tabindex="-1" data-bs-backdrop="false" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Tambah Data Loker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('lowongan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan Pekerjaan</label>
                        <input class="form-control" type="text" id="jabatan" name="jabatan" placeholder="Jabatan pekerjaan" autofocus required />
                    </div>
                    <div class="mb-3">
                        <label for="jenis_waktu_pekerjaan" class="form-label">Jenis Waktu Pekerjaan</label>
                        <select class="form-control" id="jenis_waktu_pekerjaan" name="jenis_waktu_pekerjaan" required>
                            <option value="" selected>Pilih Jenis Waktu Pekerjaan</option>
                            <option value="Waktu Kerja Standar (Full-Time)" >Waktu Kerja Standar (Full-Time)</option>
                            <option value="Waktu Kerja Paruh Waktu (Part-Time)">Waktu Kerja Paruh Waktu (Part-Time)</option>
                            <option value="Waktu Kerja Fleksibel (Flexible Hours)" >Waktu Kerja Fleksibel (Flexible Hours)</option>
                            <option value="Shift Kerja (Shift Work)">Shift Kerja (Shift Work)</option>
                            <option value="Waktu Kerja Bergilir (Rotating Shift)">Waktu Kerja Bergilir (Rotating Shift)</option>
                            <option value="Waktu Kerja Jarak Jauh (Remote work)" >Waktu Kerja Jarak Jauh (Remote work)</option>
                            <option value="Waktu Kerja Kontrak (Contract Work)">Waktu Kerja Kontrak (Contract Work)</option>
                            <option value="Waktu Kerja Proyek (Project-Based Work)">Waktu Kerja Proyek (Project-Based Work)</option>
                            <option value="Waktu Kerja Musiman (Seasonal Work)">Waktu Kerja Musiman (Seasonal Work)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir Lowongan</label>
                        <input class="form-control" type="date" id="tanggal_akhir" name="tanggal_akhir" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('BKK2/assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{ asset('BKK2/assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('BKK2/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('BKK2/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<!-- Datatables -->
<script src="{{ asset('BKK2/assets/js/plugin/datatables/datatables.min.js')}}"></script>
<!-- Kaiadmin JS -->
<script src="{{ asset('BKK2/assets/js/kaiadmin.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable();
    });
</script>


@endsection
