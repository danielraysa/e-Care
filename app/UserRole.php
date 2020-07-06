<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function data_mhs()
    {
        return $this->hasOne(Mahasiswa::class, 'nim', 'nik_nim');
    }

    public function data_kons()
    {
        return $this->hasOne(Counselor::class, 'nim', 'nik_nim');
    }

    public function data_kary()
    {
        return $this->hasOne(Karyawan::class, 'nim', 'nik_nim');
    }
    
}
