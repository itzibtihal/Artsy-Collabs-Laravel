<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ArtistProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('partners', PartnerController::class);
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/dashboard/artists', 'App\Http\Controllers\ArtistController@index');
Route::get('/dashboard/requests', 'App\Http\Controllers\RequestController@index');
Route::get('/dashboard/partners', 'App\Http\Controllers\PartnerController@index');
Route::resource('artists', ArtistController::class);
Route::put('/artists/{id}', 'App\Http\Controllers\ArtistController@update')->name('artists.update');
Route::resource('/projects', ProjectController::class);
Route::post('/projects/add', 'ProjectController@store')->name('projects.store');


Route::get('/artist/dashboard', [ArtistProfileController::class, 'index'])->name('artist');
Route::get('/artist/projects/{id}', [ArtistProfileController::class, 'show'])->name('project.details');

Route::post('/artist/projects/{project}/stopCollab', 'App\Http\Controllers\ArtistProfileController@stopCollab')->name('artist.stopCollab');
Route::get('/artist/projects', 'App\Http\Controllers\ArtistProfileController@projects')->name('artist.projects');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
