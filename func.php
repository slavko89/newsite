<?php 
function d($array) {
	print('<pre>');
	print_r($array);
	print('</pre>');
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
