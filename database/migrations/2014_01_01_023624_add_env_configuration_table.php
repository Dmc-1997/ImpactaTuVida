<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnvConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('env_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('variable')->nullable();
            $table->longText('value')->nullable();
            $table->string('label')->nullable();
            $table->longText('description')->nullable();
            $table->integer('active')->default(0)->unsigned();
            $table->integer('group')->default(0);
            $table->string('type')->default('text');
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
        Schema::dropIfExists('env_config');
    }
}
