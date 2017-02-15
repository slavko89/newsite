<?php 

$list  = Db::findOne('poster',  ['id'=>$_GET['id']]);
$list_image = Db::findAll('poster_foto',  ['animal_id'=>$_GET['id']]);
$errors = isset($errors) ? $errors : [];
//d($list_image);
?>				
				
	<div id="map-outer" class="col-md-12">
		<?php if (!hasFlash('sucess')):?>
		<div id="adres" class="col-md-12">
			<form  enctype="multipart/form-data" class="form-horizontal" id="form-horizontal" method="POST">
				<legend>Редагування оголошення</legend>
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Короткий опис</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputName" maxlength="32" placeholder="Короткий опис" value="<?=$list['title']?>" name="title">
						<?= form_error('title', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Ім'я</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputName" placeholder="Ім'я" value="<?=$list['name']?>" name="name">
						<?= form_error('name', $errors)?>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-sm-2 control-label">Вид тварини</label>
					<div class="col-sm-5">
					
						<select name="animal_id" id="animal_id" class="form-control">
							<option value="">- Виберіть вид тварини -</option>
							<?php foreach (Animal::getList() as $k=>$v):?>
							
								<option value="<?=$k?>" <?= $list["animal_id"]==$k ? "selected='selected'":""?>><?=$v?></option>
							<?php endforeach?>
						</select>
						<?= form_error('animal_id', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label class="col-sm-2 control-label">Порода</label>
					<div class="col-sm-5">
						<select name="breed_id" id="breed_id"  class="form-control">
							<option value="0">- Виберіть породу -</option>
							<?php foreach(Animal::getListBreed($list["animal_id"]) as $k=>$v):?>
							
							<option value="<?=$k?>" <?= $list["breed_id"]==$k ? "selected='selected'": ""?>><?=$v?></option>
							<?php endforeach ?>
						</select>
						<?= form_error('breed_id', $errors)?>
					</div>
				</div>
								  
				<div class="form-group">
					<label for="inputOpys" class="col-sm-2 control-label">Короткий опис</label>
					<div class="col-sm-5">
						<textarea class="form-control" rows="10" id="inputOpys" placeholder="Опис тварини"  name="description"><?=$list['description']?></textarea>
						<?= form_error('description', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">Адреса</label>
					<div class = "col-sm-5">
						<input class="form-control" type="text" id="address"  name = "address"  value="<?=$list['address']?>">
						<?= form_error('address', $errors)?>
					</div>
				</div>
				
				
				
				<div id="map-container" class="form-group">
					<label for="address" class="col-sm-2 control-label"></label>
					
					<div class = "col-sm-5" id="map_edit" style="width: 60%; height: 100%;">
					
					</div>
					</br>
					<div>
						<input type="hidden" id="latitude"  name="lat" value=<?php echo $list['lat']?>/><br/> 
						<input type="hidden" id="longitude" name="lng" value=<?php echo $list['lng']?>/> 
						
					</div>
					
				</div>
				<hr>
				
				<div id="js-data-deleted-img-id">
					
				</div>
				
				<div class="form-group">
				<label for="images-edit" class="col-sm-2 control-label"></label>
					
					<?php foreach($list_image as $k=>$img):?>
					<div class="col-md-2">
						<div class="image-edit">
							<img src="../image/Data/upload/<?=$img["url"]?>" class="one">
							<a href='#' data-id="<?= $img['id']?>" class="js-remove-uploaded-image"><img src="../image/delete.png" width=15% class="two"></a>
						</div>
					</div>
					<?php endforeach;?>	
					
				</div>
				
				<div class="form-group">
				<label for="address" class="col-sm-2 control-label"></label>
					<div class = "col-sm-5" >
						<input name="sendForm" type="submit" value="Отправить" class="btn btn-success" >
					</div>
				</div>
								
			</form>
		
		</div>
				
		

			
				<?php else:?>
				<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
				<?php endif?>		
		
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTfKDUH2KkHaXkoOYH5exE_eo-a9v6Sw&signed_in=true&callback=initialize"
        async defer></script>
	<script src="/js/GoogleMapsApi/google_maps_edit.js"></script>			
		
		
<script src="/js/JQuery/image-preview-one.js"></script>	
