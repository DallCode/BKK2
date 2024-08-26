@extends('layouts.main')

@section('content')

<!-- Fonts and icons -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('BKK2/assets/css/demo.css')}}" />

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Data Alumni</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="{{route('dashboard')}}">
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
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Jurusan</th>
                      <th>Tahun Lulus</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="alumni-table">
                    @foreach ($alumni as $all)
                    <tr>
                        <td>
                          {{$all->nik}}
                        </td>
                        <td>
                            {{$all->nama}}
                        </td>
                        <td>
                            {{$all->jurusan}}
                        </td>
                        <td>
                            {{$all->tahun_lulus}}
                        </td>
                        <td>
                          <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $all->nik }}">Detail</button>
                            <div class="modal fade" id="exampleModal-{{ $all->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $all->nik }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-{{ $all->nik}}">Detail Alumni</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Modal body content here -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4 d-flex justify-content-center">
                                                    <!-- Avatar image -->
                                                    <img src="{{ $all->foto }}" class="img-fluid rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <h6 class="card-title">Informasi Alumni</h6>
                                                            <ul class="list-unstyled">
                                                                <li><strong>NIK:</strong> {{ $all->nik }}</li>
                                                                <li><strong>Nama:</strong> {{ $all->nama }}</li>
                                                                <li><strong>Jurusan:</strong> {{ $all->jurusan }}</li>
                                                                <li><strong>Tahun Lulus:</strong> {{ $all->tahun_lulus }}</li>
                                                                <li><strong>Foto:</strong> {{ $all->avatar }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
        
                                                    <div class="accordion" id="accordionExample-{{ $all->nik }}">
                                                        <!-- Accordion items can be added here -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne-{{ $all->nik }}">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $all->nik }}" aria-expanded="true" aria-controls="collapseOne-{{ $all->nik }}">
                                                                    Additional Information
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne-{{ $all->nik}}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{ $all->nik }}" data-bs-parent="#accordionExample-{{ $all->nik }}">
                                                                <div class="accordion-body">
                                                                    <!-- Add additional information here -->
                                                                    {{ $all->deskripsi }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- You can add more accordion items here if needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $all->nik }}">Edit</button>
                    <div class="modal fade" id="editModal-{{ $all->nik }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $all->nik }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel-{{ $all->nik }}">Edit Alumni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                            <form action="{{ route('alumni.update', $all->nik) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <!-- Avatar image -->
                                            <img src="{{ $all->foto }}" class="img-fluid rounded-circle mb-3" alt="Avatar" style="width: 150px; height: 150px;">
                                            <div class="mb-3">
                                                <label for="avatar" class="form-label">Update Avatar</label>
                                                <input class="form-control" type="file" id="avatar" name="avatar">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title">Informasi Alumni</h6>
                                                    <div class="mb-3">
                                                        <label for="nik" class="form-label">NIK</label>
                                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $all->nik }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $all->nama }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jurusan" class="form-label">Jurusan</label>
                                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $all->jurusan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ $all->tahun_lulus }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion" id="accordionExample-{{ $all->nik }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne-{{ $all->nik }}">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $all->nik }}" aria-expanded="true" aria-controls="collapseOne-{{ $all->nik }}">
                                                            Additional Information
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-{{ $all->nik }}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{ $all->nik }}" data-bs-parent="#accordionExample-{{ $all->nik }}">
                                                        <div class="accordion-body">
                                                            <!-- Add additional information fields here -->
                                                            <div class="mb-3">
                                                                <label for="additional_info" class="form-label">Additional Information</label>
                                                                <textarea class="form-control" id="additional_info" name="additional_info">{{ $all->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- You can add more accordion items here if needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                        </td>                     
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jurusan</th>
                        <th>Tahun Lulus</th>
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
   <!-- Kaiadmin DEMO methods, don't include it in your project! -->
   <script src="{{ asset('BKK2/assets/js/setting-demo2.js')}}"></script>
   <script>
     $(document).ready(function () {
       $("#basic-datatables").DataTable({});

       $("#multi-filter-select").DataTable({
         pageLength: 5,
         initComplete: function () {
           this.api()
             .columns()
             .every(function () {
               var column = this;
               var select = $(
                 '<select class="form-select"><option value=""></option></select>'
               )
                 .appendTo($(column.footer()).empty())
                 .on("change", function () {
                   var val = $.fn.dataTable.util.escapeRegex($(this).val());

                   column
                     .search(val ? "^" + val + "$" : "", true, false)
                     .draw();
                 });

               column
                 .data()
                 .unique()
                 .sort()
                 .each(function (d, j) {
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
     });
   </script>
@endsection