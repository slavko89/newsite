<?php

class Upload{

	public static function load_files(){
	if(isset($_FILES['load']['name'][0])){
		for($i = 0; $i<3 ; $i++){
			if(isset($_FILES['load']['name'][$i])){
				if($_FILES['load']['error'][$i] == 0){
					if(	($_FILES['load']['type'][$i] == "image/jpg") ||
						($_FILES['load']['type'][$i] == "image/jpeg")||
						($_FILES['load']['type'][$i]== "image/gif") ||
						($_FILES['load']['type'][$i] == "image/png") ||
						($_FILES['load']['type'][$i] == "image/bmp")){
						if($_FILES['load']['size'][$i] <= 1024*1024){
							if(is_uploaded_file($_FILES['load']['tmp_name'][$i])){
								move_uploaded_file($_FILES['load']['tmp_name'][$i],'image/'.$_FILES['load']['name'][$i]);
								echo "Файл ".($i+1)." Загружений"."</br>";
							}else {echo "Файл не загружено в tmp";}
						}else {echo "Файл займає більше 1 мб";}
					}else {echo "Неправильний тип файлу";}
				}else  {echo "Помилки при завантаженні файлу";	}
			}else  {echo "Файл неіснує";}
		}
	}
											
		
	
	}
	
		
	
	
}

?>