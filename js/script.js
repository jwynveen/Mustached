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
		
	},
	initDraggable: function() {
		$(".draggable").draggable({
			containment: "#profile-pic", 
			scroll: false,
			stop: function (event, ui) {
				$('input[name="mustache-x[0]"]').val(ui.position.left);
				$('input[name="mustache-y[0]"]').val(ui.position.top);
			}
		}); 
	},
	initResizable: function() {
		$( ".resizable" ).resizable({
			containment: "#profile-pic",
			aspectRatio: true,
			stop: function(event, ui) {
				$('input[name="mustache-width[0]"]').val(ui.size.width);
				$('input[name="mustache-height[0]"]').val(ui.size.height);
			}
		});
	}
}

$(function(){
	$("#step-container").on("click", ".next", function(e){
		//validate if last step
		if ($(this).hasClass("share")){
			var anyChecked = $("input[type=checkbox]:checked").length > 0;
			if (!anyChecked){
				alert("You've gotta select at least one way to share, otherwise you've gone through this work for nothing.");
				return false;
			}
		}
		
		var url = $(this).prop("href");
		var container = $('#step-container');
		//var width = container.width;
		var data = $('input', container).serialize();
		$.post(url, data, function(data) {
			container.fadeOut(function(){
				container.html(data);
				container.fadeIn(function(){
					App.initDraggable();
					App.initResizable();
				});
			});
		});
		return false;
	});
	
	
	App.initDraggable();
	App.initResizable();
});






