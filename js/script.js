/* Author:

http://www.elated.com/articles/smooth-rotatable-images-css3-jquery/
http://stackoverflow.com/questions/3438568/jquery-css-rotate-div-by-drag-mouse-event
*/
var App = {
	initDraggable: function() {
		$(".draggable").draggable({
			containment: "#picture-canvas", 
			scroll: false,
			stop: function (event, ui) {
				$('input[name="mustache-x[0]"]').val(ui.position.left);
				$('input[name="mustache-y[0]"]').val(ui.position.top);
			}
		}); 
	},
	initResizable: function() {
		$( ".resizable" ).resizable({
			containment: "#picture-canvas",
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
		//validate first step
		if ($(this).hasClass("step1")){
			var anyChecked = $("input[name=photo]:checked").length > 0;
			if (!anyChecked){
				alert("You've gotta select a photo or else you can't get mustache'd.");
				return false;
			}
		}
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
					FB.Canvas.setSize();
					FB.Canvas.scrollTo(0,200);
				});
			});
		});
		return false;
	});
	
	$("#mustache-selector li img").click
	$("#step-container").on("click", "#mustache-selector li img", function(e){
		var mustache = $(this);
		$(".draggable img, .resizable img").attr("src", mustache.prop("src"));
		
		$(".draggable, .resizable")
			.css("width", "200px")
			.css("height", mustache.attr("data-height"));
		
		var item = $(".draggable img")[0];
		
		$('input[name="mustache-width[0]"]').val(item.width);
		$('input[name="mustache-height[0]"]').val(item.height);
		
		App.initDraggable();
		App.initResizable();
	});
	App.initDraggable();
	App.initResizable();
});






