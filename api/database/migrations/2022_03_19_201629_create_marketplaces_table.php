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
            $table->integer('auction_user_id')->unsigned()->default(0)->comment('USER ID Licytujacego');
            $table->integer('starting_price')->unsigned()->comment('Cena wywoławcza');
            $table->integer('buy_now_price')->unsigned()->comment('Cena kup teraz');
            $table->integer('current_price')->unsigned()->comment('Aktualna cena');
            $table->integer('number_of_offers')->unsigned()->comment('Ilość ofert');
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
