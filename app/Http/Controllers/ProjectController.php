<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::withCount(['artists', 'partners'])->get();

        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        $artists = User::whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })->get();
        
        // dd($artists);

        $partners = Partner::all();

        return view('projects.create', compact('artists', 'partners'));
    }

    public function store(ProjectRequest $request)
{
    DB::beginTransaction();

    try {
        $data = $request->validated();

        $project = Project::create($data);

        $project->artists()->attach($data['artist_ids'] ?? []);
        $project->partners()->attach($data['partner_ids'] ?? []);

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
            $project->update(['cover_image' => $coverImagePath]);
        }

        DB::commit();

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    } catch (\Illuminate\Validation\ValidationException $e) {
        DB::rollBack();

        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to create project');
    }
}


public function destroy($id)
{
    $project = Project::findOrFail($id);
    $project->delete();
    return redirect()->back()->with('success', 'Project deleted successfully');
}
    
}
