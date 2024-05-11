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
        Schema::create('riwayat_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('kendaraan_id');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->unsignedBigInteger('pool_id');
            $table->foreign('pool_id')->references('role_id')->on('model_has_roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('riwayat_kendaraans');
    }
};
