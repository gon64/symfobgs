function makeDescription(bgg_id,yearpublished,minplayers,maxplayers,age,playingtime){
        return '<b>Publicado en</b> ' + yearpublished + '</br>' +
        '<b>Jugadores:</b> ' +
        (minplayers == maxplayers ? minplayers : minplayers + ' - ' + maxplayers) + '</br>' +
        '<b>Edad recomendada:</b> '  + age + '</br>' +
        '<b>Duracion: </b>' + playingtime + ' mins </br>' +
        '<a href="http://boardgamegeek.com/boardgame/' + bgg_id + '" target="_blank" class="btn btn-primary center">Ficha en boardgamegeek</a>'
        ;
}

$(document).ready(function(){

	var timeoutID = null;

	// Obtener y procesar resultados
	$('#search-game-input').keyup(function(){
		clearTimeout(timeoutID);
		val = $('#search-game-input').val();
		if (val.length > 3 ) {
			timeoutID = setTimeout(() => doSearchQuery(), 300);
		}
	});


	function doSearchQuery(){
		$('#select-game-btn').addClass('disabled').prop("disabled", "diasbled");
		$.get('/BGGAPI/searchByName/' + val, function(data, status){
		}).done(function(data, status){
			response = $.parseJSON(JSON.stringify(data));
			$('#search-game-select option').remove();
			$('#search-game-select').append('<option selected="true" disabled="disabled">Resultados: ' + response.boardgame.length + '</option>');
			if (response.boardgame.length < 1000) $.each(response.boardgame, function(){
				$('#search-game-select').append("<option value='" + this['@attributes'].objectid + "'>" + this.name + "</option>");
			});
		});
	}

	// Poblar info del juego en vista previa y habilitar botÃ
	$('#search-game-select').on('change', function() {
		var id = this.value;
		$.get('/BGGAPI/getById/' + this.value, function(data, status){
			response = $.parseJSON(JSON.stringify(data));

			$('#found-game-img').attr("src",response.urlPortada);

			// makeDescription(bgg_id,yearpublished,minplayers,maxplayers,age,minplaytime,maxplaytime)
			//
			description = makeDescription(
				id,
				response.yearpublished,
				response.minplayers,
				response.maxplayers,
				response.age,
				response.playingtime
			);
			$('#found-game-description').html(description);
			$('#select-game-btn').removeClass('disabled').prop("disabled", false);
			console.log(id, response.urlPortada, $('#search-game-select').val());
			$('#bgg_id').val(id);
			$('#img_url').val(response.urlPortada);
			$('#bg_name').val($('#search-game-select:selected').text());


		});
	})
});
