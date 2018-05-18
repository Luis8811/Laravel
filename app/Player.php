<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{

    protected $table ='players';

    
    // Usuario al que pertenece el jugador
    public function user(){
    	return $this->belongsTo('App\UserModel','users_id');
    	   }

    // Juego en el cual se registró el jugador
    public function gameOfRegistration(){
      return $this->belongsTo('App\Game', 'games_register_id');
    }
}
