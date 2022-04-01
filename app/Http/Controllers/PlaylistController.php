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
       
    public function addSong($id, $songId){
        $playlists = Song::find($id);
        $playlists->songs()->attach($songId);
    }

    /**
     * Adds song to existing playlist
     */

     /*
    public function addSongToPlaylist(Request $request){
        $songlist = array();
        $items = $request->input();
        unset($items['_token']);
        unset($items['playlist_id']);

    
        foreach ($items as $song){
            if( $song>0){
                array_push($songlist, $song);
            }   
  
        }

        if($songlist == NULL){
            return redirect('/');
        }
        foreach ($songlist as $item){
            Playlistitem::create(['playlist_id' => $request->input('playlist_id'), 'song_id' => $item]);
        }
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
}