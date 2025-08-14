<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController; // Added controller import

//Homepage route with option to view all projects or filter by search and date 
Route::get('/', function (Request $request) {
    $search = $request->input('search');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $query = Project::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('phase', 'like', "%{$search}%");
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('start_date', [$startDate, $endDate]);
    } elseif ($startDate) {
        $query->whereDate('start_date', '>=', $startDate);
    } elseif ($endDate) {
        $query->whereDate('start_date', '<=', $endDate);
    }

    $projects = $query->get();
    return view('homepage', compact('projects'));
});

//New project creation form route if user is logged in
Route::get('/projects/create', function () {
    if (!Session::has('uid')) {
        return redirect('/login')->withErrors(['login' => 'Please log in to create a project.']);
    }
    return view('newProject');
});

//Project creation submission route
Route::post('/projects/create', function (Request $request) {
    if (!Session::has('uid')) {
        return redirect('/login')->withErrors(['login' => 'Please log in to create a project.']);
    }

    $request->validate([
        'title' => 'required|max:255',
        'short_description' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'phase' => 'required|in:design,development,testing,deployment,complete',
    ]);

    Project::create([
        'title' => $request->title,
        'short_description' => $request->short_description,
        'uid' => Session::get('uid'),
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'phase' => $request->phase,
    ]);

    return redirect('/')->with('success', 'Project created successfully.');
});

//Project details route
Route::get('/projects/{pid}', function ($pid) {
    $project = Project::with('user')->where('pid', $pid)->firstOrFail();
    return view('project-details', compact('project'));
});

//Route to show edit form for a project (requires login and ownership)
Route::get('/projects/{pid}/edit', function ($pid) {
    if (!Session::has('uid')) {
        return redirect('/login')->withErrors(['login' => 'Please log in to edit projects.']);
    }

    $project = Project::where('pid', $pid)->where('uid', Session::get('uid'))->firstOrFail();
    return view('edit-project', compact('project'));
});

//Route to handle project update submission
Route::put('/projects/{pid}', [ProjectController::class, 'update']);

//Registration form route
Route::get('/register', function () {
    return view('register');
});

//Registration submission route
Route::post('/register', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'username' => 'required|unique:users,username|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/')->with('success', 'Registration successful. You can now log in.');
});

//Login form route
Route::get('/login', function () {
    return view('login');
});

//Login submission route
Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Session::put('uid', $user->uid);
        Session::put('username', $user->username);
        return redirect('/')->with('success', 'Logged in successfully.');
    }

    return back()->withErrors(['Invalid credentials'])->withInput();
});

//Logout route
Route::get('/logout', function () {
    Session::flush();
    return redirect('/')->with('success', 'Logged out successfully.');
});