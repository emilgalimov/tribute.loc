<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Chats', function (Blueprint $table) {
            $table->increments('id');
            

            $table->integer("teacher_id")->unsigned()->default(0);
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->integer("group_id")->unsigned()->default(0);
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
        Schema::dropIfExists('Chats');
    }
}
