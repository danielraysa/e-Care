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
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('nama_institusi')->nullable();
            $table->string('lisensi')->nullable();
            $table->string('penghargaan')->nullable();
            $table->string('bidang_keahlian')->nullable();
            $table->string('topik_penelitian')->nullable();
            $table->string('perusahaan_terakhir')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('lama_bekerja')->nullable();
            $table->string('pelatihan')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
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
