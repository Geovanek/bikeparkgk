<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSegmentLapIdTableStravaSegments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strava_segments', function (Blueprint $table) {
            $table->bigInteger('segment_lap_id');
            $table->bigInteger('segment_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strava_segments', function (Blueprint $table) {
            $table->dropColumn('segment_lap_id');
        });
    }
}
