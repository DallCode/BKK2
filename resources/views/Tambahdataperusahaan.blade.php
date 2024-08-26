@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Form Tambah Perusahaan</h2>
    <form action="{{ route('tambahdataperusahaan') }}" method="POST">
        @csrf
        <!-- Nama Perusahaan -->
        <div class="form-group">
            <label for="nama">Nama Perusahaan:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>

        <!-- Bidang Usaha -->
        <div class="form-group">
            <label for="bidang_usaha">Bidang Usaha:</label>
            <input type="text" id="bidang_usaha" name="bidang_usaha" class="form-control" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon:</label>
            <input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" class="form-control" required></textarea>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="username" id="username" name="username" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <input type="submit" value="Tambah Perusahaan" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection