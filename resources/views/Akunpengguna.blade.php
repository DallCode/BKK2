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

<style>
    /* Membuat body halaman bisa di-scroll */
    html, body {
      height: 100%;
      overflow-y: auto;
    }

    /* Membatasi tinggi container dan mengizinkan scroll */
    .page-inner {
      height: 100vh; /* 100% dari tinggi viewport */
      overflow-y: auto;
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
* ::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
* {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
  </style>

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
                                            <div class="modal fade" id="aktivitasPenggunaModal{{ $us->username }}" tabindex="-1" data-bs-backdrop="false" aria-labelledby="aktivitasPenggunaModalLabel{{ $us->usernmae }}" aria-hidden="true">
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
                                                                        @foreach ($aktivitas->where('username', $us->username) as $ak)
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

@endsection
