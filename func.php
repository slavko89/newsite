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

function conect_db(){
		$mysql = new mysqli(
		                    "mysite.loc",
							"mysql",
							"mysql",
							"mysite"
							);
		return $mysql;
	}
	
function is_log_database(){
	    $result = conect_db()->query("SELECT*FROM users");
		$rows = $result->fetch_assoc();
		$res = "";
		do{
			if($rows['email'] == $_POST['email'] && $rows['password'] == $_POST['password']){
				$_SESSION['uid'] = true;
			}else{
				$_SESSION['uid'] = false;
			}
		     
    					
		}while($rows = $result->fetch_assoc());
			return $_SESSION['uid'];
}














