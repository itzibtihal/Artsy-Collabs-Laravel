<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Partner;

class DashboardController extends Controller
{
    public function index()
{
    $totalProjects = Project::count();
    $siteArtistsCount = User::whereHas('roles', function ($query) {
        $query->where('name', 'artist');
    })->count();
    $partnersCount = Partner::count();
    $newArtists = User::where('status', 0)->get();
    $recentProjects = Project::orderBy('created_at', 'desc')->take(5)->get();

    return view('dashboard',[
            'totalProjects' => $totalProjects,
            'siteArtistsCount' => $siteArtistsCount,
            'partnersCount' => $partnersCount,
            'newArtists' => $newArtists,
            'recentProjects' => $recentProjects,
        ]);
}
}
