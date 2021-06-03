<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->id();
            //personal info
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('account_name');
            $table->string('account_location');
            $table->string('role');
            $table->string('org_name');
            $table->string('org_location');

            //contact details
            $table->string('email');
            $table->string('mobile');
            $table->string('telephone');
            $table->string('facebook_handle');
            $table->string('twitter_handle');
            $table->string('instagram_handle');
            $table->string('linkedin_handle');
            $table->string('website_handle');

            //skills
            $table->string('skill_1');
            $table->string('rate_1');
            $table->string('years_1');
            $table->string('skill_2');
            $table->string('rate_2');
            $table->string('years_2');
            $table->string('skill_3');
            $table->string('rate_3');
            $table->string('years_3');
            $table->string('skill_4');
            $table->string('rate_4');
            $table->string('years_4');
            $table->string('skill_5');
            $table->string('rate_5');
            $table->string('years_5');

            //trainings
            $table->string('course_1');
            $table->string('from_1');
            $table->string('to_1');
            $table->string('conductedby_1');
            $table->string('venue_1');
            $table->string('course_2');
            $table->string('from_2');
            $table->string('to_2');
            $table->string('conductedby_2');
            $table->string('venue_2');
            $table->string('course_3');
            $table->string('from_3');
            $table->string('to_3');
            $table->string('conductedby_3');
            $table->string('venue_3');
            $table->string('course_4');
            $table->string('from_4');
            $table->string('to_4');
            $table->string('conductedby_4');
            $table->string('venue_4');
            $table->string('course_5');
            $table->string('from_5');
            $table->string('to_5');
            $table->string('conductedby_5');
            $table->string('venue_5');
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
        Schema::dropIfExists('userprofiles');
    }
}
