<?php require_once("../PinParts/header.php");?>
<section>
	<div class="bannerimg cover-image" data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner3.jpg" >
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 class="">Publicaciones</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item">Realizar un anuncio esta solo a un click de distancia.</li>

							</ol>
						</div>
					</div>
				</div>
			</div>
    </section>
    <section class="sptb">
			<div class="container customerpage">
				<div class="row ">
					<div class="col-lg-4 d-block mx-auto">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-md-12">
								<div class="card mb-xl-0">
									<div class="card-header">
										<h3 class="card-title">Registro</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="form-label text-dark">Correo</label>
                                            <input type="text" id="txtCorreoRegistro" class="form-control" placeholder="Escriba su correo" onfocusout="validarCorreoRegistro()">
                                            <span id="spanCorreoRegistro" style="display:none;"></span>
										</div>
										<div class="form-group">
											<label class="form-label text-dark">Contraseña</label>
											<input type="password" id="txtPasswordRegistro" class="form-control" placeholder="Ingrese su Contraseña" onfocusout="validarPasswordRegistro()">
                                            <span id="spanPasswordRegistro" style="display:none;"></span>
                                        </div>
										<div class="form-group">
											<label class="form-label text-dark">Confirmar Contraseña</label>
                                            <input type="password" id="txtConfirmPassowrd" class="form-control"  placeholder="Confirme su Contraseña" onfocusout="validarVerifyPassword()">
                                            <span id="spanConfirmPassword" style="display:none"></span>
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="txtAgree">
												<span class="custom-control-label text-dark">Estoy de Acuedo con los<a href="javascript:void(0)" style="color:#6963ff"> Terminos y Condiciones</a></span>
                                            </label>
                                            <span id="txtterminos" style="color:red;display:none;">Debes aceptar las Terminos y Condiciones para continuar </span>
										</div>
										<div class="form-footer mt-2">
											<button type="button" class="btn btn-primary btn-block" onclick="RegistrarUser()">Crear Cuenta</button>
										</div>
										<div class="text-center  mt-3 text-dark">
											Ya tienes una cuenta?<a href="../Login/" style="color:#6963ff"> Click Aquí</a>
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