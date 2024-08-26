<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class DashboardadminController extends Controller
{
    public function index()
    {
        $jumlahAlumni = Alumni::count();
        $jumlahPerusahaan = Perusahaan::count();

        // Hitung jumlah alumni berdasarkan status kerja
        $jumlahBekerja = Alumni::where('status', 'bekerja')->count();
        $jumlahBelumBekerja = Alumni::where('status', 'belum_bekerja')->count();

        return view('dashboardAdmin', compact('jumlahAlumni', 'jumlahPerusahaan', 'jumlahBekerja', 'jumlahBelumBekerja'));
    }
}
