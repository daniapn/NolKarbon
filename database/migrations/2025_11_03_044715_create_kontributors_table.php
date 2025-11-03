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
        Schema::create('kontributors', function (Blueprint $table) {
            $table->string('idKontributor', 10)->primary();
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 64);
            $table->date('tanggalDaftar')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontributors');
    }
};
