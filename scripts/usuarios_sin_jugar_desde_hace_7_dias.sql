-- Usuarios que no han jugado en los últimos 7 días

SELECT myonewinner.players.username, myonewinner.users.email, 
myonewinner.users.last_login
FROM myonewinner.users INNER JOIN myonewinner.players
where (myonewinner.users.id = myonewinner.players.users_id and (datediff(now(),myonewinner.users.last_login)=7)) Order by myonewinner.users.last_login desc;