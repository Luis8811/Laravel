<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsersWithRealBalance($balance){
      /*
       $query = "SELECT onewinner_beta.players.username, onewinner_beta.users.email, onewinner_beta.players.real_balance FROM onewinner_beta.users INNER JOIN onewinner_beta.players where (onewinner_beta.users.id = onewinner_beta.players.users_id and onewinner_beta.players.real_balance< $balance) Order by onewinner_beta.players.real_balance desc";
       */
       $playersC = Player::all();
       $playersE = $playersC -> where('real_balance','>=',9);
       $playersA = $playersE ->sortByDesc('real_balance'); //sortBy ordena de mayor a menor
       $players = $playersA ->slice(0,10); // a partir del registro 1 obtener 10
       return view('players.playersusers')->with('players', $players);
    }

     // obtiene los usuarios con saldo real igual o mayor al parámetro especificado
    public function getUsersWithRealBalance(Request $request){

    	/*

    	$sql = "SELECT myonewinner.players.username, myonewinner.users.email, myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,myonewinner.games where (myonewinner.games.id = myonewinner.players.games_register_id and myonewinner.users.id =myonewinner.players.users_id and myonewinner.players.real_balance >= ?) Order by myonewinner.players.real_balance asc";

    	*/

    	$users = DB::select('SELECT onewinner_beta.players.username, onewinner_beta.users.email, onewinner_beta.players.real_balance, onewinner_beta.games.name FROM onewinner_beta.users INNER JOIN onewinner_beta.players,onewinner_beta.games where (onewinner_beta.games.id = onewinner_beta.players.games_register_id and onewinner_beta.users.id =onewinner_beta.players.users_id and onewinner_beta.players.real_balance >= ?) Order by onewinner_beta.players.real_balance asc',[$request->realBalance]);

        $realBalance = $request->realBalance;

    	return view ('users.result_users_with_more_real_balance_than', ['users' => $users, 'realBalance' => $realBalance]);
    }

    // obtiene los usuarios con saldo real inferior al valor especificado
    public function getUsersWithLessRealBalanceThan(Request $request){

         /* Brute force 
    	$users = DB::select('SELECT onewinner_beta.players.username, onewinner_beta.users.email, onewinner_beta.players.real_balance, onewinner_beta.games.name FROM onewinner_beta.users INNER JOIN onewinner_beta.players,onewinner_beta.games where (onewinner_beta.games.id = onewinner_beta.players.games_register_id and onewinner_beta.users.id =onewinner_beta.players.users_id and onewinner_beta.players.real_balance < ?) Order by onewinner_beta.players.real_balance desc',[$request->realBalance]);
        $realBalance = $request->realBalance;
    	return view ('users.result_users_with_less_real_balance_than', ['users' => $users, 'realBalance' => $realBalance]);
        */

        $realBalance = $request->realBalance;
        $users =Player::has('real_balance', '<', $realBalance)-> get();
       // $users = $usersCollection -> sortByDesc('real_balance');

        return view('users.result_users_with_less_real_balance_than', ['users' => $users, 'realBalance' => $realBalance]);
    }

    // obtiene los usuarios que no juegan desde hace días
    public function getLostUsers(Request $request){
    	$users = DB::select('SELECT onewinner_beta.players.username, onewinner_beta.users.email, 
onewinner_beta.users.last_login, onewinner_beta.games.name
FROM onewinner_beta.users INNER JOIN onewinner_beta.players, onewinner_beta.games
where (onewinner_beta.players.games_register_id = onewinner_beta.games.id and onewinner_beta.users.id = onewinner_beta.players.users_id and (datediff(now(),onewinner_beta.users.last_login) >= ?)) Order by onewinner_beta.users.last_login desc',[$request->days]);

    	$days = $request->days;
    	return view ('users.result_lost_users', ['users' => $users, 'days' => $days]);
    }

    // Función para probar paso de parámetros desde enlaces
    public function getMessage(Request $request){
        //TODO
        return view('users.details_user',['username' => 'Test']);
    }

    // Obtiene el último juego jugado por un usuario
    public function getLastGamePlayedByPlayerId($id){
      //TODO
    }
}
