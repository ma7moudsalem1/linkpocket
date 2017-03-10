$(document).ready(function(){
	$('.carousel').carousel({
		interval: 6000
	});
	// Cashing the scroll top element
	var scrollButton = $("#scroll-top");
	$(window).scroll(function(){
		//console.log( $(this).scrollTop() );
		$(this).scrollTop() >= 700 ? scrollButton.show() : scrollButton.hide();
	});

	//click on button scroll top
		scrollButton.click(function(){
			$("html,body").animate({ scrollTop : 0 }, 600);
		});
})