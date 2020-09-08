<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mbti extends Model
{
    use SoftDeletes;
    //
    protected $table      = 'mbti';
    protected $guarded    = [];
    protected $dates      = ['deleted_at'];
    // protected $primaryKey = 'nim';
    // public $timestamps = false;
    
}
