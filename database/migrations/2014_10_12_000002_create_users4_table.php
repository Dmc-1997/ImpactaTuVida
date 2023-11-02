<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers4Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('nit')->nullable();
            $table->string('address', 2048)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('country');
            $table->dropColumn('nit');
            $table->dropColumn('address');
        });
	}

}
