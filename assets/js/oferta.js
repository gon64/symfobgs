function makeDescription(bgg_id,yearpublished,minplayers,maxplayers,age,minplaytime,maxplaytime,age){
	return '<b>Publicado en</b> ' + yearpublished + '</br>' +
	'<b>Jugadores:</b> ' +
	(minplayers == maxplayers ? minplayers : minplayers + ' - ' + maxplayers) + '</br>' +
	'<b>Edad recomendada:</b> '  + (typeof age != 'undefined' ? age : '?') + '</br>' +
	'<b>Duracion: </b>' +
	(minplaytime == maxplaytime ? minplaytime : minplaytime + ' - ' + maxplaytime) + ' mins </br>' +
	'<a href="http://boardgamegeek.com/boardgame/' + bgg_id + '" target="_blank" class="btn btn-primary center">Ficha en boardgamegeek</a>'
	;
}
