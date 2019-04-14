$(document).ready(function(){
    $(this).retrieveSongs();
});

$.fn.retrieveSongs = function (){
    $.ajax({
	    url:'http://localhost/Radio/index.php/Song/songs',
        type:'GET',
        dataType: 'json',
	    processData:false,
	    contentType:false,
	    cache:false,
	    async:true,
	    success: function(data){
	        $.each(data, function (i, item) {
				setTimeout(() => {
					$(this).appendSong(item);
				}, 0);
            });
	    },
	    error: function(data){
            console.log(data);
	    	console.log("Ocurrió un error al obtener las canciones");
	    }
	});
}
$.fn.appendSong = async function(item){
	var songsPane = $('#songsPane');
	$(songsPane).append("<div id='songPane" + item["id"] + "' class='song'></div>");
	var songPane = $('#songPane' + item["id"]);
	$(songPane).append("<label id='" + item["id"] + "' class='font songTitle'>" + item["name"] + "</label>");
	$(songPane).append("<div id='songInfo" + item["id"] + "' class='songInfo'></div>");
	var infoPane = $('#songInfo' + item["id"]);
	$(infoPane).append("<label class='font songData'>Votos: " + item["votes"] + "</label><label class='font songData'> Promedio: " + item["average"] + "</label>");
}