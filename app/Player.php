<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //esta clase de modelo va a intentar mapear con la tabla players de la BD onewinner_beta debido a la convención de Eloquent

    protected $table ='players';

     /*
    public function user(){
    	//return $this->hasOne('App\UserModel');
    }

    */
    public function user(){
    	return $this->belongsTo('App\UserModel','users_id');
    	   }
}
