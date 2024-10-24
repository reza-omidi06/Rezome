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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('testimonial_customer')->nullable();
            $table->text('testimonial_mail')->nullable();
            $table->text('testimonial_phone')->nullable();
            $table->text('testimonial_profession')->nullable();
            $table->text('testimonial_comment')->nullable();
            $table->string('testimonial_image')->nullable();
            $table->string('testimonial_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     *  '',
    '',
    '',
    'testimonial_mail',
    '',
    '',
    '',
     * //img / discription / custom / profession /show or shadow

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
