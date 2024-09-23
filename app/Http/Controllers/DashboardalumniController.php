<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\FileLamaran;
use App\Models\Lamaran;
use App\Models\Loker;
use Illuminate\Support\Facades\Auth;

class DashboardalumniController extends Controller
{
    public function index(Request $request)
    {
        $alumniLogin = Alumni::where('username', Auth::user()->username)->first();

        $query = request()->query('search'); // Mengambil query pencarian dari request

        $Loker = Loker::where('status', 'Dipublikasi')
            ->when($query, function($queryBuilder) use ($query) {
                // Filter berdasarkan jabatan dan nama perusahaan
                $queryBuilder->where(function($q) use ($query) {
                    $q->where('jabatan', 'like', "%{$query}%")
                      ->orWhereHas('perusahaan', function($q) use ($query) {
                          $q->where('nama', 'like', "%{$query}%");
                      });
                });
            })
            ->with('perusahaan') // Eager load perusahaan untuk menghindari N+1 query
            ->paginate(10);
            // ->get();


        return view('dashboardAlumni', compact('alumniLogin', 'Loker'));
    }

    public function store(Request $request, $id)
    {
        // Validasi file jika ada
        $request->validate([
            'file_tambahan' => 'nullable|file|mimes:pdf|max:2048', // Tambahkan aturan validasi sesuai kebutuhan
        ]);

        // Logika untuk menyimpan lamaran
        $lamaran = Lamaran::findOrFail($id); // Temukan lamaran berdasarkan ID
        // (Di sini bisa ditambahkan logika untuk membuat atau mengupdate data lamaran)

        // Jika ada file tambahan, simpan ke storage
        if ($request->hasFile('file_tambahan')) {
            $file = $request->file('file_tambahan');
            $path = $file->store('uploads/lamaran'); // Simpan file di folder public/uploads/lamaran

            // Simpan informasi file ke tabel file_lamaran
            FileLamaran::create([
                'id_lamaran' => $lamaran->id, // Pastikan id_lamaran ada di tabel lamaran
                'file_path' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim.');
    }
}
