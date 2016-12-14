<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssocListeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assoc_liste_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('Quantity');
            $table->string('Unit');

            //Clé étrangère sur la liste
            $table->integer('liste_id')->unsigned();
            $table->foreign('liste_id')
                ->references('id')
                ->on('liste_courses')
                ->onDelete('cascade');;

            //Clé étrangère sur l'ingredient
            $table->integer('ingredient_id')->unsigned();
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assoc_liste_ingredients');
    }
}
