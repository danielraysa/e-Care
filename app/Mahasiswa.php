<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $connection = 'oracle';
    protected $table      = 'v_mhs';
    protected $primaryKey = 'nim';
    public $timestamps = false;
    protected $casts = [
        'nim' => 'string',
        'dosen_wl' => 'string',
    ];
    // lower case
    /* public function __get($key)
    {
        if (is_null($this->getAttribute($key))) {
            return $this->getAttribute(strtoupper($key));
        } else {
            return $this->getAttribute($key);
        }
    } */

    public function role_mhs()
    {
        return $this->hasOne(UserRole::class, 'nik_nim', 'nim');
    }

    public function foto_mhs()
    {
        return "https://sicyca.dinamika.ac.id/static/foto/".$this->nim.".jpg";
    }
    
    public function dosen_wali()
    {
        return $this->hasOne(Karyawan::class, 'nik', 'dosen_wl');
    }

    public function his_status()
    {
        return $this->hasOne(HistoriMhs::class, 'mhs_nim', 'nim');
    }

    public function jenis_kel()
    {
        switch ($this->sex) {
            case 1:
                $jenis_kel = 'Laki-laki';
                break;
            case 2:
                $jenis_kel = 'Perempuan';
                break;
            default:
                $jenis_kel = '-';
                # code...
                break;
        }
        return $jenis_kel;
    }

    public function prodi()
    {
        switch (substr($this->nim, 2, 5)) {
            case '43010':
                $nama_prodi = 'S1 Manajemen';
                break;
            case '43020':
                $nama_prodi = 'S1 Akuntansi';
                break;
            case '42020':
                $nama_prodi = 'S1 Desain Produk';
                break;
            case '39010':
                $nama_prodi = 'D3 Sistem Informasi';
                break;
            case '39015':
                $nama_prodi = 'D3 Administrasi Perkantoran';
                break;
            case '41010':
                $nama_prodi = 'S1 Sistem Informasi';
                break;
            case '41020':
                $nama_prodi = 'S1 Teknik Komputer';
                break;
            case '42010':
                $nama_prodi = 'S1 Desain Komunikasi Visual';
                break;
            case '41011':
                $nama_prodi = 'S1 Sistem Informasi';
                break;
            case '51016':
                $nama_prodi = 'D4 Produksi Film dan Televisi';
                break;
            default:
                $nama_prodi = '-';
                # code...
                break;
        }
        return $nama_prodi;
        
    }

    public function nama_agama()
    {
        switch ($this->agama) {
            case 1:
                $nama = 'Islam';
                break;
            
            case 2:
                $nama = 'Kristen Katolik';
                break;
            
            case 3:
                $nama = 'Kristen';
                break;
            
            case 4:
                $nama = 'Hindu';
                break;
            
            case 5:
                $nama = 'Budha';
                break;
            
            default:
                $nama = '-';
                # code...
                break;
        }
        return $nama;
    }
}
