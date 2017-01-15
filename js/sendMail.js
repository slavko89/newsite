$(document).ready(function() {
		
	$("#send_mail").click(function(event){
			
			var email 	= $("#email").val();
			var phone 	= $("#phone").val();
			var message = $("#message").val();
			var user_email = $("#user_email").val();
			
			if (email == ""){
				$("#semail").html(" *Введіть вашу пошту!</br>");
				event.preventDefault();
			}else if (phone == ""){
				$("#semail").html("");
				$("#sphone").html(" *Введіть номер телефону!</br>");
				event.preventDefault();
			}else if (message == ""){
				$("#sphone").html("");
				$("#smessage").html(" *Введіть ваше повідомлення!</br>");
				event.preventDefault();
			}else {
				$("#semail").html("");
				$("#sphone").html("");
				$("#smessage").html("");
	
				$.ajax({
					url: "/ajax/mail.php", 
					type: "POST",
					data: {email:email,phone:phone,message:message,user_email:user_email}, 
					success: function(data){
						if(data){
							alert("Ваше повідомлення надіслано");
							$("#myModal").modal("hide");
							$("#email").val("");
							$("#phone").val("");
							$("#message").val("");
						}else{
							alert("error");
						}
					}
				});
				
			}
					
	});				
});