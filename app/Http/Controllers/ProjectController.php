<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Partner;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $partners = Partner::all();
        $artists = User::whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })->get();
        return view('projects.create', compact('partners', 'artists'));
    }




    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|string',
            'budget' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'requirements' => 'required|string',
            'status' => 'required|integer', 
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
           
        ]);

        $project = Project::create($validatedData);

        $project->partners()->sync($request->input('partners', []));
        $project->artists()->sync($request->input('users', []));
        
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('images'), $coverImageName);
            $project->cover_image = $coverImageName;
            // dd($project);
            $project->save();
        }
        

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }





    public function edit(Project $project)
    {
        $partners = Partner::all();
        $artists = User::whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })->get();

        // Ensure the relationships
        $project->load('partners', 'artists');

        return view('projects.edit', compact('project', 'partners', 'artists'));
    }


    public function update(Request $request, Project $project)
    {
        
        $validatedData = $request->validate([
            'title' => 'required',
            'budget' => 'required|numeric',
            
        ]);
        $project->update($validatedData);

        $project->partners()->sync($request->input('partners', []));
        $project->artists()->sync($request->input('users', []));

       

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    // public function update(Request $request, Project $project)
    // {
        
    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'budget' => 'required|numeric',
            
    //     ]);

        
    //     $project->update($validatedData); 
    //     $project->partners()->sync($request->input('partners', []));
    //     $project->users()->sync($request->input('users', []));

       
    //     if ($request->hasFile('cover_image')) {
            
    //         if ($project->cover_image) {
    //             unlink(public_path('images/' . $project->cover_image));
    //         }

    //         $coverImage = $request->file('cover_image');
    //         $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
    //         $coverImage->move(public_path('images'), $coverImageName);
    //         $project->cover_image = $coverImageName;
    //         $project->save();
    //     }

    //     return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    // }



    public function destroy(Project $project)
    {
        
        $project->partners()->detach();
        $project->users()->detach();

        if ($project->cover_image) {
            unlink(public_path('images/' . $project->cover_image));
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
