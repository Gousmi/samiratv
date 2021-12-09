<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('recipe_id')->constrained('recipes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredients')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('recipe_ingredient');
    }
}
