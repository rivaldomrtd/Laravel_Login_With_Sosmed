<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //google
        Schema::table('users', function ($table) {
            $table->string('google_id')->nullable();
        });

        //facebook
        Schema::table("users", function (Blueprint $table) {
            $table->string('facebook_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
