<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('emisi', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pengguna');
        $table->float('transportasi')->default(0);
        $table->float('listrik')->default(0);
        $table->float('makanan')->default(0);
        $table->float('sampah')->default(0);
        $table->float('total_emisi')->default(0);
        $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emisis');
    }
};
