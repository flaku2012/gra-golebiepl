<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIllnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illnesses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nazwa choroby');
            $table->text('description')->comment('Opis choroby');
            $table->tinyInteger('type')->comment('Typ choroby: 1-pasożytnicza, 2-wirusowa, 3-bakteryjna, 4-grzybyczna');
            $table->integer('effect_food')->comment('Wartość efektu - głód');
            $table->integer('effect_water')->comment('Wartość efektu - pragnienie');
            $table->integer('effect_health')->comment('Wartość efektu - zdrowie');
            $table->string('help_medicines')->default('[]')->comment('ID skutczenych leków na chorobę');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('illnesses');
    }
}
