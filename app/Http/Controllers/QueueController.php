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
        session()->forget('songqueue');
        return redirect('/'); 
    }

    public function removeSongFromQueue($id){
        $playlist = new Playlist();
        $playlist->removeFromQueue($id);
        return redirect('/queue');
    
    }

    public function queue(){
        return view('queue', [
            'queue' => session('songqueue'),
            'queueTime' => $this->convertTime()
        ]);
    }

    public function convertTime(){
        //variables
        $minutes = 0;
        $seconds = 0;
        $extraMinutes = 0;

        if(session()->has('songqueue')){
            $songQueue = session('songqueue');
        }else{
            $songQueue = session();
        }
        //$songQueue = session('songqueue');

        //foreach song in the queue
        foreach($songQueue as $song){
            //Returns associative array with detailed info about given date/time
            $convertedTime = date_parse($song->duration);
            $minutes += $convertedTime['minute'];
            $seconds += $convertedTime['second'];
            //int div checks how many times it fits in the first given number
            $extraMinutes = intdiv($seconds, 60);
            $minutes += $extraMinutes;
            //returns the remaining seconds
            //100 : 60 = 40 because 60 can only fit in once in 100
            $seconds = $seconds % 60;
            
        }
        $time = [ 'minute' => $minutes,'second' => $seconds];
        return $time;
    }
}