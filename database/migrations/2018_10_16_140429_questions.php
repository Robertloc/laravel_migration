<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('questions', function (Blueprint $table) { // schema for table 'questions'
        $table->increments('id');                         // add column 'id' that will be AI PK
        $table->unsignedInteger('user_id')->nullable();                         // create string column 'user id'
        $table->string('title', 127)->nullable();                           // create a string column 'name'
        $table->string('text')->nullable();                // create a string column 'email' which will be unique
        $table->timestamps();                             // add common columns 'created_at' and 'updated_at'
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('questions'); 
    }
}
