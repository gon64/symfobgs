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


			$('#found-game-img').attr("src",response.boardgame.image);
			description = makeDescription(
				id,
				response.boardgame.yearpublished,
				response.boardgame.minplayers,
				response.boardgame.maxplayers,
				response.boardgame.age,
				response.boardgame.minplaytime,
				response.boardgame.maxplaytime
			);
			$('#found-game-description').html(description);
			$('#select-game-btn').removeClass('disabled').prop("disabled", false);
			console.log(id, response.boardgame.image, $('#search-game-select').val());
			$('#bgg_id').val(id);
			$('#img_url').val(response.boardgame.image);
			$('#bg_name').val($('#search-game-select:selected').text());


		});
	})
});
