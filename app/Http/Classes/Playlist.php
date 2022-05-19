<?php 
	
	namespace App\Http\Classes;
	
	class Playlist{

		private $sessionSongs;
		private $request;

		public function ___construct(Request $request){
			$this->request = $request;

			if ($request->session()->has('songQueue')) {
			$this->$sessionSongs = $this->$request->session()->get('songQueue');
		    }else{
				$this->sessionsongs = [];
			}
	    }

		public function syncSession(){
			$this->request->session()->put('songQueue', $this->sessionSongs);
		}

		public function getAllSongs(){
			return $this->sessionSongs;
		}
 		
    	public function addSong($songId){
			$this->request->session()->push('songQueue', $songId);
			
			syncSession();
    	}

		public function removeSong($songId){
			if ($request->session()->has('songQueue') != null){
			$this->request->session()->forget('songQueue', $songId);
			}
			syncSession();
		}


		public function clearAll(){
			$this->request->session()->forget('songqueue');

			syncSession();
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

		public function queueSession(){
			if(session()->has('songqueue')){
				$songQueue = session('songqueue');
			}else{
				$songQueue = session();
			}

		}
	}