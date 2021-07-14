<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();

            //personal info
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_location')->nullable();
            $table->string('role')->nullable();
            $table->string('org_name')->nullable();
            $table->string('org_location')->nullable();

            //contact details
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->string('website_handle')->nullable();

            //skills
            $table->string('skill_1')->nullable();
            $table->string('rate_1')->nullable();
            $table->string('years_1')->nullable();
            $table->string('skill_2')->nullable();
            $table->string('rate_2')->nullable();
            $table->string('years_2')->nullable();
            $table->string('skill_3')->nullable();
            $table->string('rate_3')->nullable();
            $table->string('years_3')->nullable();
            $table->string('skill_4')->nullable();
            $table->string('rate_4')->nullable();
            $table->string('years_4')->nullable();
            $table->string('skill_5')->nullable();
            $table->string('rate_5')->nullable();
            $table->string('years_5')->nullable();

            //trainings
            $table->string('course_1')->nullable();
            $table->string('from_1')->nullable();
            $table->string('to_1')->nullable();
            $table->string('conductedby_1')->nullable();
            $table->string('venue_1')->nullable();
            $table->string('course_2')->nullable();
            $table->string('from_2')->nullable();
            $table->string('to_2')->nullable();
            $table->string('conductedby_2')->nullable();
            $table->string('venue_2')->nullable();
            $table->string('course_3')->nullable();
            $table->string('from_3')->nullable();
            $table->string('to_3')->nullable();
            $table->string('conductedby_3')->nullable();
            $table->string('venue_3')->nullable();
            $table->string('course_4')->nullable();
            $table->string('from_4')->nullable();
            $table->string('to_4')->nullable();
            $table->string('conductedby_4')->nullable();
            $table->string('venue_4')->nullable();
            $table->string('course_5')->nullable();
            $table->string('from_5')->nullable();
            $table->string('to_5')->nullable();
            $table->string('conductedby_5')->nullable();
            $table->string('venue_5')->nullable();

            $table->string('modified_by')->nullable();
            $table->string('date_time')->nullable();

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
        Schema::dropIfExists('user_activities');
    }
}
