	<div class="col-md-12" id="content">
					<?php if (!hasFlash('sucess')):?>
				
					<form class="form-horizontal" id="form-horizontal" method="POST">
					<legend>Реэстрація</legend>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Імя</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name">
							<?= form_error('name')?>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputEmail" placeholder="email" name="email">
							<?= form_error('email')?>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputLogin" class="col-sm-2 control-label">Логин</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputLogin" placeholder="login" name="username">
							<?= form_error('username')?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="numberPhone" class="col-sm-2 control-label">Телефон</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="numberPhone" placeholder="number" name="numberPhone">
							<?= form_error('numberPhone')?>
						</div>
					  </div>
					  
					   <div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">Пароль</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" id="inputPassword" placeholder="password" name="password">
							<?= form_error('password')?>
						</div>
					  </div>
					  
					  
					   <div class="form-group">
						<label for="inputPassword_compare" class="col-sm-2 control-label">Пароль</label>
						<div class="col-sm-3">
							<input type="password" class="form-control" id="inputPassword_compare" placeholder="password_compare" name="password_compare">
							<?= form_error('password_compare')?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							  <input type="checkbox"> Remember me
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Sign in</button>
						</div>
					  </div>
					</form>
					
								<?php else:?>
												<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
											<?php endif?>	
				</div>