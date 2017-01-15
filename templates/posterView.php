<?php
	$list 			= Db::findOne('poster',  ['id'=>$_GET['id']]);
	$image			= Db::findAll('poster_foto', ['animal_id'=>$list['id']]);
	$animal 		= Db::findOne('animal', ['id'=>$list['animal_id']]);
	$animal_breed 	= Db::findOne('animal_breed', ['id'=>$list['breed_id']]);
	$user 			= Db::findOne('user', ['id'=>$_GET['user_id']]);
	
?>
	<div class="view col-md-12" id="view">
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
				<span style="color:#38b0e3">Опис:    </span><p><?=$list['description']?></p><br/>
				<br/>
			</div>
			
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Зворотній зв'язок</button>

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
				
			
		</div>
	</div>
			
	
				
		
				