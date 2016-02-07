<?php 


class User {
	
	public static function login($email, $password)
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
			$row = Db::findOne('users', [
				'email'		=> $email, 
				'password'	=> md5($password),
			]);
			
			if (!empty($row)) {
				
				$_SESSION['uid'] = $row['id'];
				
				return true;
			
			} else {
				$validation->errors['email'] = 'Такий користувача в БД не знайдено!';
			}
		} 
		
		$_SESSION['errors'] = $validation->errors;
		
		return false;
	}
	
	public static function registration()
	{
		
	}
	
	public static function logout()
	{
		unset($_SESSION['uid']);
	}
	
}