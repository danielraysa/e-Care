<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    //
    protected $guarded = [];
    public $timestamps = true;

    public function data_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
