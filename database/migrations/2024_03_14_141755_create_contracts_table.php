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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('landlord_id')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->text('landlord_signature')->nullable();
            $table->text('buyer_signature')->nullable();
            $table->enum('list_in', ['sell', 'rent'])->nullable();
            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->text('uuid')->nullable();
            $table->enum('status', ['valid', 'nullNvoid'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
