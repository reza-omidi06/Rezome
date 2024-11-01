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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('footer_name');
            $table->string('footer_address');
            $table->string('footer_email');
            $table->string('footer_phone');
            $table->string('footer_social_instagram');
            $table->string('footer_social_facebook');
            $table->string('footer_social_whatsapp');
            $table->string('footer_social_telegram');
            $table->string('footer_social_x');
            $table->string('footer_social_linkedin');
            $table->string('footer_social_youtube');
            $table->string('footer_social_apparat');
            $table->string('footer_copy_right');
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
        Schema::dropIfExists('footers');
    }
};
