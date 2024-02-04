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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('carTitle');
            $table->string('image');
            $table->text('description');
            $table->boolean('active');
            $table->integer('luggage');
            $table->integer('doors');
            $table->integer('passengers');
            $table->float('price');
            $table->foreignId( 'categoryId')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
