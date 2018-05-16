<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = 'users';

     public function player()
    {
        return $this->hasOne('App\Player');
    } 
}
