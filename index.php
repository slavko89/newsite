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
	 	 
	Db::connect();
	
	$url = $_SERVER['REQUEST_URI'];
	$title = '';
	$template = '';
	
	
	switch ($url) {
	
			case '/':
				$template = 'home';
				$title = 'Головна сторінка';
				break;
				
			case '/home':
				$template = 'home';
				$title = 'Головна сторінка';
				break;
				
			case '/maps':
				$template = 'maps';
				$title = 'Головна сторінка';
				break;
				
			case '/addanimals':
				$template = 'addanimals';
				$title = 'Добавлення тварин';
				if($_POST['sendForm']){
					$errors = Animal::getInstence()->add($_POST)->errors;
				}
				
				break;
	
			case '/login':
				$template = 'login';
				$title = 'Логування';
				User::login($_POST['email'], $_POST['password']);
				
				break;
				
			case '/registration':
				$template = 'registration';
				$title = 'Реєстрація';
				User::registration($_POST);
				break;
				
			case '/logout':
				User::logout();
				header("location: /login");
				break;
				
			default :
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
			 <link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
			<script src="js/jquery-3.0.0.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			
			
						

	</head>
	
	<body >
		
				
	<div class="container">
		<div class="row" id="header">	
				<div class="col-md-8" id="header-text">
					<h2>Сайт пошуку пропавших тварин</h2>
				</div>
				
				<?php  if(is_login()):?>
				<div class="col-md-4" id="registration">
					<a href="/logout" id="input" 	>Вихід</a>
				</div>	
				<?php else:?>
				<div class="col-md-4" id="registration">
						<a href="/login" id="input" >Вхід</a>
						|
						<a href="/registration" id="input" 	>Реєстрація</a>
				</div>	
						
				<?php endif;?>
		</div>
		
		<?php  if(is_login()):?>
		<div class="row" >
			<div class="col-md-12" id="menu">
					<nav role="navigation" class="navbar navbar-default navbar-inverse">
						<div id="navbarCollapse" class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
							  <li><a href="/home">Home</a></li>
							  <li class="divider-vertical"></li>
							  <li><a href="/maps">Карта</a></li>
							  <li class="divider"></li>
							  <li><a href="/addanimals">Добавити тварину</a></li>
							</ul>
						</div>
					</nav>
	
	
	
			</div>
		</div>
		<?php  endif;?>
 
		<div class="row" >
			
			<?php include ('/templates/' . $template . '.php');?>
				
		</div>
		
		<div class="row" >
			<div class="col-md-12" id = "footer">
				<center><h2>&copy; Славік Іванюра</h2></center>
		
			</div>
		</div>
		
	</div>
	
		

	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_1b13FQd9_-WXfClKBkQioOQIOOK-fLI&signed_in=true&callback=initMap"></script>
	
	<script src="js/markeradd.js">  </script>
	<script src="js/map.js">  </script>
	<script src="js/upload.js">  </script>
		<script src="js/jquery.js"></script>
	<script src="js/imageupload.js"></script>
	<script>
		$(document).ready(function () {				
			$("#upload_image").imageUpload("upload.php", {
				uploadButtonText: "Button",
				previewImageSize: 150,
				onSuccess: function (response) {
					alert(response);
				}
			});
		});
	</script>
	
	</body>
</html>