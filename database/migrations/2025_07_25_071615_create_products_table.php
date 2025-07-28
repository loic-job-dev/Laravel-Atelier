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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price_small');
            $table->integer('price_large');
            $table->string('picture_main');
            $table->string('picture_bis');
            $table->string('description');
            $table->integer('quantity_stock');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('head_notes');
            $table->string('head_notes_picture');
            $table->string('heart_notes');
            $table->string('heart_notes_picture');
            $table->string('deep_notes');
            $table->string('deep_notes_picture');
            $table->string('intensity');
            $table->string('track');
            $table->string('history');
            $table->string('ingredients');
        });


        //Autre syntaxte pour les clés étrangères :

        // Schema::table('products', function (Blueprint $table) {
        //     $table->unsignedBigInteger('category_id');
 
        //     $table->foreign('category_id')->references('id')->on('category');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
