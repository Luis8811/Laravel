-- NOMBRE DE LA CONSULTA: Fecha del último juego jugado por el usuario
-- Parámetro: username del usuario
-- SOBRE LOS RESULTADOS
-- campo1: fecha del último juego jugado por un usuario

SELECT max(myonewinner.matches.finished_at) from myonewinner.matches inner join myonewinner.players, myonewinner.users, myonewinner.rooms, myonewinner.games
WHERE((((myonewinner.matches.player_1 = myonewinner.players.id) or (myonewinner.matches.player_2 = myonewinner.players.id)) and myonewinner.players.users_id = myonewinner.users.id) and myonewinner.players.username='player1');