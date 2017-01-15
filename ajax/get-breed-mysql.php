<?php
    include('../config.php');
    include('../class/Db.php');
	include('../class/Animal.php');
	Db::connect();
		
	$animal_id = intval($_POST['animal_id']);
    
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	    
        $result = array('type'=>'success', 'breeds'=>[]);
		
		foreach (Animal::getListBreed($animal_id) as $k=>$v) {
			$result['breeds'][$k] = $v;
		}
			
		print json_encode($result); 
		
	} 
    
?>