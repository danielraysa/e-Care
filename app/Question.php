<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
    //
    use SoftDeletes;
 
    protected $guarded = [];
    protected $dates      = ['deleted_at'];

    public function jawaban()
    {
        $this->hasMany('App\Answer', 'question_id', 'id');
    }

    public function kunci_jawaban()
    {
        $this->hasOne('App\Answer', 'id', 'answer_id');
    }
}
