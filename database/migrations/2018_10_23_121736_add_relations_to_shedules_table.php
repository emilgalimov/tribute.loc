<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shedules', function (Blueprint $table) {
            //
            $table->integer('teacher_id')->unsigned()->default(1);
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->integer('building_id')->unsigned()->default(1);
            $table->foreign('building_id')->references('id')->on('buildings');

            $table->integer('group_id')->unsigned()->default(1);
            $table->foreign('group_id')->references('id')->on('groups');

            $table->integer('day_id')->unsigned()->default(1);
            $table->foreign('day_id')->references('id')->on('days');

            $table->integer('lesson_id')->unsigned()->default(1);
            $table->foreign('lesson_id')->references('id')->on('lessons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shedules', function (Blueprint $table) {
            //
        });
    }
}
