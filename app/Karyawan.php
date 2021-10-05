<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $connection = 'oracle';
    protected $table      = 'v_karyawan';
    protected $primaryKey = 'nik';
    public $timestamps = false;
    protected $casts = [
        'nik' => 'string'
    ];
    // lower case
    /* public function __get($key)
    {
        if (is_null($this->getAttribute($key))) {
            return $this->getAttribute(strtoupper($key));
        } else {
            return $this->getAttribute($key);
        }
    } */

    public function role_kary()
    {
        return $this->hasOne(UserRole::class, 'nik_nim', 'nik');
    }
    
    public function foto_kary()
    {
        return "https://sicyca.dinamika.ac.id/static/foto/".$this->nik.".jpg";
    }

    public function anak_wali()
    {
        return $this->belongsTo(Mahasiswa::class, 'dosen_wl', 'nik');
    }

    public function data_email(){
        return $this->hasOne(EmailKar::class, 'nik', 'nik');
    }
}
