<?php define("DOMINIO","http://localhost/Anuncios/");
session_start();
if(empty($_SESSION)){
$ip = "181.176.103.29";
$informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
$dataSolicitud = json_decode($informacionSolicitud);
$_SESSION['nombres']="0@§";
$_SESSION['pais']=$dataSolicitud->geoplugin_countryCode;
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="msapplication-TileColor" content="#0f75ff">
		<meta name="theme-color" content="#2ddcd3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta property="og:type" content="Anuncios"/>
		<meta property="og:author" content="Mygeldt Anjel">
		<meta property="og:title" content="EntreAngeles.site | Anuncios Eroticos "/>
		<meta property="og:url" content="http://entreangeles.site/"/>
		<meta property="og:image" content="<?=DOMINIO?>Design/img/erotic.jpg"/>
		<meta property="og:description" content="Busca y publica anuncios eróticos gratis, clasificados de masajes eróticos, sexo, kinesiólogas, gays, swingers,vehículos,energizantes,hoteles,juguetes sexuales y clubes nocturnos">
		<meta property="og:keywords" content="Kinesiólogas,Anuncios Eroticos,xxx,Mujeres Bonitas,Putas,Gays,Travestis,Swingers,Energizantes,Erotico,Porno,EntreAngeles.site,Sexo Facil,Mujeres Calientes,Juguetes Sexuales,Scorts, Hombres Calientes">
		<link rel="icon" href="<?=DOMINIO?>Design/assets/images/icon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?=DOMINIO?>Design/assets/images/icon.ico" />

		<!-- Title -->
		<title>EntreAngeles.site | Anuncios Eroticos </title>

		<!-- Bootstrap Css -->
		<link href="<?=DOMINIO?>Design/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="<?=DOMINIO?>Design/assets/css/dashboard.css" rel="stylesheet" />

		<!-- Font-awesome  Css -->
		<link rel="stylesheet" href="<?=DOMINIO?>Design/assets/fonts/fonts/font-awesome.min.css">

		<!--Horizontal Menu-->
		<link href="<?=DOMINIO?>Design/assets/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet" />
		<link href="<?=DOMINIO?>Design/assets/plugins/Horizontal2/Horizontal-menu/horizontal.css" rel="stylesheet" />
		<link href="<?=DOMINIO?>Design/assets/plugins/Horizontal2/Horizontal-menu/color-skins/color.css" rel="stylesheet" />

		<!--Select2 Plugin -->
		<link href="<?=DOMINIO?>Design/assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Cookie css -->
		<link href="<?=DOMINIO?>Design/assets/plugins/cookie/cookie.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="<?=DOMINIO?>Design/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?=DOMINIO?>Design/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- jquery ui RangeSlider -->
		<link href="../../Design/assets/plugins/jquery-uislider/jquery-ui.css" rel="stylesheet">
		<!--Font icons-->
		<link href="<?=DOMINIO?>Design/assets/plugins/iconfonts/plugin.css" rel="stylesheet">
		<link href="<?=DOMINIO?>Design/assets/plugins/iconfonts/icons.css" rel="stylesheet">				
	</head>
	<body>


		<!--Loader-->
		<div id="global-loader">
			<img src="<?=DOMINIO?>Design/assets/images/other/loader.svg" class="loader-img floating" alt="">
		</div>


		<!--Topbar-->
		<input type="hidden" id="sessionVlue" value="<?php echo $_SESSION['nombres'];?>">
		<div class="header-main">
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-sm-4 col-7">
							<div class="top-bar-left d-flex">
								<div class="clearfix">
									<ul class="socials">
										<li>
											<a class="social-icon text-dark" href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
										</li>
										<li>
											<a class="social-icon text-dark" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
										</li>
										<li>
											<a class="social-icon text-dark" href="javascript:void(0)"><i class="fa fa-linkedin"></i></a>
										</li>
										<li>
											<a class="social-icon text-dark" href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
										</li>
									</ul>
								</div>

							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-sm-8 col-5">
							<div class="top-bar-right">
								<ul class="custom">
									<li id="comRegister">
										<a href="<?=DOMINIO?>Views/Register/" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Registrarse</span></a>
									</li>
									<li id="comLogin">
										<a href="<?=DOMINIO?>Views/Login/" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Ingresar</span></a>
									</li>
									<li id="comDash" class="dropdown">
										<a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> Mi Espacio</span></a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a href="mydash.html" class="dropdown-item" >
												<i class="dropdown-icon si si-user"></i> My Perfil
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon si si-envelope"></i>Enviar Mensaje
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon si si-power"></i>Salir
											</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Mobile Header -->
			<div class="sticky">
				<div class="horizontal-header clearfix ">
					<div class="container">
						<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
						<span class="smllogo"><img src="<?=DOMINIO?>Design/assets/images/brand/logo1.png" width="120" alt=""/></span>
					</div>
				</div>
			</div>
			<!-- Mobile Header -->

			<div class="sticky">
				<div class="horizontal-main clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<div class="desktoplogo">
							<a href="index.html"><img src="<?=DOMINIO?>Design/assets/images/brand/logo1.png" alt=""></a>
						</div>

						<!--Nav-->
						<nav class="horizontalMenu clearfix d-md-flex">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="javascript:void(0)">Anuncios</a>
                                </li>
                                <li aria-haspopup="true"><a href="#">Categorias <span class="fa fa-caret-down m-0"></span></a>
									<ul class="sub-menu">
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Hombres">Hombres</a></li>
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Mujeres">Mujeres</a></li>
										    <li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=LGBT">LGBT</a></li>
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Swingers">Swingers</a></li>
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Hoteles">Hoteles</a></li>
                                            <li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Clubes Nocturnos">Clubes Nocturnos</a></li>
                                            <li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Juguetes Sexuales">Juguetes Sexuales</a></li>
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Vehiculos">Vehículos</a></li>
											<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/Buscador/index.php?search=Energizantes">Energizantes</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/AcercaNosotros/">Acerca de Nosotros</a></li>
                                <li aria-haspopup="true"><a href="<?=DOMINIO?>Views/PoliticasPrivacidad/">Políticas de Privacidad</a></li>
								<li aria-haspopup="true"><a href="<?=DOMINIO?>Views/AyudanosMejorar/">Ayudanos a Mejorar<span class="wsarrow"></span></a></li>
								<li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0">
									<span><a class="btn btn-secondary" href="ad-posts.html">Publicar Anuncio</a></span>
								</li>
							</ul>
							<ul class="mb-0">
								<li aria-haspopup="true" class="mt-5 d-none d-lg-block ">
									<span><button class="btn btn-secondary" onclick="PublicarAnucio()">Publicar Anuncio</button></span>
								</li>
							</ul>
						</nav>
						<!--Nav-->
					</div>
				</div>
			</div>
		</div>