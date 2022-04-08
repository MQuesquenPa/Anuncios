<?php 
require_once("BD/Connection.php");
require_once("Models/MenuPrincipal.php");
require_once("Views/PinParts/header.php");
$moreLikess=MenuPrincipal::publicacionesMenuPrincipal($_SESSION['pais']);
$ricienPublicados=MenuPrincipal::AnunciosRecientes($_SESSION['pais']);
?>
		<!--Sliders Section-->
		<section>
			<div class="banner-1 cover-image sptb-2 sptb-tab" data-image-src="Design/assets/images/banners/erotic.jpg">
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white">
							<h1 class="mb-1">Encuentra los Mejores Anuncios Eróticos</h1>
							<p>Seleccionados especialmente para ti .</p>
						</div>
						<div class="row">
							<div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
								<div class="item-search-tabs classifieds-content">
									<div class="item-search-menu">
										<ul class="nav">
											<li class="desire"><a href="javascript:void(0)">Actuales</a></li>
											<li class="desire"><a href="javascript:void(0)">Entretenidos</a></li>
											<li class="desire"><a href="javascript:void(0)">Cercanos</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<div class="form row">
												<div class="form-group col-xl-12 col-lg-12  col-md-12 mb-0">
													<div class="row no-gutters bg-white br-2">
														<div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
															<input type="text" class="form-control border-0" id="txtbuscar" onkeypress="validar(event)" placeholder="Escribe tu Busqueda Aquí">
														</div>
														<div class="col-xl-4 col-lg-5 col-md-12 mb-0">
														<button type="button" class="btn btn-block btn-secondary fs-13" onclick="BuscarPalabra()"><i class="fa fa-search"></i>Buscar</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /header-text -->
			</div>
		</section>
		<!--Sliders Section-->

		<!--Locations-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Categorías</h1>
					<p>Totalmente variadas para tus gustos</p>
				</div>
				<div class="row">
					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card">
							<div class="item-card">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Hombres"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/hombres.jpg" style="height:190px;" alt="Hombres" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catHombres">Hombres</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card">
							<div class="item-card">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Mujeres"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/chicas.jpg" style="height:190px;" alt="Mujeres" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catMujeres">Mujeres</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card">
							<div class="item-card">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=LGBT"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/lgbt.jpg" style="height:190px;" alt="LGBT" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catLGBT">LGBT</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card">
							<div class="item-card">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Swingers"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/swinger.jpg" style="height:190px;" alt="Swingers" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catSwinger">Swingers</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card mb-xl-0">
							<div class="item-card">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Energizantes"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/energizantes.jpg"  style="height:190px;" alt="Energizantes" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catEner">Energizantes</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card mb-xl-0">
							<div class="item-card ">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Clubes Nocturnos"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/clubes.jpg" style="height:190px;" alt="Clubes Nocturnos" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catClub">Clubes Nocturnos</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card mb-xl-0">
							<div class="item-card ">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Vehiculos"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/vehiculos.jpg" style="height:190px;"  alt="Vehiculos" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catVeh">Vehículos</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-md-3 col-sm-6">
						<div class="card mb-xl-0">
							<div class="item-card ">
								<div class="item-card-desc">
									<a href="<?=DOMINIO?>Views/Buscador/index.php?search=Hoteles"></a>
									<div class="item-card-img">
										<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="Design/assets/images/locations/hoteles.jpg" style="height:190px;" alt="Hoteles" class="lazy br-tr-7 br-tl-7">
									</div>
									<div class="item-card-text">
										<h4 class="mb-0"><span id="catHoteles">Hoteles</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Locations-->



		<!--Featured Ads-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Anuncios Populares</h1>
					<p>Todos Categorizados para tus gustos y preferencias</p>
				</div>
				<div id="myCarousel2" class="owl-carousel owl-carousel-icons2">
					<?=$moreLikess?>		
				</div>
			</div>
		</section>
		<!--Latest Ads-->
		<section>
			<div class="about-1 cover-image sptb-2 " data-image-src="Design/assets/images/banners/bannerultimo.webp">
				<div class="content-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 class="mb-2">Tenemos los mejores Planes</h1>
							<p class="fs-16">Realiza tus 10 primeras Publicaciones de manera grauita y facil.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sptb">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Anuncios Recientes</h1>
					<p>Todos los anuncios publicados tienen la oportunidad de estar en nuestra Página Principal</p>
				</div>
				<div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
				
					<?=$ricienPublicados?>

				</div>
			</div>
		</section>
		<!--Latest Ads-->

<?php require_once("Views/PinParts/footer.php")?>
<script>
CantPrincipal();
$('.lazy').lazyload();
</script>