<?php

namespace App\Http\Controllers;
use App\Models\Alumni;
use App\Models\PendidikanFormal;


use Illuminate\Http\Request;

class ProfAlumniController extends Controller
{
    public function index()
    {
        $user = Alumni::all(); // Atau ambil data pengguna dari database sesuai kebutuhan
        return view('profilealumni', compact('user'));
    }
}
