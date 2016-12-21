				<div id="map-outer" class="col-md-12">
					<div id="adres" class="col-md-5">
				
						<form class="form-horizontal" id="form-horizontal" method="POST">
							<legend>Додавання тварини</legend>
			
							<div class="form-group">
								<label for="inputName" class="col-sm-4 control-label">Ім'я</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputName" placeholder="Ім'я" name="name">
								</div>
							</div>
							  
							<div class="form-group">
								<label for="inputView" class="col-sm-4 control-label">Вид тварини</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputView" placeholder="Вид" name="kind_of_animal">
								</div>
							</div>
							  
							<div class="form-group">
								<label for="inputBreed" class="col-sm-4 control-label">Порода</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="inputBreed" placeholder="Порода" name="breed">
								</div>
							</div>
							  
							<div class="form-group">
								<label for="inputOpys" class="col-sm-4 control-label">Короткий опис</label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="5" id="inputOpys" placeholder="Опис тварини" name="description"></textarea>
								</div>
							</div>
							  
							<div class="form-group">
								<label for="address" class="col-sm-4 control-label">Адреса</label>
							   <div class = "col-sm-8">
								  <input id="address"  name = "address" type="textbox" value="Львів">
								  <input id="submit" type="button" value="Geocode">
								</div>
							</div>
							
								  
		  
							
					</form>
					<form   method="POST"  enctype="multipart/form-data">
							<div class="form-group" >
								<label for="upload" class="col-sm-4 control-label">Загрузить фото</label>
									<div class = "col-sm-8"  >
										<input type="file"  name="load"><br> 
										<input type="submit" name="send-request" value="Загрузить"><br>
									</div>
									
							</div>
							
					</form>			
				

						
					</div>
				
					<div id="map-container" class="col-md-7"></div>
				</div>
				
		
		
<?php 

	
	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
		foreach($_FILES as $file_key=>$file_data) {
		    $uploader = new Uploader($file_key);
			
		}
	}
	
	
	?>