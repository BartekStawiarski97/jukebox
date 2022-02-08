<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Classes\Playlist;

class QueueController extends Controller
{
    private $playlist;

    //
    public function addSongToQueue($id){
        $song = Song::findOrFail($id);
        echo $song->song_name;
        $playlist = new Playlist();
        $playlist->addtoqueue($song);
        return redirect('/queue');
    
    }

    public function clearQueue(){
        session()->forget('songqueue');
        return redirect('/'); 
    }

    public function removeSongFromQueue($id){
        $playlist = new Playlist();
        $playlist->removefromqueue($id);
        return redirect('/queue');
    
    }
}