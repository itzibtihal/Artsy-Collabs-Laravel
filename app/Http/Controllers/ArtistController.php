<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = User::whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })->get();
        $pendingArtists = User::where('status', 0)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'artist');
        })
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        return view('artists.index', compact('artists','pendingArtists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(UserRequest $request)
{
    $data = $request->validated();

    $data['password'] = Hash::make($data['password']);  
    // dd($data);

        DB::beginTransaction();

        try {
           
            $user = User::create($data);

            $user->roles()->attach(2); 

            if ($request->hasFile('profile')) {
                $profilePath = $request->file('profile')->store('profiles', 'public');
                $user->update(['profile' => $profilePath]);
            }
            

            DB::commit();

            return redirect()->route('artists.index')->with('success', 'Artist created successfully');
        } catch (\Exception $e) {
            dd('Exception occurred', $e->getMessage());
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create artist');
        }
    }

    public function show($id)
    {
        $artist = User::findOrFail($id);

        return view('artists.show', compact('artist'));
    }

    public function edit($id)
    {
        $artist = User::findOrFail($id);

        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Update the user data without validation (for testing purposes)
        $user->update($request->all());
    
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $user->update(['profile' => $profilePath]);
        }
    
        return redirect()->route('artists.index')->with('success', 'Artist updated successfully');
    }
    

    
    public function destroy($id)
    {
        $artist = User::findOrFail($id);

        // Detach the 'artist' role from the user
        $artist->roles()->detach(2); // Assuming '2' is the role ID for artists

        // Delete the user
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully');
    }
}

