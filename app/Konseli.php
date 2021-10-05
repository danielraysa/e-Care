<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konseli extends Model
{
    //
    protected $connection = 'oracle_temp';
    protected $table = 'app_konseling_mahasiswa.konseli';
    public $timestamps = false;
}
