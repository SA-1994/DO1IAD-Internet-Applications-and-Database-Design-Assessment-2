<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function update(Request $request, $pid)
    {
        //Find the project by its ID and ensure it belongs to the logged-in user
        $project = Project::where('pid', $pid)->where('uid', Session::get('uid'))->firstOrFail();

        //Check the form data is valid
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:1000',
            'phase' => 'required|string|in:design,development,testing,deployment,complete',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        //Save the changes to the project
        $project->update($validated);

        //Redirect to the project details page with a success message
        return redirect('/projects/' . $pid)->with('success', 'Project updated successfully.');
    }
}