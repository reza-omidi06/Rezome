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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->text('text_dynamic')->nullable();
            $table->string('btn_name_one')->nullable();
            $table->string('btn_link_one')->nullable();
            $table->string('btn_name_tow')->nullable();
            $table->string('btn_link_tow')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('background_img')->nullable();
            $table->string('background_color')->nullable();
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
        Schema::dropIfExists('sliders');
    }
};
