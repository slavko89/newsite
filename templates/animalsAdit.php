<?php 

$list  = Db::findOne('poster',  ['id'=>$_GET['id']]);
$latlng = Db::findOne('coordinates',['id'=>$list['coordinates_id']]);
$errors = isset($errors) ? $errors : [];
?>				
				
	<div id="map-outer" class="col-md-12">
		<?php if (!hasFlash('sucess')):?>
		<div id="adres" class="col-md-5">
				
			<form  enctype="multipart/form-data" class="form-horizontal" id="form-horizontal" method="POST">
				<legend>Додавання тварини</legend>
				<div class="form-group">
					<label for="inputName" class="col-sm-4 control-label">Короткий опис</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" maxlength="32" placeholder="Короткий опис" value="<?=$list['title']?>" name="title">
						<?= form_error('title', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputName" class="col-sm-4 control-label">Ім'я</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputName" placeholder="Ім'я" value="<?=$list['name']?>" name="name">
						<?= form_error('name', $errors)?>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-sm-4 control-label">Вид тварини</label>
					<div class="col-sm-8">
					
						<select name="animal_id" id="animal_id" class="form-control">
							<option value="">- Виберіть вид тварини -</option>
							<?php foreach (Animal::getList() as $k=>$v):?>							
								<option value="<?=$k?>" <?= ($k==$list['animal_id'])?'selected="selected"':''?>><?=$v?></option>
							<?php endforeach?>
						</select>
						<?= form_error('animal_id', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label class="col-sm-4 control-label">Порода</label>
					<div class="col-sm-8">
						<select name="breed_id" id="breed_id" class="form-control">
							<option value="0">- Виберіть породу -</option>
							<?php foreach (Animal::getListBreed($list['animal_id']) as $k=>$v):?>
							<option value="<?= $k?>" <?= ($k==$list['breed_id'])?'selected="selected"':''?>><?= $v?></option>
							<?php endforeach;?>
							
						</select>
						<?= form_error('breed_id', $errors)?>
					</div>
				</div>
								  
				<div class="form-group">
					<label for="inputOpys" class="col-sm-4 control-label">Короткий опис</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="10" id="inputOpys" placeholder="Опис тварини"  name="description"><?=$list['description']?></textarea>
						<?= form_error('description', $errors)?>
					</div>
				</div>
							  
				<div class="form-group">
					<label for="address" class="col-sm-4 control-label">Адреса</label>
					<div class = "col-sm-8">
						<input class="form-control" type="text" id="address"  name = "address"  value="<?=$list['address']?>"">
						<?= form_error('address', $errors)?>
					</div>
				</div>
				
				<div class="form-group">
				<label for="address" class="col-sm-4 control-label"></label>
					<div class = "col-sm-8" >
						<input name="sendForm" type="submit" value="Отправить" class="btn btn-success" >
					</div>
				</div>
			
		</div>
			<div id="map-container" class="col-md-7">
				<label>Виберіть місце де пропала ваша тварина </label>
				<div id="map_adit" style="width: 100%; height: 70%;">
				</div>
				<div>
					
					<input type="button" value="Encode" onclick="codeAddress()">
					</br>
					<label>Широта (latitude): </label></br><input id="latitude" type="text" name="lat" value=<?php echo $latlng['lat']?>/><br/> 
					<label>Длогота (longitude): </label></br><input id="longitude" type="text" name="lng" value=<?php echo $latlng['lng']?>/> 
				</div>

			</div>
		</form>
				<?php else:?>
				<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
				<?php endif?>	
	</div>
				
		
		
