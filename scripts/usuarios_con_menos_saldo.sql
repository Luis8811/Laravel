-- NOMBRE DE LA CONSULTA: Obtención de los usuarios con saldo real inferior a una cantidad
-- Parametrizar el valor que voy a utilizar para comparar
-- SOBRE LOS RESULTADOS
-- campo1: nombre de usuario 
-- campo2: email del usuario
-- campo3: saldo real del usuario
-- campo4: nombre del juego en el que se registró el usuario


SELECT myonewinner.players.username, myonewinner.users.email,
myonewinner.players.real_balance, myonewinner.games.name FROM myonewinner.users INNER JOIN myonewinner.players,
myonewinner.games
where (myonewinner.players.games_register_id = myonewinner.games.id and myonewinner.users.id = myonewinner.players.users_id and myonewinner.players.real_balance<40) Order by myonewinner.players.real_balance desc;