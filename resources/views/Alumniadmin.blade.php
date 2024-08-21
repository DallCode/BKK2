@extends('layouts.main')

@section('content')

<!-- Fonts and icons -->
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
                            tes
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
