<?php
	//error_reporting(E_ALL);	
	session_start();

	header('Content-Type: text/html; charset=utf-8');
	include ('/func.php');
	
	include('/class/Uploader.php');
	include('/class/Db.php');
	include('/class/Animal.php');
	include('/class/User.php');
	include('/class/Validation.php');
	include('/class/Posters.php');
	 	 
	Db::connect();
	
	$url = $_SERVER['REQUEST_URI'];
	$title = '';
	$template = '';
	
	$explode  = explode('?', $url);
	
	switch ($explode[0]) {
	
			case '/':
				$template = 'posters';
				$title = 'Головна сторінка';
				break;
				
			case '/posters':
				$template = 'posters';
				$title = 'Головна сторінка';
				break;
				
			case '/postersUser':
				$template = 'postersUser';
				$title = 'Мої оголошення';
				break;
				
			case '/maps':
				$template = 'maps';
				$title = 'Головна сторінка';
				break;
			case '/posterView':
				$template = 'posterView';
				$title = 'Продукт';
				break;
				
			case '/animalsAdd':
				$template = 'animalsAdd';
				$title = 'Добавлення тварин';
				if(isset($_POST['sendForm'])){
					$errors = Animal::getInstence()->add($_POST)->errors;
					
				}
				break;
	
			case '/login':
				$template = 'login';
				$title = 'Логування';
				if($_POST){
					$errors = User::getInstence()->login($_POST['email'], $_POST['password'])->errors;
				}
				break;
				
			case '/registration':
				$template = 'registration';
				$title = 'Реєстрація';
				if($_POST){
					$errors = User::getInstence()->registration($_POST)->errors;
				}
				
				break;
				
			case '/logout':
				User::getInstence()->logout();
				header("location: /login");
				break;
				
			default :
				preg_match('/(.*?)(\?id=|\?status=)(.*?)$|(.*?)\?status=(.*?)$/', $url, $matche);
				
				if (isset($matche[2])) {
					$template = $matche[1];
					if($template == "/posters") $title = 'Головна сторінка';
					else $title = 'Оголошення';
					$errors = Animal::getInstence()->update($_POST)->errors;					
				}else{
					preg_match('/(.*?)\?id=(.*?)&user_id=(.*?)$/', $url, $matche);
					if (isset($matche[2])) {
						$template = $matche[1];
						$title = 'Оголошення';	
						$errors = Animal::getInstence()->update($_POST)->errors;					
					}
				}
				break;

				
				$template = '';
			
			}
			
?>


<!DOCTYPE html>

<html >
	<head>
		<title><?= $title?></title>
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel="stylesheet" href="styles/bootstrap-theme.min.css">
		<link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
		
		<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTfKDUH2KkHaXkoOYH5exE_eo-a9v6Sw&sensor=false">
		</script>
		<script src="/js/jquery-3.1.1.js"></script>
	    <script src="/js/selects.js"></script>
		<script src="/js/sendMail.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/delete-poster.js"></script>
		<script src="/js/change-status.js"></script>


		


		
	</head>
	
	<body>
		<div class="container">
			<div class="row" id="header">	
				<div class="col-md-8" id="header-text">
					<h2>Сайт пошуку пропавших тварин</h2>
				</div>
					<?php  if(is_login()):?>
				<div class="col-md-4" id="registration">
					<div class="btn-group" id="output">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"><span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/postersUser">Мої оголошення</a></li>
							<li><a href="/animalsAdd">Добавити оголошення</a></li>
						
						</ul>
					</div>
						|
						<a href="/logout" id="output"> Вихід </a>
				</div>	
				
					<?php else:?>
				<div class="col-md-4" id="registration">
					<a href="/login" id="input" >Вхід</a>
					|
					<a href="/registration" id="input" 	>Реєстрація</a>
				</div>		
					<?php endif;?>
			</div>
			
			
			<div class="row" >
				<div class="col-md-12" id="menu">
					<nav role="navigation" class="navbar navbar-default navbar-inverse">
						<div id="navbarCollapse" class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="/posters">Головна</a></li>
								<li class="divider-vertical"></li>
								<li><a href="/maps">Карта</a></li>
								<li class="divider"></li>
								<?php  if(is_login()):?>
								<li><a href="/animalsAdd">Добавити оголошення</a></li>
								<?php  endif;?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
				
			<div class="row" >
				<?php include ('/templates/' . $template . '.php');?>
				
			</div>
			
			<div class="row" >
				<div class="col-md-12" id = "footer">
					<center><h2>&copy; Славік Іванюра</h2></center>
				</div>
			</div>
		</div>	
	 	
		<script src="/js/google_maps_add.js"></script>
		<script src="/js/google_maps_adit.js"></script>
	</body>
</html>