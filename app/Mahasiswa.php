<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table      = 'v_mhs';
    protected $primaryKey = 'nim';
    public $timestamps = false;

    public function role_mhs()
    {
        return $this->hasOne(UserRole::class, 'nik_nim', 'nim');
    }
}
