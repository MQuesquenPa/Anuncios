<?php require_once("../PinParts/header.php");?>
<section>
	<div class="bannerimg cover-image " data-image-src="<?=DOMINIO?>Design/assets/images/banners/bannercoment.jpg" >
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Tu Opinión nos importa</h1>
						<ol class="breadcrumb text-center">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Deja un comentario explicandolo lo que deseas que mejoremos</a></li>
						</ol>
					</div>
				</div>
			</div>
	</div>
</section>
<div class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-lg-5  col-md-12 mx-auto d-block">
						<div class="card mb-0">
							<div class="card-body">
								<div class="form-group">
									<input type="text" class="form-control" id="txnombre" placeholder="Tu Nombre" onfocusout="validarNombreMejorar()">
                                    <span id="spannombre" style="display:none;"></span>
                                </div>
								<div class="form-group">
									<input type="email" class="form-control" id="txcorreo" placeholder="Tu Correo" onfocusout="validarCorreoMejorar()">
                                    <span id="spancorreo" style="display:none;"></span>
                                </div>
								<div class="form-group">
									<textarea class="form-control" id="txcomentario" name="example-textarea-input" rows="6" placeholder="Escribe tu comentario aquí" onfocusout="validarComentarioMejorar()"></textarea>
                                    <span id="spancomentario" style="display:none;"></span>
                                </div>
								<a href="javascript:void(0)" type="button" class="btn btn-primary" onclick="EnviarComentario()">Enviar Comentario</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php require_once("../PinParts/footer.php");?>