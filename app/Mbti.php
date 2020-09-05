<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mbti extends Model
{
    
    //
    protected $table      = 'mbti';
    protected $guarded    = [];
    protected $dates      = ['deluse SoftDeletes;eted_at'];
    // protected $primaryKey = 'nim';
    // public $timestamps = false;
    
}
