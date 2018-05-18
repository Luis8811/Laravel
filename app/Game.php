<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    // Los jugadores registrados en el juego
    public function playersRegistered(){
      return $this->hasMany('App\Player');
    }
}
