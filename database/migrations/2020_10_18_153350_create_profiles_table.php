<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('slogan');
            $table->string('zip_code');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('email_1');
            $table->string('email_2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('youtube')->nullable();
            $table->string('logo')->nullable();
            $table->string('privacy_policy');
            $table->string('terms_condition');
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
        Schema::dropIfExists('profiles');
    }
}
