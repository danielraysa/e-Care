<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriMhs extends Model
{
    //
    protected $connection = 'oracle';
    protected $table = 'v_hismf';
    public $timestamps = false;
    protected $casts = [
        'mhs_nim' => 'string',
    ];
}
