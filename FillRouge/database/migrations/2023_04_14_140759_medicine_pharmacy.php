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
        Schema::create('medicine_pharmacy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('pharmacy_id')->unsigned();
            $table->unsignedBiginteger('medicine_id')->unsigned();

            $table->foreign('pharmacy_id')->references('id')
                 ->on('pharmacies')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')
                ->on('medicines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_pharmacy');
    }
};
