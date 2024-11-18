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
        Schema::create('order_settings', function (Blueprint $table) {
            $table->id();
            $table->string('order_setting_title_up_title')->nullable();
            $table->string('order_setting_title')->nullable();
            $table->text('order_setting_description')->nullable();
            $table->string('order_setting_back_color')->default('#ef233c');
            $table->string('order_setting_btn_color')->default('#ffffff');
            $table->string('order_setting_back_image')->nullable();
            $table->string('order_setting_back_attachment')->default(0);
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
        Schema::dropIfExists('order_settings');
    }
};
