<?php

use App\Models\Project;

Route::get('/', function () {
    $projects = Project::all();
    return view('homepage', compact('projects'));
});

