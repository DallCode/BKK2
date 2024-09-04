<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
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
            ->get();


        return view('dashboardAlumni', compact('alumniLogin', 'Loker'));
    }
}
