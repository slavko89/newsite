<?php

if($_POST['email'] && $_POST['phone'] && $_POST['message'] && $_POST['user_email'])
    {
		$to			= $_POST['user_email'];
		$from 		= $_POST['email'];
		$message 	= "Пошта: ".$_POST['email']."\nТелефон: ".intval($_POST['phone'])."\nПовідомлення: ".$_POST['message'];
		
		$mail = mail($to,$from,$message);
		if($mail){
			echo true;
		}else{
			echo false;
		}
	}
	else echo false;
?>