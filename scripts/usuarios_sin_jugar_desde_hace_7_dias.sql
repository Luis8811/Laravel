-- Nombre de consulta: Usuarios que no han jugado en los últimos 7 ó más días

-- SOBRE LOS RESULTADOS
-- campo 1: nombre de usuario
-- campo 2: email del usuario
-- campo 3: último login del usuario
-- campo 4: nombre del juego en el que se registró el usuario
-- campo 5: nombre del último juego (Petanca o Billar) jugado por el usuario

SELECT myonewinner.players.username, myonewinner.users.email, 
myonewinner.users.last_login, myonewinner.games.name
FROM myonewinner.users INNER JOIN myonewinner.players, myonewinner.games
where (myonewinner.players.games_register_id = myonewinner.games.id and myonewinner.users.id = myonewinner.players.users_id and (datediff(now(),myonewinner.users.last_login)>=7)) Order by myonewinner.users.last_login desc;