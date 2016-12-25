<?php 
    header("Content-Type:text/plain;");
	
	include("../class/Db.php");
	include ('../config.php');
	
	set_time_limit(0);
	
	Db::connect();
	$id_user = ['key'=> 'val'];	
	$result = mysql_query('SELECT * FROM animal_kind_of_animal');
	while($row = mysql_fetch_assoc($result)){
		if($row['id'] == 31) {
			$image_content = file_get_contents('http://murlo.org/uk/category/porody-kotiv');
			$pattern = '/<div class="prewlink">(.*?)<\/div>/';
			preg_match_all($pattern, $image_content, $match_image);
			foreach($match_image as $key => $val){
				foreach($val as $k => $v){
					if($key == 1) {
						Db::insert('animal_breed',[
							'breed'  				=> $v,
							'kind_of_animal_id' 	=> $row['id']
						]);
					
					}
				}
			}
			
		}
		
		/*
		
		foreach($match_image as $key => $val){
			foreach($val as $k => $v){
					Db::update('f_user','', $match_image[2][$k] );
					$link_image = $match_image[4][$k];
					$pattern = '/www\.gravatar\.com\/(.*?)/';
					preg_match($pattern, $link_image, $match_img);
			}
		}*/
	}
?>