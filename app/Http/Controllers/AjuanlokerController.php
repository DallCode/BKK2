<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjuanlokerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $loker = Loker::all(); // Mengambil semua data lowongan
        // return view('Lokeradmin', compact('perusahaanLogin', 'loker'));
        return view('Ajuanloker', compact('loker')); // Mengirimkan data ke view
    }

    public function updateStatus(Request $request, $id)
{
    $lowongan = Loker::findOrFail($id);
    $lowongan->status = $request->status;
    $lowongan->save();

    return redirect()->back()->with('success', 'Status lowongan berhasil diubah.');
}

}
