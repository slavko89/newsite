$(document).ready(function () {
	$('#kind_of_animal_id').change(function () {
		var kind_of_animal_id = $(this).val();
		if (kind_of_animal_id == '0') {
			$('#breed_id').html('<option>- выберите город -</option>');
			$('#breed_id').attr('disabled', true);
			return(false);
		}
		$('#breed_id').attr('disabled', true);
		//$('#breed_id').html('<option>загрузка...</option>');
		
		var url = '/ajax/get_regions_mysql.php';
		
		$.post(url, {kind_of_animal_id: kind_of_animal_id},function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					//$('#breed_id option').remove();
					//$('#breed_id').append('<option value="">- Виберіть породу -</option>');
					
					$('#breed_id').children().not(":first").remove();
					
					$.each(result.breeds, function(k, v) {
						$('#breed_id').append('<option value="' + k + '">' + v + '</option>');
					})
					
					$('#breed_id').attr('disabled', false);
				}
			},
			"json"
		);
	});
});
