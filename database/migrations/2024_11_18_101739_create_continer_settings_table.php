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
        Schema::create('continer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('up_title')->nullable();
            $table->string('up_title_color')->default('#ffffff');
            $table->string('title')->nullable();
            $table->string( 'title_color')->default('#ffffff');
            $table->text('cont_description')->nullable();
            $table->string('cont_link')->default('#price');
            $table->string('cont_background_color')->default('#ef233c');
            $table->string('cont_btn_color')->default('#ffffff');
            $table->string('cont_background_image')->nullable();
            $table->string('cont_background_attachment')->default(0);
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
        Schema::dropIfExists('continer_settings');
    }
};
