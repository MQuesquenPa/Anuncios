<section>
    <div class="bannerimg cover-image " data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner5.jpg" >
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">Mi Perfil</h1>
					<ol class="breadcrumb text-center">
					    <li class="breadcrumb-item">Seguimos implementando mejoras continuamente (Si tienes alguna sugerencia <a style="color:red" href="javascript:void(0)">Click Aquí</a> )</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Panel Usuario</h3>
							</div>
							<div class="card-body text-center item-user">
								<div class="profile-pic">
									<div class="profile-pic-img">
										<span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="" data-original-title="online"></span>
										<img src="<?=DOMINIO.$_SESSION['foto']?>" class="brround" style="height:80px;" alt="user">
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-outline-primary" onclick="abrirModalFoto()">Cambiar Foto de Perfil</button>
                                    <a href="javascript:void(0)" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold"><?php echo stripslashes($_SESSION['nombres'])." ".stripslashes($_SESSION['apellidos'])?> </h4></a>
								</div>
								<div class="modal fade" id="ModalFoto" style="color:white" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
        <form id="datosFoto">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" value="<?php echo $_SESSION['foto']?>" name="fotoAnterior" id="fotoAnterior">
                    <label for="exampleInputFile">Eliga la Nueva Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="filechange"  name="filechange" accept="image/png, image/jpeg, image/jpeg, image/webp" class="custom-file-input" >
                        <label class="custom-file-label" for="exampleInputFile">Elija el Archivo</label>                 
                      </div>
                    </div>
                    <span id="spanImagenCambio" style="display:none;">Debes de Seleccionar una Imagen</span>
                  </div>
                  <hr>
            <div id="previewCambio"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCambiarFoto" class="btn btn-outline-success">Actualizar Foto</button>
        <button type="button"  class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>  
      </div>
      </form>
    </div>
  </div>
</div>
							</div>
							<aside class="app-sidebar doc-sidebar my-dash">
								<div class="app-sidebar__user clearfix">
									<ul class="side-menu">
                                        <li>
											<a class="side-menu__item" href="../PanelUsuario/"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Mis Datos</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-diamond"></i><span class="side-menu__label">Anuncios</span><i class="angle fa fa-angle-right"></i></a>
											<ul class="slide-menu">
												<li><a class="slide-item" href="../PanelUsuario/misAnuncios.php"> Mis Anuncios</a></li>
												<li class="sub-slide">
													<a class="side-menu__item border-top-0 slide-item" href="#" data-toggle="sub-slide"><span class="side-menu__label">Crear Anuncio</span> <i class="sub-angle fa fa-angle-right"></i></a>
													<ul class="child-sub-menu ">
													<li><a class="slide-item" href="javascript:void(0)">--Eliga una de las categorías--</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=1">Hombres</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=2">Mujeres</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=3">LGBT</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=4">Swingers</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=5">Hoteles</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=6">Clubes Nocturnos</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=7">Juguetes Sexuales</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=8">Vehículos</a></li>
														<li><a class="slide-item" href="../PanelUsuario/crearAnuncio.php?categoria=9">Energizantes</a></li>
													</ul>
												</li>
											</ul>
                                        </li>
										<li>
											<a class="side-menu__item" href="../PanelUsuario/cambioPassword.php"><i class="side-menu__icon si si-lock"></i><span class="side-menu__label">Cambiar Contraseña</span></a>
										</li>
										<li>
											<a class="side-menu__item" href="../PanelUsuario/recargas.php"><i class="side-menu__icon si si-credit-card"></i><span class="side-menu__label">Comprar Más Anuncios</span></a>
										</li>
										<li>
											<a class="side-menu__item" onclick="Salir()" href="javascript:void(0)"><i class="side-menu__icon si si-power"></i><span class="side-menu__label">Salir</span></a>
										</li>
									</ul>
								</div>
							</aside>
						</div>
						
