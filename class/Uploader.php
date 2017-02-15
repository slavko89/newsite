<?php 


class Uploader {
	
	const UPLOAD_PATH = "/image/data/upload/";
	
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
		if ($this->size <= 1024*300) {
			return true;
		} else {
			$this->errors[] = "Файл '".$this->name."' займає більше 300 кбайт </br>";
			return false;
		}
	}

	function checkImageType() 
	{
		if ($this->type == 'image/jpeg' || 'image/psd' || 'image/png' || 'image/jpg') {
			return true;
		} else {
			$this->errors[] = 'Тип файлу "'.$this->name. '" не є картинка </br>';
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
	
	function upload($attrs,$path) {
		if(!file_exists($_SERVER['DOCUMENT_ROOT']."/image/data/upload/".$path)){
			mkdir($_SERVER['DOCUMENT_ROOT']."/image/data/upload/".$path);
		} 
		move_uploaded_file($attrs['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/image/data/upload/".$path."/".$attrs['name']);
		return $this;
	}

	
}

