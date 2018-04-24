-- Obtención de los usuarios con saldo real inferior a una cantidad
-- Parametrizar el valor que voy a utilizar para comparar

SELECT myonewinner.players.username, myonewinner.users.email,
myonewinner.players.real_balance FROM myonewinner.users INNER JOIN myonewinner.players
where (myonewinner.users.id = myonewinner.players.users_id and myonewinner.players.real_balance<40) Order by myonewinner.players.real_balance desc;