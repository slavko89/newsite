<?php 


class Uploader {
	
	public $name;
	public $type;
	public $tmp_name;
	public $error;
	public $size;
	
	public $errors = [];
	
	public $upload_path;
	
	public static function getInstence()
	{
		return new self;
	}
	
	public function validate($attributes)
	{
		/*
		$this->name	= $_FILES['file']['name'][$i];
		$this->type 	= $_FILES['file']['type'][$i];
		$this->tmp_name = $_FILES['file']['tmp_name'][$i];
		$this->error	= $_FILES['file']['error'][$i];
		$this->size 	= $_FILES['file']['size'][$i];
		*/

		foreach ($attributes as $k=>$v) {
			if (property_exists($this, $k)) {
				$this->{$k} = $v;					
			}				
		}
		
		$this->valid();
	
	    return $this;
	}
	
	function checkSizeFile() 
	{
		if ($this->size <= 1024*1024*2) {
			
			return true;
		} else {
			$this->errors[] = 'Файл "'.$this->name.'" займає більше 2 мбайт';
			return false;
		}
		return;	
	}

	function checkSizeImage() 
	{		
		$image_size = getimagesize($this->tmp_name);
		if ($image_size[0] <= 1024 && $image_size[1] <= 1024){
			return true;
		} else {
			$this->errors[] = 'Розмір файлу "'.$this->name.'" перевищує 1024 х 1024 px ';
			return false;
		}
	}
	

	function checkImageType() 
	{
		if ($this->type == 'image/jpeg' || 'image/psd') {
			
			return true;
		} else {
			$this->errors[] = 'Тип файлу "'.$this->name. '" не є jpg';
			return false;
		}
	}

	function valid() {
		
		if ($this->checkImageType() && $this->checkSizeFile()) {
			return true;
		}else {
			return false;
		}
	}
	
	function upload() {
		
		if ($this->checkImageType() && $this->checkSizeFile()) {
			move_uploaded_file($this->tmp_name, $_SERVER['DOCUMENT_ROOT']."/file/upload/".$_SESSION['generateDir']."/".$this->name);
			return true;
		}else {
			return false;
		}
	}
	
}

