<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_requests', function (Blueprint $table) {
            $table->id();
            $table->string('church_name')->nullable();
            $table->string('location')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_location')->nullable();
            $table->text('about')->nullable();
            $table->text('description')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('denomination_affiliation')->nullable();
            $table->string('church_type')->nullable();
            $table->string('church_and_staff_leaders')->nullable();
            $table->string('telephone')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->string('website_handle')->nullable();
            $table->string('status')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('request_status')->nullable();
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
        Schema::dropIfExists('member_requests');
    }
}
