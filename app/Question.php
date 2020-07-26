<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded = [];

    public function jawaban()
    {
        $this->hasMany('App\Answer', 'question_id', 'id');
    }

    public function kunci_jawaban()
    {
        $this->hasOne('App\Answer', 'id', 'answer_id');
    }
}
