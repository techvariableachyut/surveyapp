$(document).ready(function(e) {
  var timeout; delay = 1000;
  $('#hometown').keyup(function(e) {
    if(timeout) { clearTimeout(timeout); }
    timeout = setTimeout(function() { myFunction(); }, delay);
    });

  function myFunction() {
    $.ajax({
			type: "GET",
			url:"http://localhost/profile/search/hometown",
			data:{hometown: $('#hometown').val()},
		})
		.done(function(msg){
			if (msg['hometown'] == false) {
				$(".autocompleteTownSearch").append("<p class='noresults'>No results found!</p>");
			}else{
				$(".hometownfoundlist").remove();
				for (var i = 0; i <= msg['hometown'].length; i++) {
					$(".autocompleteTownSearch").append("<span class='hometownfoundlist ht_listNo"+i+"'> \
						<a href='#' onclick='pasteonclicktoinput"+msg['hometown'][i]['id']+"(event)'>" + msg['hometown'][i]['hometown'] + "</a> \
						<br> <script> \
						 function pasteonclicktoinput"+msg['hometown'][i]['id']+"(event){ \
							event.preventDefault(); \
							$('#hometown').val('"+msg['hometown'][i]['hometown']+"');\
							$('#hometownid').val('"+msg['hometown'][i]['id']+"');\
							$('.hometownfoundlist').remove();\
						}</script></span>");
				}

			}
		})
  }


  $('#city').keyup(function(e) {
    if(timeout) { clearTimeout(timeout); }
    timeout = setTimeout(function() { searchCity(); }, delay);
    });

  function searchCity() {
    $.ajax({
			type: "GET",
			url:"http://localhost/profile/search/city",
			data:{city: $('#city').val()},
		})
		.done(function(msg){
			if (msg['city'] == false) {
				$(".autocompleteCitySearch").append("<p class='noresults'>No results found!</p>");
			}else{
				$(".cityfoundlist").remove();
				for (var i = 0; i <= msg['city'].length; i++) {
					$(".autocompleteCitySearch").append("<span class='cityfoundlist city_listNo"+i+"'> \
						<a href='#' onclick='pasteoncitytoinput"+msg['city'][i]['id']+"(event)'>" + msg['city'][i]['city'] + "</a> \
						<br> <script> \
						 function pasteoncitytoinput"+msg['city'][i]['id']+"(event){ \
							event.preventDefault(); \
							$('#city').val('"+msg['city'][i]['city']+"');\
							$('#cityid').val('"+msg['city'][i]['id']+"');\
							$('.cityfoundlist').remove(); \
						}</script></span>");
				}

			}
		})
  }


});

function showProfileEditModal(event){
	event.preventDefault();
	$("#profileeditmodal").show();
}

function closemediamodal(event){
  $('#profileeditmodal').hide(500);
}

function updateAboutUser(event){
	event.preventDefault();
	$.ajax({
		type: "POST",
		url:"http://localhost/profile/edit/aboutuser",
		data:{ 
			hometown:$('#hometown').val(),
			city: $('#city').val(),
			hometownid:$('#hometownid').val(),
			cityid: $('#cityid').val(),
			about_user: $('#about_user').val(),
			_token:'{{ Session::token() }}',
		}
	})
	.done(function(msg){
	})
}