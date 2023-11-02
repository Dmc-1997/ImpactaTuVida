
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeams3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teams', function (Blueprint $table) {
			$table->string('incharge_name')->nullable();
			$table->string('incharge_role')->nullable();
			$table->string('incharge_email')->nullable();
			$table->string('incharge_phone')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teams', function (Blueprint $table) {
			$table->dropColumn('incharge_name');
			$table->dropColumn('incharge_role');
			$table->dropColumn('incharge_email');
			$table->dropColumn('incharge_phone');
        });
	}

}
