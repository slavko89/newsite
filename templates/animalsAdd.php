<?php 
$errors = isset($errors) ? $errors : [];
?>				
				
	<div id="map-outer" class="col-md-12">
		<?php if (!hasFlash('sucess')):?>
		<form  enctype="multipart/form-data" class="form-horizontal" id="form-horizontal" method="POST">
			<div id="adres" class="col-md-5">
				<legend>Додавання тварини</legend>
				<div class="form-group">
					<label for="inputName" class="col-sm-4 control-label">Короткий опис</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" maxlength="32" placeholder="Короткий опис" name="title">
						<?= form_error('title', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputName" class="col-sm-4 control-label">Ім'я</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" placeholder="Ім'я" name="name">
						<?= form_error('name', $errors)?>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-sm-4 control-label">Вид тварини</label>
					<div class="col-sm-8">
					
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
					<label class="col-sm-4 control-label">Порода</label>
					<div class="col-sm-8">
						<select name="breed_id" id="breed_id" disabled="disabled" class="form-control">
							<option value="0">- Виберіть породу -</option>
						</select>
						<?= form_error('breed_id', $errors)?>
					</div>
				</div>
								  
				<div class="form-group">
					<label for="inputOpys" class="col-sm-4 control-label">Короткий опис</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="10" id="inputOpys" placeholder="Опис тварини" name="description"></textarea>
						<?= form_error('description', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label for="address" class="col-sm-4 control-label">Адреса</label>
					<div class = "col-sm-8">
						<input class="form-control" id="address" type="text" name="address">
						<?= form_error('address', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="files" class="col-sm-4 control-label">Фото</label>
					<div class = "col-sm-8">
						<input name="file[]" type="file" id="files" multiple="multiple"><br/>
						<?= form_error('file', $errors)?>
						<input name="sendForm" type="submit" value="Отправить" class="btn btn-success"  id="files">
					</div>
				</div>
			
			</div>
			
			<div id="map-container" class="col-md-7">
				<label>Виберіть місце де пропала ваша тварина </label>
				<div id="map_add" style="width: 100%; height: 70%;">
				</div>
				<div>
					
					<input type="button" value="Encode" onclick="codeAddress()">
					</br>
					<label>Широта (latitude): </label></br><input id="latitude" type="text" name="lat" /><br/> 
					<label>Довгота (longitude): </label></br><input id="longitude" type="text" name="lng"/> 
				</div>
			</div>
		</form>
		<?php else:?>
			<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
		<?php endif?>
	</div>
				
		
		
