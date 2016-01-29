<?php 


class User {
	
	public static function login($email, $password)
	{
		$row = Db::findOne('user', [
			'email'		=> $email, 
			'password'	=> md5($password),
		]);
		
		if (!empty($row)) {
			$_SESSION['uid'] = $row['id'];
			return true;
		} else {
			return false;
		}
	}
	
	public static function registration()
	{
		
	}
	
	public static function logout()
	{
		unset($_SESSION['uid']);
	}
	
}