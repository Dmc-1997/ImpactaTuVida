<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoreConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option')->nullable();
            $table->longText('value')->nullable();
            $table->string('label')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('store_config');
    }
}
