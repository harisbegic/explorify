<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHobbiesTable extends Migration
{
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->integer('user_id');
            $table->string('image');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hobbies');
    }
}
