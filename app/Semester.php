<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    protected $table = 'semester';
    protected $guarded = [];
    protected $dates = ['tgl_awal','tgl_akhir'];
}
