<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    //
    protected $table      = 'test_scores';
    protected $guarded    = [];

    public function hasil_skor()
    {
        if($this->skor <= 6){
            $nilai = 'Rendah';
        }else if($this->skor > 6 && $this->skor <= 12){
            $nilai = 'Sedang';
        }else{
            $nilai = 'Berat';
        }
        return $nilai;
    }
    public function user_test()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
