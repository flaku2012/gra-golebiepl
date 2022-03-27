<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('pigeon_hawk_id')->unsigned();
            $table->integer('pigeon_mother_id')->default(1)->unsigned()->comment('ID RODZICA GOLEBIA');
            $table->integer('pigeon_father_id')->default(1)->unsigned()->comment('ID RODZICA GOLEBIA');
            $table->integer('pigeon_partner_id')->default(1)->unsigned()->comment('ID PARTNERA GOLEBIA');
            $table->tinyText('sex')->default('')->comment('Płeć');
            $table->text('name');
            $table->integer('level_comfort')->default('100')->comment('Samopoczucie');
            $table->integer('level_food')->default(70)->comment('Poziom głodu w %');
            $table->integer('max_level_food')->default(100);
            $table->integer('level_water')->default(70)->comment('Poziom pragnienia w %');
            $table->integer('max_level_water')->default(100);
            $table->integer('level_health')->default(100)->comment('Poziom zdrowia w %');
            $table->integer('max_level_health')->default(100);
            $table->float('level_potential')->default(5)->comment('Potencjał');
            $table->float('level_experience')->default(15)->comment('Doswiadczenie');
            $table->float('odometr')->default(0)->comment('Przebyty dystans');
            $table->integer('age')->default(1)->comment('Wiek w dniach');
            $table->string('illness')->default('[]')->comment('Tablica z chorobami');
            $table->string('image_url')->default('')->comment('Link do zdjęcia');
            $table->boolean('on_show')->default(0)->comment('Widoczność gołębia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pigeons');
    }
}
