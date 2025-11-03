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
        Schema::create('draft_artikels', function (Blueprint $table) {
            $table->string('idDraft', 10)->primary();
            $table->string('judul', 200);
            $table->text('isi');
            $table->string('gambar', 200)->nullable();
            $table->date('tanggalDibuat')->default(now());
            $table->date('tanggalUpdate')->nullable();
            $table->enum('status', ['Draft', 'Menunggu Review', 'Revisi', 'Published', 'Ditolak'])->default('Draft');
            $table->text('catatanRevisi')->nullable();
            $table->string('idKontributor', 10);

            // FK (Kontributor)
            $table->foreign('idKontributor')
                  ->references('idKontributor')->on('kontributors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_artikels');
    }
};
