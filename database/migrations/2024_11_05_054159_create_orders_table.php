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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id')->nullable();
            $table->string('order_name')->nullable();
            $table->text('order_mail')->nullable();
            $table->text('order_phone')->nullable();
            $table->text('order_description')->nullable();
            $table->string('order_file')->nullable();
            $table->string('order_status')->default(1);
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
        Schema::dropIfExists('orders');
    }
};
