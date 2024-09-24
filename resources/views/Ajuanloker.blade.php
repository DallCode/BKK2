@extends('layouts.main')

@section('content')
    <!-- Fonts and icons -->
    <script src="{{ asset('BKK2/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('BKK2/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('BKK2/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('BKK2/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('BKK2/assets/css/kaiadmin.min.css') }}" />


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Ajuan Loker</h3>
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
                                            <th>Jabatan</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="alumni-table">
                                        @foreach ($loker as $lowongan)
                                            <tr data-status="{{ $lowongan->status }}">
                                                <td>{{ $lowongan->jabatan }}</td>
                                                <td>{{ $lowongan->status }}</td>
                                                <td>
                                                    <!-- Button to Open the Modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $lowongan->id_lowongan_pekerjaan }}">
                                                        Lihat Detail
                                                    </button>

                                                    <!-- The Modal -->
                                                    <div class="modal fade"
                                                        id="detailModal{{ $lowongan->id_lowongan_pekerjaan }}"
                                                        tabindex="-1" data-bs-backdrop="false"
                                                        aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}">
                                                                        Detail Lowongan : {{ $lowongan->jabatan }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>Perusahaan:</strong>
                                                                        {{ $lowongan->perusahaan->nama }}</p>
                                                                    <p><strong>Jenis Waktu Pekerjaan:</strong>
                                                                        {{ $lowongan->jenis_waktu_pekerjaan }}</p>
                                                                    <p><strong>Deskripsi:</strong>
                                                                        {{ $lowongan->deskripsi }}</p>
                                                                    <p><strong>Tanggal Akhir:</strong>
                                                                        {{ $lowongan->tanggal_akhir }}</p>
                                                                    <p><strong>Status:</strong> {{ $lowongan->status }}</p>

                                                                    <!-- Dropdown to change status -->
                                                                    <form
                                                                        action="{{ route('update.status', $lowongan->id_lowongan_pekerjaan) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="mb-3">
                                                                            <label
                                                                                for="status{{ $lowongan->id_lowongan_pekerjaan }}"
                                                                                class="form-label"><strong>Ubah
                                                                                    Status:</strong></label>
                                                                            <select class="form-select"
                                                                                id="status{{ $lowongan->id_lowongan_pekerjaan }}"
                                                                                name="status"
                                                                                onchange="toggleTextarea(this)">
                                                                                <option value="Dipublikasi"
                                                                                    {{ $lowongan->status == 'Dipublikasi' ? 'selected' : '' }}>
                                                                                    Dipublikasi</option>
                                                                                <option value="Tidak Dipublikasi"
                                                                                    {{ $lowongan->status == 'Tidak Dipublikasi' ? 'selected' : '' }}>
                                                                                    Tidak Dipublikasi</option>
                                                                            </select>
                                                                        </div>

                                                                        <!-- Textarea for alasan -->
                                                                        <div class="mb-3"
                                                                            id="alasanContainer{{ $lowongan->id_lowongan_pekerjaan }}"
                                                                            style="display: none;">
                                                                            <label
                                                                                for="alasan{{ $lowongan->id_lowongan_pekerjaan }}"
                                                                                class="form-label"><strong>Alasan Tidak
                                                                                    Dipublikasi:</strong></label>
                                                                            <textarea class="form-control" id="alasan{{ $lowongan->id_lowongan_pekerjaan }}" name="alasan" rows="3"></textarea>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-success">Simpan
                                                                                Perubahan</button>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
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
                                            <th>Jabatan</th>
                                            <th>Status</th>
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

    <!-- Core JS Files -->
    <script src="{{ asset('BKK2/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('BKK2/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('BKK2/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('BKK2/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('BKK2/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('BKK2/assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('BKK2/assets/js/setting-demo2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable();

            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });

            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function() {
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
                }, {
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

        function toggleTextarea(selectElement) {
            var alasanContainer = document.getElementById('alasanContainer{{ $lowongan->id_lowongan_pekerjaan }}');
            if (selectElement.value === 'Tidak Dipublikasi') {
                alasanContainer.style.display = 'block';
            } else {
                alasanContainer.style.display = 'none';
            }
        }

        // Initialize textarea visibility based on current status
        document.addEventListener('DOMContentLoaded', function() {
            var statusSelect = document.getElementById('status{{ $lowongan->id_lowongan_pekerjaan }}');
            toggleTextarea(statusSelect);
        });
    </script>
@endsection
