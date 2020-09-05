<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;
    //
    protected $table      = 'majors';
    protected $guarded    = [];
    protected $dates      = ['deleted_at'];
    // protected $primaryKey = 'nim';
    // public $timestamps = false;
    
}