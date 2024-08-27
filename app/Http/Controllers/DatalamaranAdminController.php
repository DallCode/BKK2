<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatalamaranAdminController extends Controller
{
    public function index()
    {
        return view('DatalamaranAdmin');
    }
}
