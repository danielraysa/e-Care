<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table      = 'v_karyawan';
    protected $primaryKey = 'nik';
    public $timestamps = false;

    public function role_kary()
    {
        return $this->hasOne(UserRole::class, 'nik_nim', 'nik');
    }
}
