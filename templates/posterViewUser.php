<?php
	$list  = Db::findOne('poster',  ['id'=>$_GET['id']]);
	$image = Db::findAll('poster_foto', ['animal_id'=>$list['id']]);
	$animal = Db::findOne('animal', ['id'=>$list['animal_id']]);
	$animal_breed = Db::findOne('animal_breed', ['id'=>$list['breed_id']]);
	
	if($list['is_active']){
		$avtive = "checked='checked'";
		$an_active = "";
	}else{
		$avtive = "";
		$an_active = "checked='checked'";
	}
?>
	<div class="alert alert-danger" id="view_product_message" visibility: hidden >Ваше оголошення видалене</div>
	<div class="view col-md-12"  id="view">
			<div class="title">
				<strong><h3><?=$list['title']?></h3></strong>
			</div>
		<div class="col-md-6" >
			
			<div id="image" >
				<img src="../image/Data/upload/<?=$image[0]["url"]?>" width=100%, height=100%>
			</div>
			<div id="images" >
				<?php foreach($image as $k=>$img):?>
					<img src="../image/Data/upload/<?=$img["url"]?>" width=130px, height=130px>
				<?php endforeach;?>	
			</div>
			
		</div>
			<div class="col-md-6">
				<div>
					<span style="color:#38b0e3">Порода:  </span><?=$animal["title"]?><br/>
					<span style="color:#38b0e3">Вид:     </span><?=$animal_breed["title"]?><br/>
					<span style="color:#38b0e3">Дата:    </span><?=date("d-m-Y",$list["date"])?><br/>
					<span style="color:#38b0e3">Опис:    </span><p><?=$list['description']?></p>
					
				</div>
				
				<div>
				</br>
					<input type="hidden" id="poster_id" value=<?=$_GET['id']?>></input>
					<a href="/animalsAdit?id=<?=$_GET['id']?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Редагувати</button></a>
					<button id ="delete" type="button" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span> Видалити</button></br>
					</br>
				</div>
				<div id="status">
					<legend> Статус </legend>
					
					<input type="radio" name="status" <?=$avtive?>" value="1">
					<label for="1">Знайдено</label>
					<input type="radio" name="status" <?=$an_active?>"  value="0">
					<label for="0">Незнайдено</label></br>
					<button type="button" id="is_active" class="btn btn-warning btn-sm">Зберегти</button>
					
				</div>
			
		 
			</div>		
	</div>


			
	
				
		
				