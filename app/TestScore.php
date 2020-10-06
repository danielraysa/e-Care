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
            $keterangan= "Tingkat kecemasan yang kamu alami berada pada tingkat rendah. Kami menyarankan kamu kamu melakukan konseling via online agar permasalahan yang kamu hadapi dapat terselesaikan dan tidak semakin membebani kamu";
        }else if($this->skor > 6 && $this->skor <= 12){
            $nilai = 'Sedang';
            $keterangan= "Tingkat kecemasan yang kamu alami berada ditingkat sedang. Kami menyarankan kamu untuk segera melakukan konseling via online atau melakukan appointment dengan konselor, agar permasalahanmu yang kamu alami tidak semakin berat.   ";
        }else{
            $nilai = 'Berat';
            $keterangan= "Tingkat masalah yang kamu alami berada pada tingkat berat. Kami menyarankan kamu membuat appointment dengan konselor. Dengan bertemu langsung dengan konselor, kamu akan terbantu dalam menghadapi permasalahan kamu .";
        }
        return $nilai;
    }
    public function user_test()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
