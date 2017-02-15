<?php 
$errors = isset($errors) ? $errors : [];
?>				
				
	<div  id="map-outer" class="col-md-12">
		<?php if (!hasFlash('sucess')):?>
		<form  enctype="multipart/form-data" class="form-horizontal" id="form-horizontal" method="POST">
			<div id="adres" class="col-md-12">
				<legend>Додавання оголошення</legend>
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Короткий опис</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputName" maxlength="32" placeholder="Короткий опис" name="title">
						<?= form_error('title', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Ім'я</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputName" placeholder="Ім'я" name="name">
						<?= form_error('name', $errors)?>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-sm-2 control-label">Вид тварини</label>
					<div class="col-sm-5">
					
						<select name="animal_id" id="animal_id" class="form-control">
							<option value="">- Виберіть вид тварини -</option>
							<?php foreach (Animal::getList() as $k=>$v):?>
							<option value="<?= $k?>"><?= $v?></option>
							<?php endforeach;?>
						</select>
						<?= form_error('animal_id', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label class="col-sm-2 control-label">Порода</label>
					<div class="col-sm-5">
						<select name="breed_id" id="breed_id" disabled="disabled" class="form-control">
							<option value="0">- Виберіть породу -</option>
						</select>
						<?= form_error('breed_id', $errors)?>
					</div>
				</div>
								  
				<div class="form-group">
					<label for="inputOpys" class="col-sm-2 control-label">Короткий опис</label>
					<div class="col-sm-5">
						<textarea class="form-control" rows="10" id="inputOpys" placeholder="Опис тварини" name="description"></textarea>
						<?= form_error('description', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">Адреса</label>
					<div class = "col-sm-5">
						<input class="form-control" placeholder="Виберіть на карті місце де пропала ваша тварина" id="address" type="text" name="address">
						<?= form_error('address', $errors)?>
					</div>
				</div>

				<div id="map-container" class="form-group">
					<label  class="col-sm-2 control-label"></label>
					
					<div id="map_add" style="width: 70%; height: 90%;">
					
					</div>
					</br>
					<div>
						<input type="hidden" id="latitude"  name="lat" value=<?php echo $list['lat']?>/><br/> 
						<input type="hidden" id="longitude" name="lng" value=<?php echo $list['lng']?>/> 
						
					</div>
					
				</div>

				<div class="form-group " id="images-preview">
					<label class="col-sm-2 control-label">Додайте фотографії (Максимум 5 фото)</label>
					<hr>
					<div id="image-preview">
							<input type="button" class="btn btn-danger" id="preview-foto" value="X">
							<div id="box-preview1" class="active">
									<img src="../image/upload-image.png">
									<input type="file" name="0" > 
							</div>
							
						<input type="button" class="btn btn-danger" id="preview-foto" value="X">
						<div id="box-preview1" style="display:none;">
								<img src="../image/upload-image.png">
								<input type="file" name="1" >
						</div>
						<input type="button" class="btn btn-danger" id="preview-foto" value="X">
						<div id="box-preview1" style="display:none;">
								<img src="../image/upload-image.png">
								<input type="file" name="2" >
						</div>
						<input type="button" class="btn btn-danger" id="preview-foto" value="X">
						<div id="box-preview1" style="display:none;">
								<img src="../image/upload-image.png">
								<input type="file" name="3" >
						</div>
						<input type="button" class="btn btn-danger" id="preview-foto" value="X">
						<div id="box-preview1" style="display:none;">
								<img src="../image/upload-image.png">
								<input type="file" name="4">
						</div>
						
						
					</div>
				</div></br>
				
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class = "col-sm-5">
						<input name="sendForm" type="submit" value="Отправить" class="btn btn-success"  id="files">
					</div>
				</div>
				
			
			</div>
			
			
		</form>
		<?php else:?>
			<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
		<?php endif?>
	</div>
			
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTfKDUH2KkHaXkoOYH5exE_eo-a9v6Sw&signed_in=true&callback=initialize"
        async defer></script>
<script src="/js/GoogleMapsApi/google_maps_add.js"></script>	
<script src="/js/JQuery/image-preview.js"></script>	
<script src="/js/JQuery/image-preview-one.js"></script>	



		
