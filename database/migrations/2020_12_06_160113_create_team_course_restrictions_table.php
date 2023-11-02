<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamCourseRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_course_restrictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('course_id');
            $table->timestamps();

            $table->unique(['team_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_course_restrictions');
    }
}
