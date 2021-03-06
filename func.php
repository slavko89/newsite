<?php 

function d($array, $die=true) {
	print('<pre>');
	print_r($array);
	print('</pre>');
	
	if ($die) {
		die();
	}
}

function is_login() {
	if (isset($_SESSION['uid'])) {
		return true;
	} else {
		return  false;
	}
}

function is_post() {
	if (isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) ==  'post') {
		return true;
	} else {
		return  false;
	}
}

function is_get() {
	if (isset($_SERVER['REQUEST_METHOD']) &&  strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
		return true;
	} else {
		return  false;
	}
}

function form_error($attribute, $errors) {
	if (is_post() && isset($errors[$attribute])) {
		return sprintf('<p class="help-block">%s</p>', $errors[$attribute]);
	}
}


function form_input($attribute, $type='text') {
	return sprintf('<input type="%s" class="form-control" name="%s" id="%s" value="%s">', $type, $attribute, $attribute, isset($_POST[$attribute])?$_POST[$attribute]:'');
}

function setFlash($type, $message) {
	$_SESSION['FLASH_' . $type] = $message;
}

function hasFlash($type) {
	return isset($_SESSION['FLASH_' . $type]);
}

function getFlash($type) {
	if (hasFlash($type)) {
		$message = $_SESSION['FLASH_' . $type];
		unset($_SESSION['FLASH_' . $type]);
		return $message;
	}
}
function generateDir($length = 4){
	$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
	$numChars = strlen($chars);
	$string = '';
	
	for ($i = 0; $i < $length; $i++) {
	$string .= substr($chars, rand(1, $numChars) - 1, 1);
	}
	return $string;
}












