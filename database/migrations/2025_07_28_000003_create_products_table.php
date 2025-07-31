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
            $table->text('picture_main')->nullable();
            $table->text('picture_bis')->nullable();
            $table->text('description');
            $table->integer('quantity_stock');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('head_notes');
            $table->text('head_notes_picture')->nullable();
            $table->string('heart_notes');
            $table->text('heart_notes_picture')->nullable();
            $table->string('deep_notes');
            $table->text('deep_notes_picture')->nullable();
            $table->string('intensity');
            $table->string('track');
            $table->text('history');
            $table->text('ingredients');
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
