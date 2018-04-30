-- NOMBRE DE LA CONSULTA: nombre del juego dada una fecha y un id de jugador
-- SOBRE LOS RESULTADOS
-- campo1: nombre del juego jugado
-- campo2: sala dónde se jugo
-- campo3: fecha del juego
-- campo4: username del jugador
-- campo5: id del jugador

SELECT distinct myonewinner.games.name, myonewinner.rooms.name, myonewinner.matches.finished_at, myonewinner.players.username,
myonewinner.players.id FROM myonewinner.games INNER JOIN myonewinner.rooms, myonewinner.players, myonewinner.matches, myonewinner.users
WHERE (myonewinner.matches.finished_at='2018-04-06 15:10:01' and (myonewinner.matches.player_1 = myonewinner.players.id or myonewinner.matches.player_2 = myonewinner.players.id) and myonewinner.players.id='1' and myonewinner.matches.rooms_id = myonewinner.rooms.id and myonewinner.rooms.games_id = myonewinner.games.id);