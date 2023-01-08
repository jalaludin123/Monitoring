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
        Schema::create('fasilitas_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengawasan_id');
            $table->string('nama_fasilitas');
            $table->string('kondisi_fasilitas');
            $table->string('gambar_fasilitas');
            $table->foreign('pengawasan_id')->references('id')->on('pengawasans')->onDelete('cascade');
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
        Schema::dropIfExists('fasilitas_perusahaan');
    }
};