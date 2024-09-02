<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardadminController extends Controller
{
    public function index()
    {
        // Mengambil data perusahaan berdasarkan username user yang sedang login
        // if (Auth::user()->role == 'Alumni') {
        //     return redirect('/dashboardalumni');
        // }

        $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();
        $alumniLogin = Alumni::where('username', Auth::user()->username)->first();

        // Menghitung jumlah alumni dan perusahaan
        $jumlahAlumni = Alumni::count();
        $jumlahPerusahaan = Perusahaan::count();

        // Jika Anda ingin mengembalikan tampilan dashboardAdmin dengan data alumni dan perusahaan
        return view('dashboardAdmin', compact('jumlahAlumni', 'jumlahPerusahaan','perusahaanLogin','alumniLogin'));

        // Jika Anda ingin mengembalikan tampilan dashboardPerusahaan dengan data perusahaanLogin
        // return view('dashboardPerusahaan', compact('perusahaanLogin'));
    }
}
