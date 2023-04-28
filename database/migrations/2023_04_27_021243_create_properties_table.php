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
            $table->text('description');
            $table->smallInteger('property_status')->nullable();
            $table->decimal('property_price', '20', '2');
            $table->decimal('property_price_per_meter', '20', '2');
            $table->string('longitude', '255');
            $table->string('latitude', '255');
            $table->float('area', '10', '2');
            $table->integer('rooms');
            $table->integer('bath_rooms');
            $table->integer('bed_rooms');
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
