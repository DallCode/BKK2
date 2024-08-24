<?php
namespace App\Imports;

use App\Models\Alumni;
use App\Models\Users;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = Users::create([
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'role' => 'Alumni',
        ]);

        return new Alumni([
            'nik' => $row['nik'],
            'username' => $user->username,
            'nama' => $row['nama'],
            'jurusan' => $row['jurusan'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tahun_lulus' => $row['tahun_lulus'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nik' => 'required|string|max:16|unique:alumni,nik',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => ['required', Rule::in(['Laki-Laki', 'Perempuan'])],
            'jurusan' => 'required|string|max:100',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:4',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'tahun_lulus.required' => 'Tahun lulus wajib diisi.',
            'tahun_lulus.digits' => 'Tahun lulus harus terdiri dari 4 digit.',
            'tahun_lulus.min' => 'Tahun lulus tidak valid.',
            'tahun_lulus.max' => 'Tahun lulus tidak boleh lebih dari tahun ini.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',
        ];
    }
}
