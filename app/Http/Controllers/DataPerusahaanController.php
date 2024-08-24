<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class DataperusahaanController extends Controller
{
    public function index()
    {
        // Menghitung semua data alumni
        $perusahaan = Perusahaan::All();
        return view('Dataperusahaan', compact('perusahaan',));
    }

    

}



