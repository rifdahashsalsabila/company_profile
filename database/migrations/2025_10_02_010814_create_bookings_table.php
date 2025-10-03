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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // relasi ke users
            $table->string('layanan');
            $table->date('tanggal');
            $table->enum('status', [
                'menunggu_konfirmasi',
                'dikonfirmasi',
                'dalam_antrian',
                'menuju_alamat',
                'selesai',
                'dibatalkan'
            ])->default('menunggu_konfirmasi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
