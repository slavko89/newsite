<?php 
$errors = isset($errors) ? $errors : [];

?>				
<div class="col-md-12" id="content">
	<?php if (!hasFlash('sucess')):?>
	<form class="form-horizontal col-md-5" id="form-horizontal" method="POST">
		<legend>Авторизація</legend>
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-4 control-label">Email</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputEmail" placeholder="email" name="email">
				<?= form_error('email',$errors)?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputPassword" class="col-sm-4 control-label">Пароль</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="inputPassword" placeholder="password" name="password">
				<?= form_error('password',$errors)?>
			</div>
		</div>
					  					  
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<div class="checkbox">
					<label>
					<input type="checkbox"> Запамятати
					</label>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<button type="submit" name="login" class="btn btn-default">Вхід</button>
			</div>
		</div>
	</form>
	<div class="col-md-6">
		<img src="/image/cats.jpg" width="400" height="300">
	</div>	
	<?php else:?>
	<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
	<?php endif?>
</div>

			
			
				