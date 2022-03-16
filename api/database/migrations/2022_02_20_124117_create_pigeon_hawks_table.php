<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigeonHawksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeon_hawks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->text('name');
            $table->tinyInteger('max_quantity_pigeons')->default(20)->comment('Pojemność gołębnika');
            $table->double('level_clean')->default(90)->comment('Poziom czystości');
            $table->tinyInteger('max_level_clean')->default(100);
            $table->double('level_food')->default(0)->comment('Poziom karmika');
            $table->tinyInteger('max_level_food')->default(100);
            $table->jsonb('food_type')->default('[]')->comment('Tablica z karmami w gołębniku');
            $table->double('level_water')->default(2)->comment('Poziom poideł -w litrach');
            $table->tinyInteger('max_level_water')->default(5);
            $table->double('level_grit')->default(95)->comment('Poziom grytu');
            $table->tinyInteger('max_level_grit')->default(100);
            $table->double('level_repair')->default(100)->comment('Stan gołębnika - naprawa');
            $table->tinyInteger('max_level_repair')->default(100);
            $table->boolean('on_show')->default(false)->comment('Widoczność gołębnika na wystawie');
            $table->tinyText('type')->default('lotowy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pigeon_hawks');
    }
}
