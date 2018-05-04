-- Nombre de consulta: Usuarios que no han jugado en los últimos 7 ó más días

-- SOBRE LOS RESULTADOS
-- campo 1: nombre de usuario
-- campo 2: email del usuario
-- campo 3: último login del usuario
-- campo 4: nombre del juego en el que se registró el usuario
-- campo 5: nombre del último juego (Petanca o Billar) jugado por el usuario

SELECT myonewinner.players.id as idplayer, players.username as username_of_player, myonewinner.users.email, (SELECT max(myonewinner.matches.finished_at) from myonewinner.matches inner join myonewinner.players, myonewinner.users, myonewinner.rooms, myonewinner.games
WHERE((((myonewinner.matches.player_1 = idplayer) or (myonewinner.matches.player_2 = idplayer)) and myonewinner.players.users_id = myonewinner.users.id) and myonewinner.players.username= username_of_player)) as date_of_last_game,
myonewinner.users.last_login, myonewinner.games.name AS registered_in_game,
(SELECT distinct myonewinner.games.name as last_game_played
 FROM myonewinner.games INNER JOIN myonewinner.rooms, myonewinner.players, myonewinner.matches, myonewinner.users
WHERE (myonewinner.matches.finished_at=date_of_last_game and (myonewinner.matches.player_1 = idplayer or myonewinner.matches.player_2 = idplayer) and myonewinner.matches.rooms_id = myonewinner.rooms.id and myonewinner.rooms.games_id = myonewinner.games.id))
FROM myonewinner.users INNER JOIN myonewinner.players, myonewinner.games
where (myonewinner.players.games_register_id = myonewinner.games.id and myonewinner.users.id = myonewinner.players.users_id and (datediff(now(),myonewinner.users.last_login)>=7)) Order by myonewinner.users.last_login desc;