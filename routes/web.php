<?php
use App\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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


// Obtener los jugadores con saldo real inferior a un valor dado
Route::get('/formPlayersWtihLessRealBalanceThan', 
function(){
	return view('players.form_players_with_less_real_balance');
});

// Obtener los jugadores con saldo real inferior a un valor dado
Route::get('/playersWithLessRealBalance', function(Request $request){
	 $realBalance = $request->realBalance;
	 $players = Player::where('real_balance', '<',$realBalance)->orderBy('real_balance', 'desc') ->paginate(15);
        return view('players.playersusers', ['players' => $players, 'realBalance' => $realBalance]);
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

Route::get('playersorm', function(){
   $players = Player::all();
   $playersWithAtLeast10RealBalance = $players->where('real_balance', '>',10);
   $playersWithAtLeast10RealBalance->all();

   return view('players.indexorm')->with('playersWithAtLeast10RealBalance', $playersWithAtLeast10RealBalance);
}); // ruta para obtener todos los jugadores con el ORM


// Ruta para la obtención de los usuarios de los jugadores
Route::get('usersorm', function(){
  $user = Player::find(1)->user;
  return view('users.usersorm')->with('user',$user);
}); //Obtiene los datos del usuario a partir del jugador

// Ruta para mostrar todos los jugadores con info de usuario
Route::get('playersusers', function(){
  $playersC = Player::all();
  $playersE = $playersC -> where('real_balance','>=',9);
  $playersA = $playersE ->sortByDesc('real_balance'); //sortBy ordena de mayor a menor
  $players = $playersA ->slice(0,10); // a partir del registro 1 obtener 10
  return view('players.playersusers')->with('players', $players);
});





Route::get('playersInfo', 'PlayerController@getAllPlayersInfo');

// Route::post('message','UserController@getMessage');

Route::post('message','UserController@getMessage');