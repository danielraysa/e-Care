<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $guarded = [];

    public function datetime_indo()
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split1 = explode(' ', $this->created_at);
        $split2 = explode('-', $split1[0]);
        return $split2[2] . ' ' . $bulan[ (int)$split2[1] ] . ' ' . $split2[0].' '.$split1[1];
    }
}
