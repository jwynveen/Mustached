/* Author:

http://www.elated.com/articles/smooth-rotatable-images-css3-jquery/
http://stackoverflow.com/questions/3438568/jquery-css-rotate-div-by-drag-mouse-event
*/
var App = {
	hideStep: function(){
		
	},
	showStep: function(content){
		container.html(data);
		container.fadeIn();
	},
	getStepContent: function(url, data) {
		
	}
}

$(function(){
	$("#step-container").on("click", ".next", function(e){
		var url = $(this).prop("href");
		var container = $('#step-container');
		//var width = container.width;
		var data = $('input', container).serialize();
		$.post(url, data, function(data) {
			container.fadeOut(function(){
				container.html(data);
				container.fadeIn();
			});
		});
		return false;
	});
	
	$(".draggable").draggable({
		containment: "#profile-pic", 
		scroll: false,
		stop: function (event, ui) {
			$("input[name=mustache-x]").val(ui.position.left);
			$("input[name=mustache-y]").val(ui.position.top);
		}
	}); 
	$( ".resizable" ).resizable({
		containment: "#profile-pic",
		aspectRatio: true
	});
});






