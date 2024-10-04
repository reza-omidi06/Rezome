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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_category_id')->nullable();
            $table->string('portfolio_name')->nullable();
            $table->string('portfolio_client')->nullable();
            $table->string('portfolio_project_date')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('portfolio_image')->nullable();
            $table->text('portfolio_description')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
};
