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
        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id_progress'); // Primary key
            $table->unsignedBigInteger('id_challenge'); // Foreign key ke tabel challenges
            $table->unsignedBigInteger('id_pengguna');  // Foreign key ke tabel users/pengguna
            $table->text('deskripsi')->nullable(); // Deskripsi progress
            $table->string('bukti')->nullable(); // Bisa untuk path/file bukti
            $table->date('tanggal'); // Tanggal progress
            $table->timestamps(); // created_at & updated_at

            // Opsional: definisikan foreign key (kalau tabel referensinya sudah ada)
            // $table->foreign('id_challenge')->references('id_challenge')->on('challenges')->onDelete('cascade');
            // $table->foreign('id_pengguna')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
