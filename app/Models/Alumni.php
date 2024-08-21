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
    protected $fillable = ['nik','username','nama','jurusan','jenis_kelamin','tahun_lulus','alamat','keahlian','foto','deskripsi'];
    public $timestamps = false;
    public function pengguna () : BelongsTo {
        return $this->belongsTo(Users::class);
    }

    public function lamaran () : HasMany {
        return $this->hasMany(Lamaran::class);
    }

    public function pendidikan () : HasMany {
        return $this->hasMany(pendidikan::class);
    }

    public function kerja () : HasMany {
        return $this->hasMany(kerja::class);
    }
}
