$(document).ready(function(){
	
	$("#delete").click(function(){
		var result = confirm("Ви дійсно хочете видалити ваше оголошення?");
		if(result){
			$.ajax({
				url:"/ajax/delete-poster.php",
				type:"POST",
				data: {poster_id:$("#poster_id").val()},
				success: function(data){
					if(data == "success"){
						$("#view_product").hide();
						$("#view_product_message").show();
					}else{
						alert (data);
					}
				}
				
			});
		}else{
			alert("Ваше оголошення далі активне");
		};
		
	});
});