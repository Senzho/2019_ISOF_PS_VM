$(document).ready(function(){
    $(this).retrieveQuizSongs();
	$('#quizForm').submit(function (e){
		e.preventDefault();
		$(this).sendQuiz(this);
	});
});

$.fn.retrieveQuizSongs = function (){
	$.ajax({
		url:'http://localhost/Radio/index.php/Song/quizSongs',
		type:'GET',
		dataType: 'json',
		processData:false,
		contentType:false,
		cache:false,
		async:true,
		success: function(data){
			$(this).appendSongs(data);
		},
		error: function(data){
			console.log(data);
			console.log("Ocurrió un error al obtener las canciones");
		}
	});
}
$.fn.sendQuiz = function(form){
	var data = new FormData(form);
	$.ajax({
		url:'http://localhost/Radio/index.php/Score/saveQuiz',
		type:'POST',
		data: data,
		processData:false,
		contentType:false,
		cache:false,
		async:true,
		success: function(data){
			alert("¡Muchas gracias!");
			$(this).retrieveQuizSongs();
		},
		error: function(data){
			console.log(data);
			console.log("Ocurrió un error al enviar el quiz");
		}
	});
}
$.fn.appendSongs = function(data){
	$("#quizSongs").empty();
	$.each(data, function (i, item) {
		$(this).appendSong(item, i);
	});
}
$.fn.appendSong = function(item, i){
	var songsPane = $('#quizSongs');
	$(songsPane).append("<div id='songPane" + item["id"] + "'></div>");
	var songPane = $('#songPane' + item["id"]);
	$(songPane).append("<label id='" + item["id"] + "' class='songTitle'>" + item["name"] + "</label>");
	$(songPane).append("<div id='scorePane" + item['id'] + "' class='scorePane'></div>");
	var scorePane = $('#scorePane' + item['id']);
	$(scorePane).append("<select name='scoreSelect" + i + "'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>");
	$(scorePane).append("<img src='http://localhost/Radio/img/star.png' class='star' />");
	$(scorePane).append("<input type='hidden' name='songId" + i + "' value='" + item["id"] + "'/>");
}