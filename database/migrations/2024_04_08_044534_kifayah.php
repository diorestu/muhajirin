<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rkm_anggota', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kk')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('tgl_daftar')->nullable();
            $table->enum('rkm_wanasari', ['Y', 'N'])->default('N');
            $table->timestamps();
        });
        Schema::create('rkm_iuran', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kk')->unsigned();
            $table->integer('bulan')->unsigned();
            $table->integer('tahun')->unsigned();
            $table->double('nominal', 15, 0)->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
