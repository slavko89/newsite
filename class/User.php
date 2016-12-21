<?php 


class User {
	
	
	public static function login($email, $password)
	{
		unset($_SESSION['errors']);
		
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
			$row = Db::findOne('users', [
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
		
		$_SESSION['errors'] = $validation->errors;
		
		return false;
	}
	
	public static function registration($formAttribues)
	{
		unset($_SESSION['errors']);
		
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
			[['email', 'username'], 'unique', 'tableName'=>'users'],
		];
		
		$validation = new Validation;
		$validation->check($attributes, $rules);
		
		if (empty($validation->errors)){
			$row = Db::insert('users', [
				'email'			=> $email, 
				'password'		=> md5($password),
				'name'			=> $name,
				'numberPhone'	=> '+38'.$numberPhone,
				'username'		=> $username
			]);
			
			setFlash('sucess', 'Реєстрація була успішно виконана!!!');
			
			return true;
		}	
		
		$_SESSION['errors'] = $validation->errors;
		return false;
		
			
		
	}
	
	public static function logout()
	{
		unset($_SESSION['uid']);
	}
	
}