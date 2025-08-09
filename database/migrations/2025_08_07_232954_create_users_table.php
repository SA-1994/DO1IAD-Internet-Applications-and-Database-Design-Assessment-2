<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Create the users table with required fields
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('uid'); //User ID
            $table->string('username')->unique(); //Creating a username and ensuring it is unique
            $table->string('email')->unique(); //Creating an email and ensuring it is unique
            $table->string('password'); //Stores the user password which will be hashed before saving
            $table->timestamps(); //Created_at and updated_at
        });
    }

    //Prefefined Laravel method to drop the users table
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};