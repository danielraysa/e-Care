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
        return $this->hasOne(User::class, 'id', 'user_id');
        // return $this->belongsTo(User::class);
    }

    public function konselor()
    {
        return $this->hasOne(User::class, 'id', 'counselor_id');
        // return $this->belongsTo(Counselor::class);
    }
}
