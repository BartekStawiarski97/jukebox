<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Route;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = DB::table('songs')->get();
        return view('home', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = DB::table('genres')->where('genres', 'Hip-Hop')->get();

        return view('home', [
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        if($_GET['sort'] == "all"){
            return redirect('/');
        }

        if($_GET['sort'] == "hip-hop"){
            $songs = DB::table('songs')->where('genre', 'hip-hop')->get();

            return view('home', [
                'songs' => $songs
            ]);
        }

        if($_GET['sort'] == "pop"){
            $songs = DB::table('songs')->where('genre', 'pop')->get();

            return view('home', [
                'songs' => $songs
            ]);
        }

        if($_GET['sort'] == "rock"){
            $songs = DB::table('songs')->where('genre', 'rock')->get();

            return view('home', [
                'songs' => $songs
            ]);
        }

        if($_GET['sort'] == "jazz"){
            $songs = DB::table('songs')->where('genre', 'jazz')->get();

            return view('home', [
                'songs' => $songs
            ]);
        }

        if($_GET['sort'] == "dance"){
            $songs = DB::table('songs')->where('genre', 'dance')->get();

            return view('home', [
                'songs' => $songs
            ]);
        }
    }
}
