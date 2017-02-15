<?php
	include('../class/Db.php');
	include('../config.php');
	Db::connect();
	$poster_id = intval($_POST['poster_id']);
	$name_dir = Db::findOne('poster_foto', ['animal_id'=>$poster_id]);
	$poster_foto = Db::delete('poster_foto', ['animal_id'=>$poster_id]);
	$poster = Db::delete('poster', ['id'=>$poster_id]);
	
	$rest = substr($name_dir['url'], 0, 4);
	
	if (file_exists('../image/Data/upload/'.$rest)){
		foreach (glob('../image/Data/upload/'.$rest.'/*') as $file){
			unlink($file);
		}
		
	}
		
	$delete_dir = rmdir("../image/Data/upload/".$rest);
	
	if($poster_foto && $poster && $delete_dir){
		echo "success";
	}else{
		echo "error";
	}
	

?>