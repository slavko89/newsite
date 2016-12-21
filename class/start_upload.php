
<?php 
print_r($_FILES);

	/*include('Uploader.php');
	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
		
		for ($i=0; $i<count($_FILES['file']['name']); $i++) {
			if(is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
				$uploader = new Uploader($i);	
			}
		}				
		
	}
*/
?>

<form enctype="multipart/form-data" action="" method="POST">
    1: <input name="file[]" type="file"  multiple="multiple"><br/>
	  
    <input type="submit" value="Send File" />
</form>
