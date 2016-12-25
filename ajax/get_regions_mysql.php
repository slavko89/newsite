<?php
    include('../config.php');
    include('../class/Db.php');
	include('../class/Animal.php');
	Db::connect();
		
	$kind_of_animal_id = intval($_POST['kind_of_animal_id']);
    
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	    
        $result = array('type'=>'success', 'breeds'=>[]);
		
		foreach (Animal::getListBreed($kind_of_animal_id) as $k=>$v) {
			$result['breeds'][$k] = $v;
		}
			
		print json_encode($result); 
		
	} 
    
?>