$(document).ready(function () {
	$('#animal_id').change(function () {
		var animal_id = $(this).val();
		if (animal_id == '0') {
			$('#breed_id').html('<option>- Виберіть тварину -</option>');
			$('#breed_id').attr('disabled', true);
			return(false);
		}
		$('#breed_id').attr('disabled', true);
		//$('#breed_id').html('<option>загрузка...</option>');
		
		var url = '/ajax/get-breed-mysql.php';
		
		$.post(url, {animal_id: animal_id},function (result) {
								
					$('#breed_id').children().not(":first").remove();
					$.each(result.breeds, function(k, v) {
						$('#breed_id').append('<option value="' + k + '">' + v + '</option>');
					})
					
					$('#breed_id').attr('disabled', false);
				
			},
			"json"
		);
	});
});
