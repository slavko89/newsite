$(document).ready(function () {
	$('#kind_of_animal_id').change(function () {
		alert 'massage';
		var kind_of_animal_id = $(this).val();
		if (kind_of_animal_id == '0') {
			$('#breed_id').html('<option>- выберите город -</option>');
			$('#breed_id').attr('disabled', true);
			return(false);
		}
		$('#breed_id').attr('disabled', true);
		$('#breed_id').html('<option>загрузка...</option>');
		
		var url = '../class/get_regions_mysql.php';
		
		$.get( url,kind_of_animal_id: kind_of_animal_id,function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = '';
					$(result.regions).each(function() {
						options += '<option value="' + $(this).attr('id') + '">' + $(this).attr('title') + '</option>';
					});
					$('#breed_id').html(options);
					$('#breed_id').attr('disabled', false);
				}
			},
			"json"
		);
	});
});
