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
        Schema::create('medicine_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('medicine_id')->nullabale();
            $table->integer('quantity');
            $table->boolean('is_handled')->default(false);
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('users');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
            $table->foreign('medicine_id')->references('id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_requests');
    }
};
