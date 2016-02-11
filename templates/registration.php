                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Реєстрация</h1>
						
						
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-3">
											<?php if (!hasFlash('sucess')):?>
												<form role="form" method="POST">

													<div class="form-group">
														<label for="name">Імя</label>
														
														<?= form_input('name')?>
														<?= form_error('name')?>
													</div>
													
													<div class="form-group">
														<label for="email">E-mail</label>
														<?= form_input('email')?>
														<?= form_error('email')?>
													</div>

													<div class="form-group">
														<label for="username">Ник</label>
														<?= form_input('username')?>
														<?= form_error('username')?>
													</div>

													<div class="form-group">
														<label for="password">Пароль</label>
														<?= form_input('password')?>
														<?= form_error('password')?>
													</div>
													
													<div class="form-group">
														<label for="password_compare">Пароль</label>
														<?= form_input('password_compare')?>
														<?= form_error('password_compare')?>
													</div>

													<button type="submit" class="btn btn-success">Зареэструвати</button>
                                                       
												</form>
											<?php else:?>
												<div class="alert alert-success" role="alert"> <?= getFlash('sucess')?> </div>
											<?php endif?>	
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>						
                   </div>
                </div>				