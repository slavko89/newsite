<?php
	$list 			= Db::findOne('poster',  ['id'=>$_GET['id']]);
	$image			= Db::findAll('poster_foto', ['animal_id'=>$list['id']]);
	$animal 		= Db::findOne('animal', ['id'=>$list['animal_id']]);
	$animal_breed 	= Db::findOne('animal_breed', ['id'=>$list['breed_id']]);
	$user 			= Db::findOne('user', ['id'=>$_GET['user_id']]);
	
?>
	<div class="view col-md-12" id="view_poster">
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
					<?php if($i == 0):?>
						<a href="#" class="active"><img src="../image/Data/upload/<?=$image[$i]["url"]?>" alt="image12"></a>
					<?else:?>
						<a href="#" ><img src="../image/Data/upload/<?=$image[$i]["url"]?>" alt="image12"></a>
					<?endif?>
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
				<span style="color:#38b0e3">Опис:    </span><p><?=$list['description']?></p><br/>
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Зворотній зв'язок</button>
				
			</div>
			
			

			<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1"  aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" id="close" class="close" data-dismiss="modal" >&times;</button>
							<h4 class="modal-title" id="myModalLabel">Форма зворотнього зв'язку</h4>
						</div>
						<div class="modal-body">
						
								<label for="email" class="col-md-3 control-label">Email</label>
								<input type="hidden" id="user_email"  name="user_email" value="<?php echo $user['email']?>">
								<input type="email" class="form-control" id="email" placeholder="Email" name="email">
								<span style="color:red" id="semail"></span>
								
								<label for="phone" class="col-sm-3 control-label">Телефон</label>
								<input type="text" class="form-control" id="phone" placeholder="Телефон" name="phone">
								<span style="color:red" id="sphone"></span>
												
								<label for="message" class="col-sm-3 control-label">Повідомлення</label>
								<textarea rows="5" cols ="40" class="form-control" name="message" id="message"></textarea>
								<span style="color:red" id="smessage"></span>
							
						</div>
						<div class="modal-footer">
							<button  type="button" id="send_mail" class="btn btn-default" >Відправити</button>
						</div>
					</div>
				</div>
			</div>
			
			<div id="poster" class="col-md-12">
				</br>
				<div id="map_poster" style="width: 100%; height: 90%;">
				</div>
				<div>
								
					</br>
					<input type="hidden" id="latitude"  name="lat" value=<?php echo $list['lat']?>><br/> 
					<input type="hidden" id="longitude"  name="lng" value=<?php echo $list['lng']?>> 
					<input type="hidden" id="title"  name="title" value=<?php echo $list['title']?>> 
					
				</div>

			</div>
			
		</div>
		
			
		</div>
	</div>
			
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTfKDUH2KkHaXkoOYH5exE_eo-a9v6Sw&signed_in=true&callback=initialize"
        async defer></script>
	<script src="/js/GoogleMapsApi/google_maps_poster.js"></script>		
	<script src="/js/JQuery/gallery.js"></script>		
	
	
		
				