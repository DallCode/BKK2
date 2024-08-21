<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;

class ImportController extends Controller
{
    public function index()
    {
        return view('ImportdataAlumni');
    }

    public function import(Request $request) {
        try {
            Excel::import(new AlumniImport, $request->file('file'));
            return redirect()->back()->with([
                'alert' => 'File berhasil diimpor.',
                'alert_type' => 'success' // Tipe pesan: success, warning, danger
            ]);
        }
        catch (\ValidationException $e) {
            $errors = $e->errors();
            $errorMessages = [];
            foreach ($errors as $field => $messages) {
                if (is_array($messages)) {
                    $errorMessages[] = implode(', ', $messages);
                }
            }
            return redirect()->back()->with([
                'alert' => 'Kesalahan Validasi: ' . implode(', ', $errorMessages),
                'alert_type' => 'danger'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert' => 'Terjadi kesalahan saat mengimpor file.',
                'alert_type' => 'danger'
            ]);
        }
    }



}
