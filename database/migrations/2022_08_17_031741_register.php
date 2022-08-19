<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('password');
            $table->string('confirmpassword');
            $table->string('gender');
            $table->integer('national_id');
            $table->string('birthday');
            $table->string('phone');
            $table->timestamps();
        });
    }


    public function down()
    {

    }
};
