					
<div id="wrapper" class="container">
	<div id="category" class="row">
		<div id="featured" class="col-md-12">
			<div class="row col-md-12" >
				<?php 
					$list  = Posters::getListUser($_SESSION['uid']);
					foreach($list as $v){ 
						$data = Posters::getDataPosters($v);
				?>
				<form  >
					<div class="product col-sm-6 col-md-4 col-lg-3">
						<div class="well">
							<a href="/posterViewUser?id=<?echo $data['poster']['id'];?>"><strong><center><?echo $data['poster']['title'];?></center></strong></a>
							<a href="/posterViewUser?id=<?echo $data['poster']['id']?>"><img src="../image/Data/upload/<?echo $data['image'][0];?>"></a>
							<span style="color:#38b0e3">Порода: </span><?echo $data['animal']['title'];?><br/>
							<span style="color:#38b0e3">Вид: </span><?echo $data['animal_breed']['title'];?><br/>
							<span style="color:#38b0e3">Дата: </span><?echo date("d-m-Y",$data['poster']['date']);?><br/>
							<span style="color:#38b0e3">Статус: </span><span style="color:#cc181e"><?if($data['poster']['is_active']) echo "Знайдено";else echo "Незнайдено";?></span><br/>
						</div>
					</div>
				</form>
				<?php }?>					
			</div>
		</div>
	</div>
</div>
				
				
				
		