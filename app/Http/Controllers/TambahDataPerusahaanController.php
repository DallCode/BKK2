<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;




class TambahDataPerusahaanController extends Controller
{
    public function index()
    {
        return view('Tambahdataperusahaan');
    }

    public function store(Request $request)
{

    // return $request;
    $request->validate([
        'username' => 'required|string|max:255',
        'password' => 'required|string',
    ]);

    $pengguna = Users::create([
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
        'role' => 'Perusahaan',
    ]);

    Perusahaan::create([
        'id_data_perusahaan' => $pengguna->id_data_perusahaan ,
        'username' => $pengguna->username,
        'nama' => $request->input('nama'),
        'bidang_usaha' => $request->input('bidang_usaha'),
        'no_telepon' => $request->input('no_telepon'),
        'alamat' => $request->input('alamat'),
    ]);

    // Perusahaan::create($validated);
    return redirect('/tambahdataperusahaan')->with('success', 'Data berhasil ditambahkan');
}
}
