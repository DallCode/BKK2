<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Alumni extends Model
{
    use HasFactory;
    protected $table = 'data_alumni';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $fillable = ['nik','username','nama','jurusan','jenis_kelamin','tahun_lulus','alamat','keahlian','foto','deskripsi','status'];
    public $timestamps = false;
    public function pengguna () : BelongsTo {
        return $this->belongsTo(Users::class);
    }

    public function lamaran () : HasMany {
        return $this->hasMany(Lamaran::class, 'nik', 'nik');
    }

    public function pendidikanformal () : HasMany {
        return $this->hasMany(PendidikanFormal::class);

    }
    public function pendidikannonformal () : HasMany {
        return $this->hasMany(PendidikanNonFormal::class);
    }

    public function kerja()
    {
        return $this->hasMany(Kerja::class, 'nik', 'nik');
    }

}
