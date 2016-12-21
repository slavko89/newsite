<?php

class Animal{
	
	public $errors = [];
	
	public static function getInstence()
	{
		return new self;
	}
	
	public function add($formAttribues)
	{
		
		$name 			= $formAttribues['name'];
		$kind_of_animal	= $formAttribues['kind_of_animal'];
		$breed			= $formAttribues['breed'];
		$description	= $formAttribues['description'];
		$adress			= $formAttribues['adress'];
	    
		$generateDir 	= generateDir();
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
		
		$this->errors = $validation->errors;
		
		if (empty($this->errors) || 1){
			
			// 1) Validation images
            // 2) Insert animal
            // 3) insert photos			
			
			
			//
			
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
				 }
				 
				 $this->errors['file'] = $stringError;
			}

			/*
			foreach ($imagesAttrs as $attrs) {
				$path = Uploader::getInstence()->upload($attrs)->upload_path;
				d($errors);
			}
			*/
			
			
		}	
		
		d($this->errors);
		    
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