<?php 
$errors = isset($errors) ? $errors : [];
?>				
				
	<div id="map-outer" class="col-md-12">
		<?php if (!hasFlash('sucess')):?>
		<div id="adres" class="col-md-5">
				
			<form  enctype="multipart/form-data" class="form-horizontal" id="form-horizontal" method="POST">
				<legend>Додавання тварини</legend>
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
					
						<select name="kind_of_animal_id" id="kind_of_animal_id" class="form-control">
							<option value="">- Виберіть вид тварини -</option>
							<?php foreach (Animal::getList() as $k=>$v):?>
							<option value="<?= $k?>"><?= $v?></option>
							<?php endforeach;?>
						</select>
						<?= form_error('kind_of_animal_id', $errors)?>
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
						<textarea class="form-control" rows="5" id="inputOpys" placeholder="Опис тварини" name="description"></textarea>
						<?= form_error('description', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label for="adress" class="col-sm-4 control-label">Адреса</label>
					<div class = "col-sm-8">
						<input type="textbox" id="adress"  name = "adress"  value="Львів">
						<?= form_error('adress', $errors)?>
						<input id="submit" type="button" value="Geocode">
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
			</form>
				<?php else:?>
				<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
				<?php endif?>	
		</div>
		<div id="map-container" class="col-md-7"></div>
	</div>
				
		
		
