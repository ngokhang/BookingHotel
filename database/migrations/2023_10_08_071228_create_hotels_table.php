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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('country');
            // $table->integer('distance');
            $table->string('description');
            $table->date('check_in_date');
            $table->integer('price');
            $table->integer('num_guest');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->timestamps();
            $table->unsignedBigInteger('owner_id')->nullable();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
