<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplaces', function (Blueprint $table) {
            $table->id();
            $table->integer('pigeon_id')->unsigned();
            $table->integer('starting_price')->unsigned()->comment('Cena wywoławcza');
            $table->integer('buy_now_price')->unsigned()->comment('Cena kup teraz');
            $table->integer('current_price')->unsigned()->comment('Aktualna cena');
            $table->string('end_time_auction')->comment('Czas do końca aukcji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketplaces');
    }
}
