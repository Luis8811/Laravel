-- NOMBRE DE LA CONSULTA: Obtener datos de usuario
-- RESULTADOS: Obtiene datos a partir del username
-- campo1: id de usuario 
-- campo2: id de jugador

SELECT myonewinner.users.id, myonewinner.players.id FROM myonewinner.players inner join
myonewinner.users WHERE(myonewinner.players.username = 'player1' and myonewinner.users.id = myonewinner.players.users_id);