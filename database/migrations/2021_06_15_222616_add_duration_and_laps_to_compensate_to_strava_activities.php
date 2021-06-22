<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDurationAndLapsToCompensateToStravaActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strava_activities', function (Blueprint $table) {
            $table->integer('elapsed_time')->nullable();
            $table->integer('laps_to_compensate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strava_activities', function (Blueprint $table) {
            $table->dropColumn('elapsed_time');
            $table->dropColumn('laps_to_compensate');
        });
    }
}
