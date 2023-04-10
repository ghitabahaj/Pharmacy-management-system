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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('label');
            $table->string('Provider');
            $table->integer('category_id');
            $table->date('expiration_date');
            $table->integer('quantity');
            $table->float('price', 8, 4);
            $table->foreign('category_id')
            ->references('id')->on('categories');
      


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
