<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseFollowupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_followups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('duration')->nullable(0);
			$table->integer('progress')->nullable(0);
			$table->integer('seen')->default(0);
			$table->integer('completed')->default(0);
			$table->foreignId('user_id')->nullable();
			$table->foreignId('course_id')->nullable();
			$table->foreignId('coursechapter_id')->nullable();
			$table->foreignId('courseclass_id')->nullable();

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
		Schema::drop('course_followups');
	}

}
