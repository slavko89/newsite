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
		$title 				= $formAttribues['title'];
		$name 				= $formAttribues['name'];
		$animal_id			= $formAttribues['animal_id'];
		$breed_id			= $formAttribues['breed_id'];
		$description		= $formAttribues['description'];
		$address			= $formAttribues['address'];
		$lat				= $formAttribues['lat'];
		$lng				= $formAttribues['lng'];
	   
	
		$attributes = [
			'title'					=> $title,
			'name'					=> $name,
			'animal_id'				=> $animal_id,
			'breed_id' 				=> $breed_id,
			'description'			=> $description,
			'address' 				=> $address
			
		];
		
		$rules = [
			[['title','name', 'animal_id', 'breed_id','description', 'address'], 'required'],
			
			
		];
		
		$path = generateDir(4);	
		$validation = new Validation;
		$validation->check($attributes, $rules);
		$this->errors = $validation->errors;
		
		if (empty($this->errors)){
			// 1) Validation images
            // 2) Insert animal
            // 3) insert photos	
			
			
			
			if($_FILES[0]['name'] != ""){
							
				foreach ($_FILES as $attrs) {
					
					$errors = Uploader::getInstence()->validate($attrs)->errors;
					if (!empty($errors)) {
						$stringError = $stringError.$errors[0]."\n";
					}
				}
				$this->errors['file'] = $stringError;
			}else{
				$this->errors['file'] = "Додайте хоча б одну фотографію";
				
			}		
			
			
			if(empty($this->errors['file'])){
			
					$poster = Db::insert('poster', [
						'title'			=> $title,
						'name'			=> $name,
						'animal_id'		=> $animal_id,
						'breed_id' 		=> $breed_id,
						'description'	=> $description,
						'address' 		=> $address,
						'date'			=> time(),
						'user_id'		=> $_SESSION['uid'],
						'lat'			=> $lat,
						'lng'			=> $lng
					]);
								
					$row = Db::findOne('poster', [
						'name'			=> $name,
						'animal_id'		=> $animal_id,
						'breed_id' 		=> $breed_id,
						'description'	=> $description,
						'address' 		=> $address,
					]);
				
				foreach ($_FILES as $attrs) {
					if($attrs['error'] == 0){
						Uploader::getInstence()->upload($attrs,$path);
						Db::insert('poster_foto', [
							'url'			=> $path.'/'.$attrs['name'],
							'animal_id'		=> $row['id']
				
						]);
					}
				}
				setFlash('sucess', 'Ваше оголошення успішно додано!');
				return $this;
			}
		}	
    
		return $this;
	}
	
    
	
	public function update($formAttribues)
	{
		$title 				= $formAttribues['title'];
		$name 				= $formAttribues['name'];
		$animal_id			= $formAttribues['animal_id'];
		$breed_id			= $formAttribues['breed_id'];
		$description		= $formAttribues['description'];
		$address			= $formAttribues['address'];
		$lat				= $formAttribues['lat'];
		$lng				= $formAttribues['lng'];
	    
	
		$attributes = [
			'title'					=> $title,
			'name'					=> $name,
			'animal_id'				=> $animal_id,
			'breed_id' 				=> $breed_id,
			'description'			=> $description,
			'address' 				=> $address
			
		];
		
		$rules = [
			[['title','name', 'animal_id', 'breed_id','description', 'address'], 'required'],
			
			
		];
		
		$validation = new Validation;
		$validation->check($attributes, $rules);
		$this->errors = $validation->errors;
			if(empty($this->errors)){
				$rows = Db::findOne('poster', ['id' => $_GET['id']]);
			
				$row = Db::update('poster', [
						'title'					=> $title,
						'name'					=> $name,
						'animal_id'				=> $animal_id,
						'breed_id' 				=> $breed_id,
						'description'			=> $description,
						'address' 				=> $address,
						'lat'					=> $lat,
						'lng'					=> $lng
						
					],$_GET['id']);
					
				setFlash('sucess', 'Дані успішно відредаговані');
				return $this;
			}

		return $this;
	}
	public static function getList()
	{
		$list = [];
        $result = mysql_query("SELECT `id`, `title` FROM `animal`");
        
		$row = mysql_fetch_assoc($result);
		do{
			$list[$row['id']] = $row['title']; 
		} while($row = mysql_fetch_assoc($result));
		
        return $list;		
    }
	
	public static function getListBreed($animalId)
	{
		$list = [];
        $result = Db::findAll('animal_breed',  ['animal_id'=>$animalId]);
          
		foreach ($result as $item) {
		    $list[$item['id']] = $item['title'];	
		}  

        return $list;		
    }
}


	

?>