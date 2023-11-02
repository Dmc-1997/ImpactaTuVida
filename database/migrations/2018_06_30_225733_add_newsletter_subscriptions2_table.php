<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsletterSubscriptions2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsletter_subscriptions', function (Blueprint $table) {
            $table->string('session_id')->nullable();
            $table->ipAddress('ip_address');
            $table->integer('active')->default(0);
            $table->integer('terms')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newsletter_subscriptions', function (Blueprint $table) {
            $table->dropColumn('session_id');
            $table->dropColumn('ip_address');
            $table->dropColumn('active');
            $table->dropColumn('terms');
        });

    }
}
