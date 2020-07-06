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

    public function foto_mhs()
    {
        return "https://sicyca.dinamika.ac.id/photo/s_".$this->nim.".jpg";
    }
    
    public function dosen_wali()
    {
        return $this->hasOne(Karyawan::class, 'nik', 'dosen_wl');
    }
}
