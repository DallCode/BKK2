<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class DashboardalumniController extends Controller
{
    public function index()
    {
        $alumniLogin = Alumni::where('username', Auth::user()->username)->first();
        return view('dashboardAlumni', compact('alumniLogin'));
    }

}
