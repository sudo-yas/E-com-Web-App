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
           
            $table->increments('id');
            $table->float('price');
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable;
            $table->timestamps();


            /*

               $table->increments('id');  
            $table->integer('id_medecin');
            $table->integer('id_patient')->nullable();
            $table->string('debut');
            $table->string('fin');
            $table->string('etat')->nullable;
            $table->string('StructH');
            $table->timestamps();


            */



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
