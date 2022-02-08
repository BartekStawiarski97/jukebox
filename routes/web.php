<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SongController::class, 'index']);

Route::get('/home', [SongController::class, 'index']);

Route::get('/home/search', [SongController::class,  'search'])->name('home.search');

Route::get('/queue/add/{id}', 'App\Http\Controllers\QueueController@addSongToQueue');

Route::get('/queue/delete/{id}', 'App\Http\Controllers\QueueController@removeSongFromQueue');

Route::get('/queue/clear', 'App\Http\Controllers\QueueController@clearQueue');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/queue', function () {
    return view('queue');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/playlist', 'App\Http\Controllers\PlaylistController@index');

Route::post('/playlist/create', 'App\Http\Controllers\PlaylistController@create')->middleware('auth');

Route::get('/playlist/save', 'App\Http\Controllers\PlaylistController@save')->middleware('auth');

Route::get('/playlist/playlistname/{id}', 'App\Http\Controllers\PlaylistController@playlistname')->middleware('auth');

Route::post('/playlist/newname', 'App\Http\Controllers\PlaylistController@newname')->middleware('auth');

Route::get('/playlist/delete/{id}', 'App\Http\Controllers\PlaylistController@delete')->middleware('auth');

Route::get('/playlist/deletesong/{id}', 'App\Http\Controllers\PlaylistController@deletesong')->middleware('auth');

Route::get('/playlist/addsong/{id}', 'App\Http\Controllers\PlaylistController@addsong')->middleware('auth');

Route::post('/playlist/addsongtop', 'App\Http\Controllers\PlaylistController@addsongtop')->middleware('auth');




Auth::routes();


Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('/');