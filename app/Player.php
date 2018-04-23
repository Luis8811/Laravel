<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //esta clase de modelo va a intentar mapear con la tabla players de la BD myonewinner debido a la convención de Eloquent

    protected $table ='players';
}
