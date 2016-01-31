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













