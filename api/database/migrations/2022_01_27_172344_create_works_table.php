<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('user_id');
            $table->boolean('in_work')->default(false);
            $table->string('end_time_of_work');
            $table->integer('work_salary')->nullable();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
}
