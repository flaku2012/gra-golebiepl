<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigeonPregnatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeon_pregnats', function (Blueprint $table) {
            $table->id();
            $table->integer('pigeon_mother_id')->unsigned()->comment('ID GOŁĘBIA - MATKA');            
            $table->integer('pigeon_father_id')->unsigned()->comment('ID GOŁĘBIA - OJCIEC'); 
            $table->string('end_time_to_birth')->default('')->comment('Czas do końca porodu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pigeon_pregnats');
    }
}
