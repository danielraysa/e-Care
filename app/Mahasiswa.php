<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    // protected $connection = 'oracle_temp';
    protected $table      = 'v_mhs';
    protected $primaryKey = 'nim';
    public $timestamps = false;
    protected $casts = [
        'nim' => 'string',
        'dosen_wl' => 'string',
    ];
    // lower case
    public function __get($key)
    {
        if (is_null($this->getAttribute($key))) {
            return $this->getAttribute(strtoupper($key));
        } else {
            return $this->getAttribute($key);
        }
    }

    public function role_mhs()
    {
        return $this->hasOne(UserRole::class, 'nik_nim', 'nim');
    }

    public function foto_mhs()
    {
        return "https://sicyca.dinamika.ac.id/static/foto/".$this->nim.".jpg";
    }
    
    public function dosen_wali()
    {
        return $this->hasOne(Karyawan::class, 'NIK', 'DOSEN_WL');
    }
}
