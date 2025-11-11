<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emission_quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('emission_templates')->onDelete('cascade');
            $table->text('text'); // isi quote
            $table->string('author')->nullable(); // nama pengutip
            $table->boolean('is_active')->default(true); // aktif/tidak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emission_quotes');
    }
};
