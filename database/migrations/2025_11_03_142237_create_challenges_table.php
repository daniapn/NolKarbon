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
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id_challenge');
            $table->string('nama'); // nama challenge
            $table->text('deskripsi')->nullable(); // deskripsi panjang
            $table->date('tanggal_mulai'); // tipe tanggal
            $table->date('tanggal_selesai'); // tipe tanggal
            $table->integer('poin')->default(0); // nilai poin challenge
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};

