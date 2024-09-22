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
        Schema::create('rezomes', function (Blueprint $table) {
            $table->id();
            $table->string('jobـposition')->nullable();
            $table->string('jobـposition_en')->nullable();
            $table->string('title')->nullable();
            $table->text('description_rezome')->nullable();
            $table->string('Jobـstartـdate')->nullable();
            $table->string('Jobـendـdate')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('rezomes');
    }
};
