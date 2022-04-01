<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_bidders', function (Blueprint $table) {
            $table->id();
            $table->integer('marketplace_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('offer_price')->unsigned()->comment('Cena oferowana');
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
        Schema::dropIfExists('marketplace_bidders');
    }
}
