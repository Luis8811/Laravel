<?php
use App\Player;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Obtener los usuarios con saldo real superior o igual a un valor dado
Route::get('/usersWithRealBalance', function () {
    return view('users.users_with_more_real_balance_than');
}); 

//Obtener los usuarios con saldo real superior o igual a un valor dado
Route::get('/usersWithRealBalancePlus', 
	'UserController@getUsersWithRealBalance'); 
	
// Obtener los usuarios con saldo real inferior a un valor dado
Route::get('/formUsersWithLessRealBalanceThan', function () {
    return view('users.users_with_less_real_balance_than');
}); 

// Obtener los usuarios con saldo real inferior a un valor dado
Route::get('/usersWithLessRealBalanceThan',
	'UserController@getUsersWithLessRealBalanceThan');

// Obtener los usuarios que no juegan hace X días
Route::get('/formLostUsers', function () {
    return view('users.lost_users');
}); 

// Obtener los usuarios que no juegan hace X días
Route::get('/resultLostUsers',
	'UserController@getLostUsers');


Route::get('players', function(){
	$players = Player::all();
	return view('players.index')->with('players', $players);
}); //ruta para obtener todos los jugadores

Route::get('playersInfo', 'PlayerController@getAllPlayersInfo');
