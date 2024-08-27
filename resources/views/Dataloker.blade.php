@extends('layouts.main')

@section('content')

<!-- Fonts and icons -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('BKK2/assets/js/plugin/webfont/webfont.min.js')}}"></script>
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

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/plugins.min.css')}}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/kaiadmin.min.css') }}" />
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/demo.css')}}" />

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
                                            <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
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
                                            <div class="modal fade" id="editModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" aria-labelledby="editModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
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
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Tambah Data Loker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lowongan.store') }}"  method="POST">
                    @csrf
                    <!-- Form input sesuai yang sebelumnya -->
                    <div class="mb-3">
                        <label for="jabatan_pekerjaan" class="form-label" required>Jabatan Pekerjaan</label>
                        <input class="form-control" type="text" id="jabatan_pekerjaan" name="jabatan_pekerjaan" placeholder="Jabatan pekerjaan" autofocus required />
                    </div>
                    <div class="mb-3">
                        <label for="jenis_waktu_pekerjaan" class="form-label">Jenis Waktu Pekerjaan</label>
                        <select class="form-control" id="jenis_waktu_pekerjaan" name="jenis_waktu_pekerjaan" required>
                            <option value="">Pilih Jenis Waktu Pekerjaan</option>
                            <option value="Waktu Kerja Standar (Full-Time)">Waktu Kerja Standar (Full-Time)</option>
                            <option value="Waktu Kerja Paruh Waktu (Part-Time)">Waktu Kerja Paruh Waktu (Part-Time)</option>
                            <option value="Waktu Kerja Fleksibel (Flexible Hours)">Waktu Kerja Fleksibel (Flexible Hours)</option>
                            <option value="Shift Kerja (Shift Work)">Shift Kerja (Shift Work)</option>
                            <option value="Waktu Kerja Bergilir (Rotating Shift)">Waktu Kerja Bergilir (Rotating Shift)</option>
                            <option value="Waktu Kerja Jarak Jarah (Remote work)">Waktu Kerja Jarak Jarah (Remote work)</option>
                            <option value="Waktu Kerja Kontrak (Contract Work)">Waktu Kerja Kontrak (Contract Work)</option>
                            <option value="Waktu Kerja Proyek (Project-Based Work)">Waktu Kerja Proyek (Project-Based Work)</option>
                            <option value="Waktu Kerja Tidak Teratur (Irregular Work)">Waktu Kerja Tidak Teratur (Irregular Work)</option>
                            <option value="Waktu Kerja Sementara (Temporary Work)">Waktu Kerja Sementara (Temporary Work)</option>
                            <!-- Tambahkan opsi lainnya jika diperlukan -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label">Batas Waktu</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Batas Waktu" required />
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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
<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('BKK2/assets/js/setting-demo2.js')}}"></script>
<script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});

    // Filter select dropdowns
    $("#multi-filter-select").DataTable({
      pageLength: 5,
      initComplete: function () {
        this.api()
          .columns()
          .every(function () {
            var column = this;
            var select = $('<select class="form-select"><option value=""></option></select>')
              .appendTo($(column.footer()).empty())
              .on("change", function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? "^" + val + "$" : "", true, false).draw();
              });
            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
          });
      },
    });

    // Add Row functionality
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
      '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function () {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action,
        ]);
      $("#addRowModal").modal("hide");
    });

    // Show notify on success
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
  });
</script>
