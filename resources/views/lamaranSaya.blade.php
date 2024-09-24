@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Data Alumni</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="{{ route('dashboardalumni') }}">
              <i class="icon-home"></i>
            </a>
          </li>
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
                  class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nama Perusahaan</th>
                      <th>Posisi</th>
                      <th>status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lamaranSaya as $lamaran)
                    <tr>
                        <td>{{ $lamaran->loker->perusahaan->nama }}</td>
                        <td>{{ $lamaran->loker->jabatan }}</td>
                        <td>{{ $lamaran->status }}</td>
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

@endsection
