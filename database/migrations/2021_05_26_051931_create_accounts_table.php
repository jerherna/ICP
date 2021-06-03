<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('church_name');
            $table->string('location');
            $table->text('about');
            $table->text('description');
            $table->text('vision');
            $table->text('mission');
            $table->string('email');
            $table->string('mobile');
            $table->string('denomination_affiliation');
            $table->string('church_type');
            $table->string('church_and_staff_leaders');
            $table->string('telephone');
            $table->string('facebook_handle');
            $table->string('twitter_handle');
            $table->string('instagram_handle');
            $table->string('linkedin_handle');
            $table->string('website_handle');
            $table->string('status');
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
        Schema::dropIfExists('accounts');
    }
}
