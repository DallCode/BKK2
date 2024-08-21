<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\pengguna;
use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USe Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function show () {
        if(!Auth::user()) {
            return view('auth.login');
        }
        return redirect()->back();
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $user = User::where('username', $request->username)->first();
    $perusahaan = Perusahaan::where('username', $user->username)->first();


    if (!$user) {
        return redirect()->back()->with('error', 'Username tidak terdaftar pada aplikasi.');
    }

    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with('error', 'Password yang Anda masukkan salah.');
    }

    if ($user->role == 'Perusahaan' && $perusahaan->status == 'Tidak Aktif') {
        return redirect()->back()->with('error', 'Akun Tidak Aktif.');
    }
    Auth::login($user);
    $role = $user->role;

    return redirect()->route('dashboard', compact('role'));
}

    public function logout () {
        return Auth::user();
        Auth::logout();
        return redirect()->route('login');
    }
}
