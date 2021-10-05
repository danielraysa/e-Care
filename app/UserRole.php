<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $connection = 'mysql';
    // protected $table = "user_roles";
    protected $guarded = [];
    public $timestamps = false;

    public function user_data()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
