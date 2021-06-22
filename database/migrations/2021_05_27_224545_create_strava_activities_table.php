<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStravaActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strava_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->string('external_id')->nullable();
            $table->string('activity_upload_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('start_date_local')->nullable();
            $table->integer('utc_offset')->nullable();
            $table->boolean('is_analyzed')->default(false);
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
        Schema::dropIfExists('strava_activities');
    }
}
