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
	<div class="alert alert-danger" id="view_poster_message" visibility: hidden >Ваше оголошення видалене</div>
	<div class="view col-md-12"  id="view_poster">
			<div class="title">
				<strong><h3><?=$list['title']?></h3></strong>
			</div>
		<div class="col-md-6" >
			<div class="gallery-box">
				<div class="view">
					<div class="big-image"><img src="../image/Data/upload/<?=$image[0]["url"]?>" alt="image11"></div>
					<a href="#" class="prev"></a>
					<a href="#" class="next"></a>
				</div>
				
					<div class="thumbnails">
						<?php for($i = 0; $i<count($image); $i++):?>
						<div class = "thumbnails-box">
							<?php if($i == 0):?>
								<a href="#" class="active"><img src="../image/Data/upload/<?=$image[$i]["url"]?>" alt="image12"></a>
							<?else:?>
								<a href="#" ><img src="../image/Data/upload/<?=$image[$i]["url"]?>" alt="image12"></a>
							<?endif?>
						</div>
						<?php endfor?>	
					</div>
				
			</div>
				
		</div>
			<div class="col-md-6">
				<div>
					<span style="color:#38b0e3">Порода:  </span><?=$animal["title"]?><br/>
					<span style="color:#38b0e3">Вид:     </span><?=$animal_breed["title"]?><br/>
					<span style="color:#38b0e3">Дата:    </span><?=date("d-m-Y",$list["date"])?><br/>
					<span style="color:#38b0e3">Адреса:  </span><?=$list['address']?><br/>
					<span style="color:#38b0e3">Опис:    </span><p><?=$list['description']?></p>
					
				</div>
				
				<div>
				</br>
					<input type="hidden" id="poster_id" value=<?=$_GET['id']?>></input>
					<a href="/animalsEdit?id=<?=$_GET['id']?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Редагувати</button></a>
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
	
	<script src="/js/JQuery/gallery.js"></script>

			
	
				
		
				