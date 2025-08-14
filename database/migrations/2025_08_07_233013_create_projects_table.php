<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Create the projects table with required fields
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('pid'); //Primary key - Project ID
            $table->string('title'); //Project title
            $table->date('start_date'); //Start date of the project
            $table->date('end_date')->nullable(); //End date of project which can be null if ongoing
            $table->text('short_description'); //Short description of the project
            $table->enum('phase', ['design', 'development', 'testing', 'deployment', 'complete']); //Different phases of the project
            $table->unsignedBigInteger('uid')->nullable(); // Foreign key - User ID or nullable if unassigned
            $table->foreign('uid')->references('uid')->on('users')->onDelete('set null'); //Links to users table unassignes a project if user is removed
            $table->timestamps(); //Created_at and updated_at
        });
    }

    //Predefined Laravel method to drop the projects table
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};