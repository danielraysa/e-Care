<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $guarded = [];
    public $timestamps = true;

    public function mahasiswa()
    {
        // return $this->hasOne(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function konselor()
    {
        // return $this->hasOne(User::class, 'id', 'counselor_id');
        return $this->belongsTo(User::class, 'counselor_id', 'id');
    }

    public function catatan_medis()
    {
        return $this->hasOne(RekamMedis::class, 'appointment_id', 'id');
    }
}
