<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('strava_id')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->string('access_token');
            $table->string('refresh_token');
            $table->string('expires_at');
            $table->boolean('is_admin')->default(false);
            $table->timestamp('activities_until')->nullable();
            $table->string('profile_link')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
