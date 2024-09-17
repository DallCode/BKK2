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
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/demo.css') }}" />

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Data Perusahaan</h3>
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
                <table
                  id="basic-datatables"
                  class="display table table-striped table-hover"
                >
                  <thead>
                    <tr>
                      <th>Nama Perusahaan</th>
                      <th>Bidang Usaha</th>
                      <th>Nomor Telepon</th>
                      <th>Alamat</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="alumni-table">
                    @foreach ($perusahaan as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->bidang_usaha }}</td>
                        <td>{{ $p->no_telepon }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->status }}</td>
                        <td>
                          <!-- Button trigger modal edit -->
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $p->id_data_perusahaan }}">
                              Edit
                          </button>

                          <!-- Modal for edit -->
                          <div class="modal fade" id="editModal-{{ $p->id_data_perusahaan }}" tabindex="-1"  data-bs-backdrop="false" aria-labelledby="editModalLabel-{{ $p->id_data_perusahaan }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editModalLabel-{{ $p->id_data_perusahaan }}">Edit Perusahaan</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <!-- Form for edit -->
                                  <form action="{{ route('perusahaan.update', $p->id_data_perusahaan) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="nama" class="form-label">Nama Perusahaan</label>
                                      <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                                      <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" value="{{ $p->bidang_usaha }}" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="no_telepon" class="form-label">No Telepon</label>
                                      <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $p->no_telepon }}" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="alamat" class="form-label">Alamat</label>
                                      <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $p->alamat }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label for="status" class="form-label">Status</label>
                                      <select class="form-select" id="status" name="status" required>
                                        <option value="aktif" {{ $p->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak aktif" {{ $p->status === 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                      </select>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
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
                      <th>Nama Perusahaan</th>
                      <th>Bidang Usaha</th>
                      <th>Nomor Telepon</th>
                      <th>Alamat</th>
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
  $(document).ready(function () {
    $("#basic-datatables").DataTable();

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

            column.data().unique().sort().each(function (d) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
          });
      },
    });

    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    $("#addRowButton").click(function () {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>',
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
