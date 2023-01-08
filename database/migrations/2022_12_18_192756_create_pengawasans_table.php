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
        Schema::create('pengawasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perizinan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('produk_jasa');
            $table->string('tenaga_kerja');
            $table->string('jumlah_bangunan');
            $table->string('no_surat_keterangan_domisili');
            $table->string('luas_lahan');
            $table->foreign('perizinan_id')->references('id')->on('perizinans')->onDelete('cascade');
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
        Schema::dropIfExists('pengawasans');
    }
};