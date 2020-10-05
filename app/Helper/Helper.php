<?php

namespace App\Helper;

class Helper
{

    public static function format_rp($number){
        return "Rp. ".number_format($number,0,",",".");
    }

    public static function tanggal_indo($tanggal)
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
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    public static function datetime_indo($tanggal)
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
        $split = explode(' ', $tanggal);
        $split_baru = explode('-', $split[0]);
        return $split_baru[2] . ' ' . $bulan[ (int)$split_baru[1] ] . ' ' . $split_baru[0]." ".$split[1];
    }
}
