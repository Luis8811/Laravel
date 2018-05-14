select max(myonewinner.matches.finished_at) as last_game_played from
myonewinner.matches where (myonewinner.matches.player_1 = '43'
 OR myonewinner.matches.player_2 = '43');