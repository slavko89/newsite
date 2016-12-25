<?php
header('Content-Type: text/html; charset=utf-8');
class Animal{
	
	public $errors = [];
	
	public static function getInstence()
	{
		return new self;
	}
	
	public function add($formAttribues)
	{
		$name 				= $formAttribues['name'];
		$kind_of_animal_id	= $formAttribues['kind_of_animal_id'];
		$breed_id			= $formAttribues['breed_id'];
		$description		= $formAttribues['description'];
		$adress				= $formAttribues['adress'];
	    
	
		$attributes = [
			'name'					=> $name,
			'kind_of_animal_id'		=> $kind_of_animal_id,
			'breed_id' 				=> $breed_id,
			'description'			=> $description,
			'adress' 				=> $adress
			
		];
		
		$rules = [
			[['name', 'kind_of_animal_id', 'breed_id','description', 'adress'], 'required'],
		];
		
		$path = generateDir(4);	
		$validation = new Validation;
		$validation->check($attributes, $rules);
		$this->errors = $validation->errors;
		
		if (empty($this->errors)){
			// 1) Validation images
            // 2) Insert animal
            // 3) insert photos			
			$imagesAttrs = [];
			foreach ($_FILES['file'] as $file_attr => $attr_values) {
				foreach ($attr_values as $num_img => $val) {
					$imagesAttrs[$num_img][$file_attr] = $val;
				}
			}
			
			foreach ($imagesAttrs as $attrs) {
				$errors = Uploader::getInstence()->validate($attrs)->errors;
				if (!empty($errors)) {
				    $this->errors['file'][] = $errors;
					$stringError = $stringError.$errors[0]."\n";
				}
			}
			
			$this->errors['file'] = $stringError;
			
			if(empty($this->errors['file']) && $_FILES['file']['error'][0] == 0){
				$row = Db::insert('animal', [
						'name'					=> $name,
						'kind_of_animal_id'		=> $kind_of_animal_id,
						'breed_id' 				=> $breed_id,
						'description'			=> $description,
						'adress' 				=> $adress,
						'date'					=> time(),
						'id_user'				=> $_SESSION['uid']
					]);
								
					$rows = Db::findOne('animal', [
						'name'				=> $name,
						'kind_of_animal_id'	=> $kind_of_animal_id,
						'breed_id' 			=> $breed_id,
						'description'		=> $description,
						'adress' 			=> $adress,
					]);
				
				foreach ($imagesAttrs as $attrs) {
					Uploader::getInstence()->upload($attrs,$path);
					Db::insert('animal_foto', [
						'url'			=> $path.'/'.$attrs['name'],
						'id_animal'		=> $rows['id']
			
					]);
				}
				setFlash('sucess', 'Тварина добавлена на карту!!!');
				return $this;
			}
				
			
			
			
			
			
		}	
		
		    
		return $this;
	}
	

}


/*
			if($_FILES['file']['name'][0] != 0) mkdir($_SERVER['DOCUMENT_ROOT']."/file/upload/".$generateDir);
				for($i = 0; $i<count($_FILES['file']['name']); $i++){
					$uploader = new Uploader($i);
					$tmp_images[$i] = $uploader->name;
				}
				if (empty($_SESSION['errors'])){
					$row = Db::insert('addanimals', [
						'name'			=> $name,
						'kind_of_animal_id'=> $kind_of_animal_id,
						'breed_id' 		=> $breed_id,
						'description'	=> $description,
						'adress' 		=> $adress,
						'date'			=> time(),
						'id_user'		=> $_SESSION['uid']
					]);
					
					$rows = db::findOne('addanimals', [
						'name'			=> $name,
						'kind_of_animal_id'=> $kind_of_animal_id,
						'breed_id' 		=> $breed_id,
						'description'	=> $description,
						'adress' 		=> $adress,
					]);
					
					foreach($tmp_images as $k => $v){
						Db::insert('foto_animals', [
						'url'			=> "../file/upload/".$generateDir."/".$v,
						'id_animal'		=> $rows['id']
			
					]);
					}
								
					setFlash('sucess', 'Тварина добавлена на карту!!!');
					return true;
				}
				return false;

*/

?>