<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name_person')->nullable();
            $table->string('name_personـen')->nullable();
            $table->string('job_person')->nullable();
            $table->text('about_person')->nullable();
            $table->text('picture_person')->nullable();
            $table->string('social_person_instagram')->nullable();
            $table->string('social_person_linkedin')->nullable();
            $table->string('social_person_telegram')->nullable();
            $table->string('social_person_X')->nullable();
            $table->string('social_person_facebook')->nullable();
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
        Schema::dropIfExists('my_teams');
    }
};
