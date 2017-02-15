<?php
$status = (isset($_GET['status']) && is_array($_GET['status'])) ? $_GET['status'] :[];
$poster = Db::findAll('poster');
$breedId = [];
foreach($poster as $k => $v){
	$breedId[$k] = $v['breed_id'];
}

$animal = Db::findAll('animal');
$animal_breed = Db::findAllOR('animal_breed', ['id'=>$breedId]);


?>	
<div id="wrapper" class="container">
	<div id="category" class="row">
		<div id="featured" class="col-md-12">	
			<div class="col-md-2"  id="box-content">
			<legend>Фільтер</legend>
				<form id="filtr" method="GET">
					<span style="font-size: 15px; color: #286091;">Вид</span>
					<select id="type" name="animal" class="form-control" onchange="filterMarkerAnimal(this.value, 'animal');">
						<option value="">Всі тварин</option>
					<?php foreach($animal as $k => $v):?>
					
						<option value="<?=  $v['title'] ?>"><?= $v['title'] ?></option>
											
					<?php endforeach ?>
					</select></br>
					
				</form>
				<form id="filtr" method="GET">
					<span style="font-size: 15px; color: #286091;">Порода</span>
					<select id="type" name="animal_breed" class="form-control" onchange="filterMarkerAnimal(this.value, 'animal_breed');">
						<option value="">Всі породи</option>
					<?php foreach($animal_breed as $k => $v):?>
					
						<option value="<?=  $v['title'] ?>"><?= $v['title'] ?></option>
											
					<?php endforeach ?>
					</select></br>
					
				</form>
				<form id="filtr" method="GET">
					<span style="font-size: 15px; color: #286091;">Пошук за радіусом</span>
					<label class="control-label">Радіус (км)</label>
					<input type="text" class="form-control" name="radius" id="radius" >
					<label class="control-label">Локація (адрес)</label>
					<input type="text" class="form-control" name="address" id="address" ></br>
					
					<input type="button" class="btn btn-primary" name="setCircle" id="setCircle" value="Малювати" onclick="filterMarkerCircle(radius.value, address.value);" ></br>
					
					</br>
				</form>
				<form id="filtr" method="GET">
					<span style="font-size: 15px; color: #286091;">Пошук за полігоном</span>
					<legend></legend>
					<input type="button" class="btn btn-primary" name="setDot" id="setDot" value="Малювати"  onclick="drawPoligon();" ></br>		
					</br>
				</form>
				
	
			</div>
		 
	<div id="map-search" class="col-md-10">				
		<div id="map" style="width: 100%; height: 90%;">
			</div>
		 
	</div>
</div>
</div>
</div>	
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
		
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTfKDUH2KkHaXkoOYH5exE_eo-a9v6Sw&signed_in=true&callback=initialize"
        async defer></script>
	<script src="/js/GoogleMapsApi/google_maps_search.js"></script>	