<?php 


class User {
	
	public $errors = [];
	
	public static function getInstence()
	{
		
		return new self;
	}
	function login($email, $password)
	{
				
		$attributes = [
			'email' 	=> $email,
			'password' 	=> $password,
		];	

		$rules = [
			[['email', 'password'], 'required'],
			[['email'], 'email'],
			[['password'], 'type', 'type'=>'string', 'min'=>4, 'max'=>32],	
		];

		$validation = new Validation;
		$validation->check($attributes, $rules);
		
		if (empty($validation->errors)) {
			$row = Db::findOne('user', [
				'email'		=> $email, 
				'password'	=> md5($password)
			]);
			
			if (!empty($row)) {
				
				$_SESSION['uid'] = $row['id'];
				setFlash('sucess', 'Вітаємо вас на сайті');
				
				return true;
			
			} else {
				$validation->errors['email'] = 'Такий користувача в БД не знайдено!';
			}
			
		} 
		
		$this->errors = $validation->errors;
	
		
		return $this;
	}
	
	function registration($formAttribues)
	{
				
		$email 				= $formAttribues['email'];
		$password 			= $formAttribues['password'];
		$name 				= $formAttribues['name'];
		$numberPhone		= $formAttribues['numberPhone'];
		$password_compare 	= $formAttribues['password_compare'];
		$username 	        = $formAttribues['username'];
					
		$attributes = [
			'name'				=> $name,
			'email' 			=> $email,
			'password' 			=> $password,
			'numberPhone'		=> $numberPhone,
			'password_compare' 	=> $password_compare,
			'username' 			=> $username
		];	
		
		$rules = [
			[['email', 'password', 'name','numberPhone', 'password_compare', 'username'], 'required'],
			[['name'], 'type', 'type'=>'string', 'min'=>6, 'max'=>32],
			[['email'], 'email'],
			[['numberPhone'], 'numberPhone'],
			[['password'], 'type', 'type'=>'string', 'min'=>4, 'max'=>32],	
			[['password_compare'], 'compare', 'attribute'=>'password', 'message'=>'Повтор пароля повинен співпадати з паролем'],
			[['email', 'username'], 'unique', 'tableName'=>'user'],
		];
		
		$validation = new Validation;
		$validation->check($attributes, $rules);
		
		if (empty($validation->errors)){
			$row = Db::insert('user', [
				'email'			=> $email, 
				'password'		=> md5($password),
				'name'			=> $name,
				'numberPhone'	=> '+38'.$numberPhone,
				'username'		=> $username
			]);
			
			setFlash('sucess', 'Реєстрація була успішно виконана!!!');
			
			return true;
		}	
		
		$this->errors = $validation->errors;
		return $this;
		
			
		
	}
	
	public static function logout()
	{
		unset($_SESSION['uid']);
	}
	
}