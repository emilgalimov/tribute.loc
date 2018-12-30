<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pass_type');



            $table->integer('lecturer')->unsigned()->nullable();
            $table->foreign('lecturer')->references('id')->on('teachers');

            $table->integer('practicer')->unsigned()->nullable();
            $table->foreign('practicer')->references('id')->on('teachers')->nullable();

            $table->integer('lab')->unsigned()->nullable();
            $table->foreign('lab')->references('id')->on('teachers')->nullable();

            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups');


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
        Schema::dropIfExists('subjects');
    }
}
