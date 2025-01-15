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
        Schema::create('my_team_sets', function (Blueprint $table) {
            $table->id();
            $table->string('my_team_top_head')->default('My Team');
            $table->string('my_team_top_head_color')->default('#797979');
            $table->string('my_team_head')->default('Expert Team Members');
            $table->string('my_team_head_color')->default('#414141');
            $table->string('my_team_bg_color')->default('#ffffff');
            $table->string('my_team_bg_image')->nullable();
            $table->string('my_team_background_attachment')->default(0);
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
        Schema::dropIfExists('my_team_sets');
    }
};
