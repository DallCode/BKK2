<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'username',
        'name',
        'password',
        'role',
    ];

    public function aktivitas () : HasMany {
        return $this->hasMany(Aktivitas::class, 'username');
    }

    public function perusahaan() : HasOne
    {
        return $this->hasOne(Perusahaan::class, 'username');
    }

    public function alumni() : HasOne
    {
        return $this->hasOne(Alumni::class, 'username');
    }
}
