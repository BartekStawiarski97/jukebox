<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Classes\Playlist;

class QueueController extends Controller
{
    private $playlist;

    public function addSongToQueue($id){
        $song = Song::findOrFail($id);
        echo $song->song_name;
        $playlist = new Playlist();
        $playlist->addToQueue($song);
        return redirect('/queue');   
    }

    public function clearQueue(){
        $playlist = new Playlist();
        $playlist->clearQueue();
        return redirect('/'); 
    }

    public function removeSongFromQueue($id){
        $playlist = new Playlist();
        $playlist->removeFromQueue($id);
        return redirect('/queue');
    
    }

    public function queue(){
        $playlist = new Playlist();
        return view('queue', [
            'queue' => session('songqueue'),
            'queueTime' => $playlist->convertTime()
        ]);
    }

    
}