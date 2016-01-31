<?php
session_start();
include ('/config.php'); 
include ('/func.php'); 
include ('/class/User.php'); 
include ('/class/Db.php'); 

Db::connect();

$url 		= $_SERVER['REQUEST_URI'];	
$template 	= '';
$title = "";

//d($_SESSION);
for($i = 62; $i<80; $i++)
Db::delete('users',$i);	
switch ($url) {
	case '/':
		$template = 'home';
		$title = 'Головна сторінка';
		break;
	
	case '/login':
		$template = 'login';
		$title = 'Логін';
		
		if (is_post()) {
			if(User::login($_POST['email'], $_POST['password'])) {
				header("location: /");
			} 
		}
		
		break;	
	
	case '/posts':
		$template = 'posts';
		$title = 'Головна сторінка';
		break;
	
	case '/registration':
	    $template = 'registration';
		$title = 'Реєстрація';
		break;	
	
	case '/logout':
	    User::logout();
		header("location: /login");
		break;	
	
	default :
		$template = '404';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title?></title>

    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SlavikCms</a>
            </div>
            <!-- /.navbar-header -->
			
			<?php if(is_login()):?>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
          
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"> Test</a>
                        </li>

                    </ul>
                </div>
            </div>
			
			<?php else:?>
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/login"> Логин</a>
                        </li>

                    </ul>
                </div>
            </div>			
            
			<?php endif;?>
			
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
				
				<?php include ('/templates/' . $template . '.php');?>
	
            </div>
        </div>
       
    </div>
    
	<script src="/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>
	<script src="/dist/js/sb-admin-2.js"></script>

</body>

</html>
