<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    //esta clase de modelo va a intentar mapear con la tabla players de la BD onewinner_beta debido a la convención de Eloquent

    protected $table ='players';

    
    public function user(){
    	return $this->belongsTo('App\UserModel','users_id');
    	   }

     /*
    // Función para obtener los usuarios con menos saldo
    public function usersWithLessRealBalance($realBalance){
     
     // $players = DB::table('players') -> where('real_balance', '<', $realBalance) -> get(); 

     //$players = Player::where('real_balance', '<', '$realBalance')->get();
      // Player::has('real_balance', '<', $realBalance)-> get(); 
     // return $players;
    }
*/

}
