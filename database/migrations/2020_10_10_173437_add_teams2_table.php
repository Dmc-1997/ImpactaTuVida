
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeams2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teams', function (Blueprint $table) {
			$table->string('subdomain')->nullable();
			$table->string('logo')->nullable();
			$table->integer('active')->default(1);
			$table->string('bg_image')->nullable();
			$table->string('bg_color')->nullable();
			$table->longText('style_login')->nullable();
			$table->longText('style_admin')->nullable();
			$table->longText('style_academy')->nullable();
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
			$table->dropColumn('subdomain');
			$table->dropColumn('logo');
			$table->dropColumn('active');
			$table->dropColumn('bg_image');
			$table->dropColumn('bg_color');
			$table->dropColumn('style_login');
			$table->dropColumn('style_admin');
			$table->dropColumn('style_academy');
        });
	}

}
