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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('landlord_id')->nullable();
            $table->unsignedBigInteger('subletter_id')->nullable();
            $table->enum('type', ['house', 'plot', 'apartments', 'industrial', 'condos', 'villas', 'lofts'])->nullable();
            $table->enum('list_in', ['sell', 'rent'])->nullable();
            $table->enum('status', ['available', 'unavailable']);
            $table->integer('sq_yard')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('allow_sublet')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->integer('garages')->nullable();
            $table->integer('built_year')->nullable();
            $table->json('amenities')->nullable();
            $table->text('uuid')->nullable();
            $table->json('media')->nullable();

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
