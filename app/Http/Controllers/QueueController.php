<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Http\Classes\Playlist;

class QueueController extends Controller
{
    private $playlist;

    public function addSong(Request $request, $id){
        $songId = Song::findOrFail($id);
        $playlist = new Playlist($request);
        $playlist->addSong($songId);
        return redirect('/queue');   
    }

    public function clearQueue(Request $request){
        $playlist = new Playlist($request);
        $playlist->clearAll();
        return redirect('/'); 
    }

    public function removeSongFromQueue(Request $request, $id){
        $playlist = new Playlist($request);
        $playlist->removeSong($id);
        return redirect('/queue');
    
    }

    public function queue(Request $request){
        $playlist = new Playlist($request);
        return view('queue', [
            'queue' => $playlist->getAllSongs(),
            'queueTime' => $playlist->convertTime()
        ]);
    }

    
}