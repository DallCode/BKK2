<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Perusahaan;
use App\Models\Users;
use Illuminate\Http\Request;

class DashboardadminController extends Controller
{
    public function index()
    {
        // Menghitung semua data alumni
        $jumlahAlumni = Alumni::count();
        $jumlahPerusahaan = Perusahaan::count();
        return view('dashboardAdmin', compact('jumlahAlumni', 'jumlahPerusahaan',));
    }
}



