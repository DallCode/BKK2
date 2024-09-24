@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Profil Foto dan Nama -->
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/profile-picture.jpg') }}" alt="Foto Profil" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
            <h2 class="mt-3">{{ Auth::user()->alumni->nama }}</h2>
            <p>Alamat: Jalan Contoh No. 123, Kota Contoh</p>
            <p>No Telpon: (021) 12345678</p>
        </div>

        <!-- Riwayat Pendidikan, Pengalaman Kerja, dan Keahlian -->
        <div class="col-md-8">
            <!-- Riwayat Pendidikan -->
            <div class="mb-4">
                <h3>Riwayat Pendidikan</h3>
                <ul class="list-unstyled">
                    <li><strong>SD:</strong> SD Contoh</li>
                    <li><strong>SMP:</strong> SMP Contoh</li>
                    <li><strong>SMA/SMK:</strong> SMA Contoh / SMK Contoh</li>
                </ul>
            </div>

            <!-- Pengalaman Kerja -->
            <div class="mb-4">
                <h3>Pengalaman Kerja</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Posisi 1</strong> di Perusahaan 1 (Januari 2020 - Desember 2021)
                        <p>Deskripsi pengalaman kerja di perusahaan 1.</p>
                    </li>
                    <li>
                        <strong>Posisi 2</strong> di Perusahaan 2 (Januari 2022 - Sekarang)
                        <p>Deskripsi pengalaman kerja di perusahaan 2.</p>
                    </li>
                </ul>
            </div>

            <!-- Keahlian -->
            <div>
                <h3>Keahlian</h3>
                <ul class="list-unstyled">
                    <li>Keahlian 1</li>
                    <li>Keahlian 2</li>
                    <li>Keahlian 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

