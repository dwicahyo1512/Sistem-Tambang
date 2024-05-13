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
        //   
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kendaraan_user_id')->nullable();
            $table->foreign('kendaraan_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pool_id');
            $table->foreign('pool_id')->references('id')->on('users');
            $table->string('nama');
            $table->string('img');
            $table->string('type');
            $table->string('bahan_bakar');
            $table->string('konsumsi_bbm');
            $table->string('jadwal_service');
            $table->tinyInteger('persetujuan')->nullable();
            $table->tinyInteger('status');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('kendaraans');
    }
};
