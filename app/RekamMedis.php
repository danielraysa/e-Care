<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    //
    protected $table = "rekam_medis";
    protected $guarded = [];
    public $timestamps = false;

    public function data_appointment()
    {
        return $this->belongsTo('App\Appointment', 'appointment_id', 'id');
    }

}
