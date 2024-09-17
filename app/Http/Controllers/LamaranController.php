<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function store(Request $request)
    {
       $lamaran = Lamaran::create([
        'id_lowongan_pekerjaan' => $request->input('id_lowongan_pekerjaan'),
        'nik' => Alumni::where('username', Auth::user()->username)->first()
       ]);
    }
}
