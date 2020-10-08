<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestMbti extends Model
{
    //
    protected $table = 'test_mbti';
    protected $guarded = [];

    public function user_mbti()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function data_mbti()
    {
        return $this->belongsTo('App\Mbti', 'mbti_id', 'id');
    }
}
