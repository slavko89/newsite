<?php
$status = (isset($_GET['status']) && is_array($_GET['status'])) ? $_GET['status'] :[];
$animal = Db::findAll('animal');

?>				
<div id="wrapper" class="container">
	<div id="category" class="row">
		<div id="featured" class="col-md-12">
			<div class="col-md-2"  id="box-content">
			<legend>Фільтер</legend>
				<form id="filtr" method="GET">
					<span style="font-size: 20px; color: #286091;">Статус</span>
					<legend></legend>
					<label><input type="checkbox" name="status[]" value="1" <?= in_array("1", $status) ? 'checked="checked"': "" ?>>Знайдені</label></br>
					<label><input type="checkbox" name="status[]" value="0" <?= in_array("0", $status) ? 'checked="checked"': "" ?>>Незнайдені</label></br>
					<input type="submit" id="search" value="Пошук" class="btn btn-primary btn-sm"></br>
					</br>
				</form>
				<form id="filtr" method="GET">
					<span style="font-size: 20px; color: #286091;">Вид</span>
					<legend></legend>
					<?php foreach($animal as $k => $v):?>
					<label><input type="checkbox" name="status[]" value="<?=$v['id']?>" <?= in_array($v['id'], $status) ? 'checked="checked"': "" ?>><?=$v['title']?></label></br>
					<?php endforeach ?>
					
					<input type="submit" id="search" value="Пошук" class="btn btn-primary btn-sm"></br>
					</br>
				</form>
	
			</div>
			<div class="row col-md-10" >
				<?php 
				
					$list  = Posters::getList($_GET['status']);
					if(!empty($list[0])){
						foreach($list as $v){ 
							$data = Posters::getDataPosters($v);
							
				?>
				<form  >
					<div class="product col-sm-6 col-md-4 col-lg-4">
						<div class="well">
							<a href="/posterView?id=<?echo $data['poster']['id'];?>&user_id=<?echo $data['poster']['user_id'];?>"><strong><center><?echo $data['poster']['title'];?></center></strong></a>
							<a href="/posterView?id=<?echo $data['poster']['id']?>&user_id=<?echo $data['poster']['user_id'];?>"><img src="../image/Data/upload/<?echo $data['image'][0];?>"></a>
							<span style="color:#38b0e3">Порода: </span><?echo $data['animal']['title'];?><br/>
							<span style="color:#38b0e3">Вид: </span><?echo $data['animal_breed']['title'];?><br/>
							<span style="color:#38b0e3">Дата: </span><?echo date("d-m-Y",$data['poster']['date']);?><br/>
							<span style="color:#38b0e3">Статус: </span><span style="color:#cc181e"><?if($data['poster']['is_active']) echo "Знайдено";else echo "Незнайдено";?></span><br/>
						</div>
					</div>
				</form>
				<?php }}?>					
			</div>
		</div>
	</div>
</div>
				
				
				
		