<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loker;

class JobDetailController extends Controller
{
    public function show($id)
    {
        // Ambil data loker berdasarkan ID
        $loker = Loker::with('perusahaan')->findOrFail($id);

        // Tampilkan halaman detail pekerjaan
        return view('Jobdetail', compact('loker'));
    }
}
