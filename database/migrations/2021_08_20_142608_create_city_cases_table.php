<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('ticket')->unique();
            $table->string('title');
            $table->string('location');
            $table->longText('details');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            
            $table->unsignedBigInteger('citizen_id');
            $table->foreign('citizen_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('support_staff_id')->nullable();
            $table->foreign('support_staff_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->enum('status', ['pending', 'running', 'completed', 'canceled']);

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
        Schema::dropIfExists('city_cases');
    }
}
