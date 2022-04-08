<?php require_once("../PinPartsUsuario/headerUsuario.php");
require_once("../PinPartsUsuario/asideUsuario.php");
?>
</div>
    <div class="col-xl-5 col-lg-12 col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title">Actualización de Contraseña</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 col-md-12">
										<div class="form-group">
											<label class="form-label">Contraseña Actual</label>
											<input type="password" class="form-control" id="passwordPast" onfocusout="validarPasswordAntigua()" placeholder="Ingrese su Contraseña Actual">
                                            <span id="spanPast" style="display:none"></span>
                                        </div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="form-group">
											<label class="form-label">Contraseña Nueva</label>
                                            <input type="password" class="form-control" id="passwordNew" onfocusout="validarPasswordNueva()" placeholder="Ingrese la Nueva Contraseña">
                                            <span id="spanNew" style="display:none"></span>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="form-group">
											<label class="form-label">Confirmar Nueva Contraseña</label>
                                            <input type="password" class="form-control" id="passwordConfirm" onfocusout="validarPasswordConfirmacion()" placeholder="Confirme la Nueva Contraseña">
                                            <span id="spanConfirm" style="display:none"></span>
                                        </div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-primary" onclick="CambiarContrasea()">Actualizar Contraseña</button>
							</div>
                        </div>
                        <br>
                        <div class="card my-select">
							<div class="card-header">
								<h3 class="card-title">Información de Plan</h3>
							</div>
							<div class="card-body">
                            <li style="list-style:none;">
							<i class="fa fa-book text-warning" aria-hidden="true"></i> Tu Plan Actual es <?=$plan?>
                            </li>
                            <li style="list-style:none;">
							<i class="fa fa-copy text-warning" id="publicacionesCantidad" aria-hidden="true"></i> 
							</li>
							</div>
						</div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="card mb-xl-0">
							<div class="card-header">
								<h3 class="card-title">Algunos Tips</h3>
							</div>
							<div class="card-body">
								<ul class="list-unstyled widget-spec  mb-0">
									<li class="">
										<i class="fa fa-check text-success" aria-hidden="true"></i> Para mayor seguridad le pedimos que su contraseña sea mayor a 6 caracteres
									</li>
									<li class="">
										<i class="fa fa-check text-success" aria-hidden="true"></i> Los anuncios con más likes se muestran en nuestra página principal
									</li>
									<li class="">
										<i class="fa fa-check text-success" aria-hidden="true"></i> Verifique toda la información del anuncio antes de realizar uno
                                    </li>
                                    <li class="">
										<i class="fa fa-check text-success" aria-hidden="true"></i> No Comparta sus credenciales de acceso con cualquier persona
                                    </li>
                                    <li class="">
										<i class="fa fa-check text-success" aria-hidden="true"></i> Si tiene algun inconveniente con las plataformas de Pago , no dude en contactarse con Nosotros
									</li>
									<li class="ml-5 mb-0">
										<a href="javascript:void(0);" style="color:red;"> Ver Más..</a>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
        </section>
<?php require_once("../PinPartsUsuario/footerUsuario.php")?>
<script>traerPublicaciones();</script>