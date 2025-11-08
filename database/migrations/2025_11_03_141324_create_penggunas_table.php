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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id('idPengguna'); // Primary key
            $table->string('username', 100);
            $table->string('email', 100)->unique();
            $table->string('universitas', 150)->nullable();
            $table->string('password');
            $table->enum('role', ['User', 'Admin', 'Kontributor'])->default('User');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->date('join_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
