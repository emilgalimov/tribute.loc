<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Subjects', function (Blueprint $table) {
            // 
            $table->renameColumn('lecturer', 'lecturer_id');
            $table->renameColumn('lab', 'lab_id');
            $table->renameColumn('practicer', 'practicer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Subjects', function (Blueprint $table) {
            //

            $table->renameColumn('lecturer_id', 'lecturer');
            $table->renameColumn('lab_id', 'lab');
            $table->renameColumn('practicer_id', 'practicer');
        });
    }
}
