$(document).ready(function() {
		
	$("#is_active").click(function(){
		var is_active = $('#status input:radio:checked').val();
		var id = $("#poster_id").val();
		$.ajax({
				url: "/ajax/change-status.php",
				type: "POST",
				data: {is_active:is_active, id:id},
				success: function(data){
					alert(data);
				}
			
		});
		
		
					
	});				
});