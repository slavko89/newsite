<?php
	$link = mysql_connect(localhost, mysql , mysql);
	if(!$link){
		die('Ошыбка соединения:'. msql_error());
	}
	$db_selected =mysql_select_db(slavik);
		
	$kind_of_animal_id = intval($_POST['kind_of_animal_id']);
	$row=mysql_query("SELECT id, breed  FROM animal_breed WHERE kind_of_animal_id=$kind_of_animal_id");
	if ($row) {
			$num = mysql_num_rows($row);
			$breeds = array();
		for ($i=0; $i<$num; $i++){
			$animal_breed[$i] = mysql_fetch_row($row);
			}
			$i=0;
			if(is_array($animal_breed)){
				foreach ($animal_breed as $r) {
						
						$breeds[] = array('id'=>$r[0], 'title'=>$r[1]);
						$i++;
				}

			}
		
		$result = array('type'=>'success', 'breeds'=>$breeds); 
		
	} else {
		$result = array('type'=>'error');
	}
		print json_encode($result);	
    
?>