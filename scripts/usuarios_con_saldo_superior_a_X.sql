-- NOMBRE DE LA CONSULTA: Obtención de los usuarios con saldo real mayor a una cantidad
-- SOBRE LOS RESULTADOS
-- campo1: nombre de usuario 
-- campo2: email del usuario
-- campo3: saldo real del usuario
-- campo4: nombre del juego en el que se registró el usuario

SELECT myonewinner.players.username, myonewinner.users.email,
myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,
myonewinner.games
where (myonewinner.games.id = myonewinner.players.games_register_id and myonewinner.users.id = myonewinner.players.users_id and myonewinner.players.real_balance > 10) Order by myonewinner.players.real_balance asc;