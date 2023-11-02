<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('confirmation_code')->nullable();
			$table->timestamp('code_valid_until')->nullable();
			$table->boolean('update_password')->default(0);
			$table->string('refer_code')->nullable();
			$table->boolean('blocked')->default(0);
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
            $table->dropColumn('confirmation_code');
			$table->dropColumn('code_valid_until');
			$table->dropColumn('update_password');
			$table->dropColumn('refer_code');
			$table->dropColumn('blocked');
        });
	}

}
