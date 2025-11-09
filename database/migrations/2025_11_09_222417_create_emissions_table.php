<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('emissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            // input
            $table->enum('vehicle_type', ['motorcycle','car']);
            $table->decimal('distance',10,2)->default(0);
            $table->enum('electric_source', ['grid','solar']);
            $table->decimal('electric_usage',10,2)->default(0);
            $table->decimal('beef',10,2)->default(0);
            $table->decimal('chicken',10,2)->default(0);
            $table->decimal('organic_waste',10,2)->default(0);
            $table->decimal('inorganic_waste',10,2)->default(0);

            // hasil (kg CO2)
            $table->decimal('transport_emission',10,3)->default(0);
            $table->decimal('electric_emission',10,3)->default(0);
            $table->decimal('food_emission',10,3)->default(0);
            $table->decimal('rubbish_emission',10,3)->default(0);
            $table->decimal('total_emission',10,3)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('emissions');
    }
};
