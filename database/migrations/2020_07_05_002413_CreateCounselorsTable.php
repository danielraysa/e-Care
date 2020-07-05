<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounselorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('counselors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('pendidikan_terakhir');
            $table->string('nama_institusi');
            $table->string('lisensi');
            $table->string('penghargaan');
            $table->string('bidang_keahilan');
            $table->string('topik_penelitian');
            $table->string('perusahaan_terakhir');
            $table->string('jabatan');
            $table->string('lama_bekerja');
            $table->string('pelatihan');
            $table->string('facebook');
            $table->string('instagram');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('counselors');
    }
}
