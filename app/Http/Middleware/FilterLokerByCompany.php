<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterLokerByCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $perusahaan = Auth::user()->perusahaan; // Pastikan user memiliki relasi ke perusahaan
        
        // Filter query berdasarkan perusahaan yang login
        if ($perusahaan) {
            $request->merge([
                'filtered_loker' => $request->route('loker')->where('id_data_perusahaan', $perusahaan->id_data_perusahaan)
            ]);
        }

        return $next($request);
    }
}
