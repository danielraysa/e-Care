<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table      = 'roles';
    protected $guarded    = [];
    protected $dates      = ['deleted_at'];
}
