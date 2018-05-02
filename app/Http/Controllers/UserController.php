<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsersWithRealBalance($balance){
       $query = "SELECT myonewinner.players.username, myonewinner.users.email, myonewinner.players.real_balance FROM myonewinner.users INNER JOIN myonewinner.players where (myonewinner.users.id = myonewinner.players.users_id and myonewinner.players.real_balance< $balance) Order by myonewinner.players.real_balance desc";



       


    }


     // obtiene los usuarios con saldo real igual o mayor al parámetro especificado
    public function getUsersWithRealBalance(Request $request){


    	/*

    	$sql = "SELECT myonewinner.players.username, myonewinner.users.email, myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,myonewinner.games where (myonewinner.games.id = myonewinner.players.games_register_id and myonewinner.users.id =myonewinner.players.users_id and myonewinner.players.real_balance >= ?) Order by myonewinner.players.real_balance asc";

    	*/

    	$users = DB::select('SELECT myonewinner.players.username, myonewinner.users.email, myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,myonewinner.games where (myonewinner.games.id = myonewinner.players.games_register_id and myonewinner.users.id =myonewinner.players.users_id and myonewinner.players.real_balance >= ?) Order by myonewinner.players.real_balance asc',[$request->realBalance]);
    	return view ('users.result_users_with_more_real_balance_than', ['users' => $users]);

    }

    // obtiene los usuarios con saldo real inferior al valor especificado
    public function getUsersWithLessRealBalanceThan(Request $request){

    	$users = DB::select('SELECT myonewinner.players.username, myonewinner.users.email, myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,myonewinner.games where (myonewinner.games.id = myonewinner.players.games_register_id and myonewinner.users.id =myonewinner.players.users_id and myonewinner.players.real_balance < ?) Order by myonewinner.players.real_balance desc',[$request->realBalance]);
    	return view ('users.result_users_with_less_real_balance_than', ['users' => $users]);

    }

    // obtiene los usuarios que no juegan desde hace días
    public function getLostUsers(Request $request){
    	$users = DB::select('SELECT myonewinner.players.username, myonewinner.users.email, 
myonewinner.users.last_login, myonewinner.games.name
FROM myonewinner.users INNER JOIN myonewinner.players, myonewinner.games
where (myonewinner.players.games_register_id = myonewinner.games.id and myonewinner.users.id = myonewinner.players.users_id and (datediff(now(),myonewinner.users.last_login) >= ?)) Order by myonewinner.users.last_login desc',[$request->days]);
    	$days = $request->days;
    	return view ('users.result_lost_users', ['users' => $users, 'days' => $days]);
    }
}
