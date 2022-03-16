<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->default('');
            $table->double('price');
            $table->integer('value');
            $table->integer('interact_with_comfort')->default(0)->comment('Wpływ na poziom samopoczucia.');
            $table->integer('interact_with_health')->default(0)->comment('Wpływ na poziom zdrowie.');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
