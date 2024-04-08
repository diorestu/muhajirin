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
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned();
            $table->integer('id_pj')->unsigned();
            $table->string('dompet', 140)->nullable();
            $table->text('keterangan')->nullable();
            $table->double('target', 15, 0)->nullable();
            $table->double('saldo', 15, 0)->nullable();
            $table->timestamps();
        });
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned();
            $table->integer('id_kas')->unsigned();
            $table->string('notes', 160)->nullable();
            $table->double('debit', 15, 0)->nullable();
            $table->double('kredit', 15, 0)->nullable();
            $table->double('saldo', 15, 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas');
        Schema::dropIfExists('keuangan');
    }
};
