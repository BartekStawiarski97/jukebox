<?php 
	
	namespace App\Classes;
	
	class Playlist{
 		public function __construct() {
        	return "construct function was initialized.";
    	}

    	public function addToQueue($song){
			if (session('songqueue') == null){
				session()->put('songqueue', []);
				session()->push('songqueue', $song);
			} else {
				session()->push('songqueue', $song);
			}
    	}

		public function removeFromQueue($index){
			if (session('songqueue') == null){
				return "queue empty";
			} else {
				session()->forget('songqueue.'.$index);
			}
		}
	}