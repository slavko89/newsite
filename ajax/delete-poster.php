<?php
	include('../class/Db.php');
	include('../config.php');
	Db::connect();
	$poster_id = intval($_POST['poster_id']);
	$poster_foto = Db::delete('poster_foto', ['animal_id'=>$poster_id]);
	$poster = Db::delete('poster', ['id'=>$poster_id]);
	
	
	
	if($poster_foto && $poster){
		echo "success";
	}else{
		echo $poster_foto;
	}
	

?>