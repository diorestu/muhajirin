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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kk')->unsigned()->nullable();
            $table->string('nkk', 16)->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->text('wilayah')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('gender', ['P', 'W']);
            $table->string('hubungan_keluarga', 100);
            $table->enum('st_keuangan', ['Cukup Mampu', 'Fakir Miskin']);
            $table->enum('st_yatim', ['Yatim', 'Piatu', 'Yatim Piatu']);
            $table->date('rkm_registered')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
