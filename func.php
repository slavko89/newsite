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

function form_error($attribute) {
	if (is_post() && isset($_SESSION['errors'][$attribute])) {
		return sprintf('<p class="help-block">%s</p>', $_SESSION['errors'][$attribute]);
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













