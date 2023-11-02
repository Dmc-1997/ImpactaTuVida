<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id', 191)->nullable();
			$table->string('category_id', 191)->nullable();
			$table->string('subcategory_id', 191)->nullable();
			$table->string('childcategory_id', 191)->nullable();
			$table->string('language_id', 191)->nullable();
			$table->string('title', 191)->nullable();
			$table->text('short_detail', 65535)->nullable();
			$table->text('detail', 65535)->nullable();
			$table->text('requirement', 65535)->nullable();
			$table->string('price', 191)->nullable();
			$table->string('discount_price', 191)->nullable();
			$table->string('day', 191)->nullable();
			$table->string('video', 191)->nullable();
			$table->string('url', 191)->nullable();
			$table->enum('featured', array('1','0'))->nullable();
			$table->string('slug', 191)->nullable();
			$table->enum('status', array('1','0'))->nullable();
			$table->string('preview_image', 191)->nullable();
			$table->string('video_url', 191)->nullable();
			$table->string('preview_type', 191)->nullable();
			$table->enum('type', array('1','0'))->nullable();
			$table->integer('duration')->nullable();
			$table->integer('pin_id')->nullable();
			$table->integer('plan_id')->nullable();
			$table->string('minutes')->nullable();
			$table->date('valid_until')->nullable();
			$table->longText('it_includes')->nullable();
			$table->integer('prize')->default(0);
			$table->integer('leadership')->default(0);
			$table->integer('proactivity')->default(0);
			$table->string('teams', 1024)->nullable();
			$table->integer('position')->default(0);

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
		Schema::drop('courses');
	}

}
