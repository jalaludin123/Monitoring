<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->string('name_perusahan');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kecamatan');
            $table->unsignedBigInteger('kelurahan');
            $table->string('name_penangungJawab');
            $table->string('phone_perusahan');
            $table->string('email_perusahan');
            $table->string('nib');
            $table->string('sektor');
            $table->string('badan_usaha');
            $table->string('skala_usaha');
            $table->string('file_perizinan');
            $table->tinyInteger('status_perizinan')->default(0)->comment('0=Tidak Terverifikasi,1=Terverifikasi');
            $table->string('kbli');
            $table->string('alamat_perusahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perizinans');
    }
};