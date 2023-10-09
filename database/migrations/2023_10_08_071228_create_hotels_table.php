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
<<<<<<< HEAD:database/migrations/2014_10_12_000000_create_users_table.php
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
=======
            $table->string('name');
            $table->string('city');
            $table->string('country');
            $table->integer('distance');
            $table->date('check_in_date');
            $table->decimal('price', 8);//unsignedBigInteger
            $table->string('image1');
            $table->string('image2'); 
            $table->string('image3'); 
>>>>>>> 5a23e994701d0e7687c4acddb528355d31da37b1:database/migrations/2023_10_08_071228_create_hotels_table.php
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
        Schema::dropIfExists('hotels');
    }
};
