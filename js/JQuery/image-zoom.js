$(document).ready(function() { // Ждём загрузки страницы
	
	$(".images, .image").click(function(){	
	  	var img = $(this);
		var src = img.attr('src');
		$("body").append("<div class='popup'>"+ 
						 "<div class='popup_bg'></div>"+ 
						 "<img src='"+src+"' class='popup_img' />"+ 
						 "</div>"); 
		$(".popup").fadeIn(300); 
		$(".popup_bg").click(function(){   
			$(".popup").fadeOut(300);
			setTimeout(function() {
			  $(".popup").remove(); 
			}, 300);
		});
	});
	
});