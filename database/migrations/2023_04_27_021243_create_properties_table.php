<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name', '255');
            $table->string('slug', '255');
            $table->text('description')->nullable();
            $table->smallInteger('property_status')->nullable();
            $table->decimal('property_price', '20', '2')->nullable();
            $table->decimal('property_price_per_meter', '20', '2')->nullable();
            $table->string('longitude', '255')->nullable();
            $table->string('latitude', '255')->nullable();
            $table->float('area', '10', '2')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bath_rooms')->nullable();
            $table->integer('bed_rooms')->nullable();
            $table->boolean('furnished')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
