<?php require_once("../PinParts/header.php");?>
<section>
			<div class="bannerimg cover-image " data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner2.jpg" >
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 >Anuncios</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item">Totalmente variados para todos los gustos</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>
<section class="sptb">
			<div class="container customerpage">
				<div class="row">
					<div class="col-lg-4 d-block mx-auto">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-md-12">
								<div class="card mb-0">
									<div class="card-header">
										<h3 class="card-title">Ingresa a tu Cuenta</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="form-label text-dark">Correo Electrónico</label>
                                            <input type="email" id="txtEmail" class="form-control" onfocusout="validarEmailLogin()" placeholder="Ingrese su Correo">
                                            <span id="spanEmailLogin" style="display:none;"></span>
										</div>
										<div class="form-group">
											<label class="form-label text-dark">Contraseña</label>
                                            <input type="password" class="form-control" id="txtPassword" onfocusout="validarContraseaLogin()" placeholder="Ingrese su Contraseña">
                                            <span id="spanPasswordLogin" style="display:none;"></span>
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												
												<input type="checkbox" class="custom-control-input">
												<span class="custom-control-label text-dark">Recordarme</span>
											</label>
										</div>
										<div class="form-footer mt-2">
											<button type="button" class="btn btn-primary btn-block" onclick="Login()">Iniciar Sésion</button>
										</div>
										<div class="text-center  mt-3 text-dark">
											No tienes una Cuenta ? <a href="../Register/"  style="color:#6963ff">Click Aquí</a>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
        </section>
<?php require_once("../PinParts/footer.php");?>