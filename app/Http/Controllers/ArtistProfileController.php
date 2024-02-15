<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;



class ArtistProfileController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('artist', ['projects' => $projects]);
    }



    public function show($id)
    {
        $project = Project::with(['partners', 'artists'])->findOrFail($id);
        return view('detailsproject.index', ['project' => $project]);
    }
    
    public function projects()
{
    $projects = Project::all();
    return view('myprojects.index', ['projects' => $projects]);
}

    


    public function stopCollab(Project $project)
{
    
    auth()->user()->projects()->detach($project);

    return redirect()->route('myprojects.index')->with('success', 'Collaboration stopped successfully.');
}



}
