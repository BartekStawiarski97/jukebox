<?php 
	
	namespace App\Http\Classes;
	use Illuminate\Http\Request;
	
	class Playlist{

		private $sessionSongs;
		private $request;

		/** Checks if the session has Queue */

		public function __construct(Request $request){
			$this->request = $request;

			if ($this->request->session()->has('songQueue')) {
			$this->sessionSongs = $this->request->session()->get('songQueue');
		    }else{
				$this->sessionsongs = [];
			}
	    }

		public function syncSession(){
			$this->request->session()->put('songQueue', $this->sessionSongs);
		}

		/** Gets all the songs from the queue in the session */


		public function getAllSongs(){
			return $this->sessionSongs;
		}
 		
		/** Adds song/songs to the Queue */

    	public function addSong($songId){
			$this->request->session()->push('songQueue', $songId);
			
			//syncSession();
    	}

		/** Removes song/songs to the Queue */

		public function removeSong($songId){
			if ($this->request->session()->has('songQueue') != null){
			$this->request->session()->forget('songQueue', $songId);
			}
			//syncSession();
		}

		/** Removes all songs from the queue */


		public function clearAll(){
			$this->request->session()->forget('songqueue');

			//syncSession();
		}

		/** Shows total duration of the queue */

		public function convertTime(){
			//variables
			$minutes = 0;
			$seconds = 0;
			$extraMinutes = 0;
	
			if(session()->has('songQueue')){
				$songQueue = session('songQueue');
			}else{
				$songQueue = session();
			}
	
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

		/** Creates queue session */

		public function queueSession(){
			if(session()->has('songqueue')){
				$songQueue = session('songqueue');
			}else{
				$songQueue = session();
			}

		}
	}