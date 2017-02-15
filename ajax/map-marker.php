<?php
    include('../config.php');
    include('../class/Db.php');
	include('../class/Animal.php');
	Db::connect();

    
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	if(empty($_POST['checked'])){
		$result = Db::findAll('poster');
	} else {
		$result = Db::findAllOR('poster', ['animal_id' => $_POST['checked']]);
	}
	
		for($i = 0; $i<count($result); $i++){
			$animal = Db::findOne('animal', ['id'=>$result[$i]['animal_id']]);
			$result[$i]['animal_id'] = $animal['title'];
			
			$animal_breed = Db::findOne('animal_breed', ['id'=>$result[$i]['breed_id']]);
			$result[$i]['breed_id'] = $animal_breed['title'];
			
			$image = Db::findOne('poster_foto', ['animal_id'=>$result[$i]['id']]);
			$result[$i]['image'] = $image['url'];
		}
		
		
		print json_encode($result); 
		
	} 
    
?>