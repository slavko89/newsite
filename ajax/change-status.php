<?
 include("../class/Db.php");
 Db::connect();
 
	
	if(isset($_POST['is_active'])){
		$is_active = intval($_POST['is_active']);
		$status = Db::update('poster', ['is_active'=>$is_active], intval($_POST['id']));
		if($status) {
			echo "Статус змінено";
		}else {
			echo "error";
		}
	}
	
	
 


?>