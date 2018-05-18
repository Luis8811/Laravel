<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player; 
use DateTime;

class PlayerController extends Controller
{
    //

    public function getAllPlayersInfo(){
    	$count = Player::count(); //cantidad de jugadores registrados
    	$max_real_balance = Player::max('real_balance'); //obtener máximo saldo real
    	$min_real_balance = Player::min('real_balance');
    	$max_fake_balance = Player::max('fake_balance');
    	$min_fake_balance = Player::min('fake_balance');
    	$min_age = Player::max('birthdate'); //obtengo la fecha de nacimiento de los jugadores más jóvenes
    	$max_age = Player::min('birthdate'); // obtengo la fecha de nacimiento de los jugadores más viejos
    	$average_age = Player::avg('birthdate');
    	$current_date = date("d");
    	//$temp_min_age =$this->getYearsBetweenTwoDates($current_date, $min_age); //llamando a una función de la clase
    	//$min_age = $temp_min_age;
    	$statistics = array(2);
    	$statistics[0]=$count;

    	//return view('players.index2', $data as $data); //arreglar par que me devuelva la cant
    	return view('players.index2', ['count' => $count, 'max_real_balance' => $max_real_balance,
    		'min_real_balance' => $min_real_balance, 'max_fake_balance' => $max_fake_balance,
    		'min_fake_balance' => $min_fake_balance, 'min_age' => $min_age, 'max_age' => $max_age,
    		'average_age' => $average_age]);
    }

    //Obtiene los años de diferencia entre 2 fechas. La primera fecha es la más reciente
    public function getYearsBetweenTwoDates($date1, $date2){
      //$a = (string)$date1;
     // $dateTime1 = DateTime::createFromFormat("Y-m-d", $date1);
     // $dateTime2 = DateTime::createFromFormat("Y-m-d", $date2);
     // $dateTime2 = new DateTime($date2);
     // $date = $dateTime2->diff($dateTime1);
    	//$date = $date2->diff($date1);
    	 $datetime1 = date_create($date1);
         $datetime2 = date_create('2012-12-30');
         $interval = date_diff($datetime1, $datetime2);
         return $interval->format('%y');

      //return $date->y;
    }

    // Obtener jugadores con el ORM
    public function getPlayersORM(){
       
    }

    // Obtener los jugadores con saldo real igual o superior a un valor dado
    public function getPlayersWithMoreRealBalanceThan(Request $request){

       $realBalance = $request->realBalance;
       $players = Player::where('real_balance', '>=',$realBalance)->orderBy('real_balance', 'asc') ->paginate(10);
        return view('players.result_players_real_balance_more_than', ['players' => $players, 'realBalance' => $realBalance]);
    }
}
