<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
    $user = Auth::user();

    // Get projects where the authenticated user is associated as an artist
    $projects = $user->artists;

    return view('myprojects.index', ['projects' => $projects]);
}

    


    public function stopCollab(Project $project)
{
    
    auth()->user()->projects()->detach($project);

    return redirect()->route('myprojects.index')->with('success', 'Collaboration stopped successfully.');
}



}
