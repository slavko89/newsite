                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Реєстрация</h1>
						
						
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-3">
												<form role="form" method="POST">

													<div class="form-group">
														<label for="name">Імя</label>
														<input class="form-control" name="name" id="name">
														<?php if (isset($_SESSION['errors']['name'])):?>
														<p class="help-block"><?= $_SESSION['errors']['name']?></p>
														<?php endif;?>
													</div>
													
													<div class="form-group">
														<label for="email">E-mail</label>
														<input class="form-control" name="email" id="email">
														<?php if (isset($_SESSION['errors']['email'])):?>
														<p class="help-block"><?= $_SESSION['errors']['email']?></p>
														<?php endif;?>
													</div>

													<div class="form-group">
														<label for="password">Пароль</label>
														<input type="password" class="form-control" name="password" id="password">
														<?php if (isset($_SESSION['errors']['password'])):?>
														<p class="help-block"><?= $_SESSION['errors']['password']?></p>
														<?php endif;?>
													</div>
													
													<div class="form-group">
														<label for="password_compare">Пароль</label>
														<input type="password" class="form-control" name="password_compare" id="password_compare">
														<?php if (isset($_SESSION['errors']['password_compare'])):?>
														<p class="help-block"><?= $_SESSION['errors']['password_compare']?></p>
														<?php endif;?>
													</div>

													<button type="submit" class="btn btn-success">Зареэструвати</button>
                                                       
												</form>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>						
                   </div>
                </div>				