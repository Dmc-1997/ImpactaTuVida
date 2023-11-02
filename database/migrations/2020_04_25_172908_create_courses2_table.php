<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourses2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses', function (Blueprint $table) {
			$table->integer('action_image')->default(0);
			$table->string('action_image_path')->nullable();
			$table->string('action_image_url')->nullable();
			$table->integer('action_button')->default(0);
			$table->string('action_button_text')->nullable();
			$table->string('action_button_url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('action_image');
			$table->dropColumn('action_image_path');
			$table->dropColumn('action_image_url');
			$table->dropColumn('action_button');
			$table->dropColumn('action_button_text');
			$table->dropColumn('action_button_url');
        });
	}

}
