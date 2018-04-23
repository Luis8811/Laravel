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



Route::get('conex','DBConnectionController@listTablesInBD');

Route::get('players', function(){
	$players = Player::all();
	return view('players.index')->with('players', $players);
}); //ruta para obtener todos los jugadores

Route::get('playersInfo', 'PlayerController@getAllPlayersInfo');
