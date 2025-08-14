<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    //Create the sessions table for storing user session data
    public function up(): void
    {
          Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); //Session ID
            $table->foreignId('user_id')->nullable()->index(); //User ID - nullable for guests
            $table->string('ip_address', 45)->nullable(); //Users IP address
            $table->text('user_agent')->nullable(); //Browser or device info
            $table->longText('payload'); //Session data
            $table->integer('last_activity')->index(); //Last activity timestamp
        });
    }

    
    //Remove the sessions table if it exists
    public function down(): void

    {
        Schema::dropIfExists('sessions');
    }
};
