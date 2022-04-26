<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Playlistitem;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class PlaylistController extends Controller
{
    //
    public function index(Request $request){
        $songs = Song::all();
        $genres = Genre::all();

        return view('playlist', [
            'songs' => $songs,
            'genres' => $genres,
        ]);
    }

    /**
     * Creates playlist with picked songs
     */

    public function create(Request $request){
        $this->validate(request(), [
            'playlistname' => 'required',
            
        ]);
        $songlist = array();
   
        foreach ($request->input() as $song){
            if( $song==(int)$song){
                if( $song>0){
                    array_push($songlist, $song);
                }   
            }
        }
        $pname = $request->input('playlistname');
        $user_id = $request->user()->id;

        $playlist_id = Playlist::insertGetId(['name' => $pname, 'user_id' => $user_id]);

        return $this->addSongs($songlist, $playlist_id);
    }

    /**
     * Playlist with picked songs
     */

    public function addSongs($list, $playlist_id){
        if($list == NULL){
            return redirect('/');
        }
        foreach ($list as $item){

            Playlistitem::create(['playlist_id' => $playlist_id, 'song_id' => $item]);
        }
        return redirect('/playlist');
    }

    /**
     * Make you able to create a playlist with songs from your queue
     */

    public function save(Request $request){
        $name = date('Y-m-d H:i:s').'_Queue';
        $totalsongs = count(session('songqueue'));
        $user_id = $request->user()->id;

        $playlist_id = Playlist::insertGetId(
            ['name' => $name, 'user_id' => $user_id]
        );

        $p=0;

        for ($x = 0; $x < $totalsongs; $x++) {
            Playlistitem::create(['playlist_id' => $playlist_id, 'song_id' => session('songqueue')[$p]['id']]);

            $p = $p+1;
        }
        return $this->playlistName($playlist_id);
    }

    /**
     * Gives name to your playlist
     */

    public function playlistName($id){
        $name = Playlist::where('id',$id)->get();
        return view('playlistname', [
            'playlist_id' => $id,
            'name' => $name,
        ]);      
    }

    /**
     * Change name of playlist
     */

    public function newName(Request $request){
        $this->validate(request(), [
            'playlistname' => 'required',
            
        ]);
        $result = Playlist::where('user_id', $request->user()->id)->where('id', $request->playlist_id)->get();
        if ($result->isEmpty()) { 
            return back()->with('error', 'You need to fill the field first');
        } else{
            Playlist::where('user_id', $request->user()->id)->where('id', $request->playlist_id)->update(['name' => $request->input('playlistname')]);  
            return redirect('/playlist');
        }
    }


    /**
     * Adds song to playlist
     */

    public function addSongToPlaylist($id, $songId){
        //gets playlist id and attaches the chosen song to the playlist
        $playlist = Playlist::find($id);
        $playlist->songs()->attach($songId);

        return redirect('/playlist');
    }

    /**
     * Deletes playlist
     */
    public function delete($id){
        Playlist::where('id',$id)->delete();
        Playlistitem::where('playlist_id',$id)->delete();

        return redirect('/playlist');
    }

    /**
     * Deletes song from the playlist
     */

    public function deleteSong($id, $songId){
        $playlist = Playlist::find($id);
        $playlist->songs()->detach($songId);

        return redirect('/playlist');
    }

    public function playlistinfo($id){
        //gets the playlist id and the songs
        //also runs the convertTime function
        $playlist = Playlist::findOrFail($id);
        $songs = Song::get();
        $playlistTime = $this->convertTime($id);

        return view('playlistinfo', [
            'playlist' => $playlist,
            'songs' => $songs,
            'playlistTime' => $playlistTime
        ]);
    }

    public function convertTime($id){
        //variables
        $minutes = 0;
        $seconds = 0;
        $extraMinutes = 0;

        $songsInPlaylist = Playlistitem::select('*')->join('songs', 'songs.id', '=', 'playlistitems.song_id')->where('playlist_id', $id)->get();

        //foreach song in the queue
        foreach($songsInPlaylist as $song){
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