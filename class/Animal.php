<?php

class Animal{
	
	public static function addAnimal($formAttribues)
	{
		
		unset($_SESSION['errors']);
		unset($_SESSION['generateDir']);
	
		
		
		$name 			= $formAttribues['name'];
		$kind_of_animal	= $formAttribues['kind_of_animal'];
		$breed			= $formAttribues['breed'];
		$description	= $formAttribues['description'];
		$adress			= $formAttribues['adress'];
	    
		$_SESSION['generateDir'] 	= generateDir();
		$tmp_images;
		$attributes = [
			'name'			=> $name,
			'kind_of_animal'=> $kind_of_animal,
			'breed' 		=> $breed,
			'description'	=> $description,
			'adress' 		=> $adress
			
		];
		$rules = [
			[['name', 'kind_of_animal', 'breed','description', 'adress'], 'required'],
		];
		
		
			
		$validation = new Validation;
		$validation->check($attributes, $rules);
		
		print('<pre>');		
		print_r($_FILES);		
		print('</pre>');		
		die();		
		
		if (empty($validation->errors)){
			if($_FILES['file']['name'][0] != 0) mkdir($_SERVER['DOCUMENT_ROOT']."/file/upload/".$_SESSION['generateDir']);
				for($i = 0; $i<count($_FILES['file']['name']); $i++){
					$uploader = new Uploader($i);
					$tmp_images[$i] = $uploader->name;
				}
				if (empty($_SESSION['errors'])){
					$row = Db::insert('addanimals', [
						'name'			=> $name,
						'kind_of_animal'=> $kind_of_animal,
						'breed' 		=> $breed,
						'description'	=> $description,
						'adress' 		=> $adress,
						'date'			=> time(),
						'id_user'		=> $_SESSION['uid']
					]);
					
					$rows = db::findOne('addanimals', [
						'name'			=> $name,
						'kind_of_animal'=> $kind_of_animal,
						'breed' 		=> $breed,
						'description'	=> $description,
						'adress' 		=> $adress,
					]);
					
					foreach($tmp_images as $k => $v){
						Db::insert('foto_animals', [
						'url'			=> "../file/upload/".$_SESSION['generateDir']."/".$v,
						'id_animal'		=> $rows['id']
			
					]);
					}
								
					setFlash('sucess', 'Тварина добавлена на карту!!!');
					return true;
				}
				return false;
		}	
		$_SESSION['errors'] = $validation->errors;
		return false;
		
	}
	
}
?>