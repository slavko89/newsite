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
	
<<<<<<< HEAD
	$explode = explode("?" , $url);
=======
	$explode  = explode('?', $url);
	
>>>>>>> b07705031ce4d6dae545e7511bb9be5929c2178e
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
				
			case '/map':
				$template = 'map';
				$title = 'Перегляд тварин';
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
		<link rel="stylesheet" href="styles/style_images.css">
		<link rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel="stylesheet" href="styles/bootstrap-theme.min.css">
		<link rel="shortcut icon" href="/image/Search.ico" type="image/x-icon">
	
		
		
		<script src="/js/jquery-3.1.1.js"></script>
	    <script src="/js/JQuery/selects.js"></script>
		<script src="/js/JQuery/sendMail.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/JQuery/delete-poster.js"></script>
		<script src="/js/JQuery/change-status.js"></script>
		
			
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
								<li><a href="/map">Пошук на карті</a></li>
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
					
					<script type="text/javascript">(function() {
						  if (window.pluso)if (typeof window.pluso.start == "function") return;
						  if (window.ifpluso==undefined) { window.ifpluso = 1;
							var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
							s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
							s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
							var h=d[g]('body')[0];
							h.appendChild(s);
						  }})();
					</script>
<div class="pluso" data-background="transparent" data-options="big,square,line,horizontal,counter,theme=01" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
				<center><h2>&copy; Славік Іванюра</h2></center>
				</div>
				
			</div>
		</div>	
		

		
	</body>
</html>