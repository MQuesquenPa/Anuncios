<?php require_once("../PinParts/header.php");
if(empty($_GET['search'])){
$guly=1;
$search=0;
$categoria=0;
$precio=0;
$ciudad=0;
$orden=0;
}else{
$ted=substr($_GET['search'],0,7);
if($ted=="Filtros"){
$guly=2;
$search=0;
$desire=explode("/",$_GET['search']);
$parte1=$desire[1];
if($parte1=="Categorias"){
	if(!isset($desire[4])){
		echo "<script>window.location.href = '../../'</script>";	
}else{
	if(!isset($desire[5])){
		$categoria=$desire[2];
		$precio=$desire[4];
		$ciudad="";
		$orden="";
	}else if($desire[5]=="Ciudad"){
		if(!isset($desire[7])){
			$categoria=$desire[2];
			$precio=$desire[4];
			$ciudad=$desire[6];		
			$orden="";
		}else if($desire[7]=="Orden"){
			$categoria=$desire[2];
			$precio=$desire[4];
			$ciudad=$desire[6];		
			$orden=$desire[8];
		}else{
			$categoria=$desire[2];
			$precio=$desire[4];
			$ciudad=$desire[6];		
			$orden="";
		}
	}else if($desire[5]=="Orden"){
		$categoria=$desire[2];
		$precio=$desire[4];
		$ciudad="";
		$orden=$desire[6];
	}else{
		$categoria=$desire[2];
		$precio=$desire[4];
		$ciudad="";
		$orden="";
	}
}
}else if($parte1=="Precios"){
	if(!isset($desire[3])){
		$categoria="";
		$precio=$desire[2];
		$ciudad="";
		$orden="";
	}else if($desire[3]=="Ciudad"){
		if($desire[5]=="Orden"){
			$categoria="";
			$precio=$desire[2];
			$ciudad=$desire[4];
			$orden=$desire[6];
		}else{
			$categoria="";
			$precio=$desire[2];
			$ciudad=$desire[4];
			$orden="";
		}
	}else if($desire[3]=="Orden"){
		$categoria="";
		$precio=$desire[2];
		$ciudad="";
		$orden=$desire[4];
	}else{
		$categoria="";
		$precio=$desire[2];
		$ciudad="";
		$orden="";
	}
}else{
	echo "<script>window.location.href = '../../'</script>";
}
}else{
$guly=3;
$search=str_replace("-"," ",$_GET['search']);
$categoria=0;
$precio=0;
$ciudad=0;
$orden=0;
}
}
?>
<input type="hidden" id="glyes" value="<?=$guly?>">
<input type="hidden" id="search" value="<?=$search?>">
<input type="hidden" id="categoria" value="<?=$categoria?>">
<input type="hidden" id="vprecio" value="<?=$precio?>">
<input type="hidden" id="vciudad" value="<?=$ciudad?>">
<input type="hidden" id="vorden" value="<?=$orden?>">
<div class="banner-1 cover-image sptb-2 sptb-tab" data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner6.jpg" >
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white">
							<h1 class="mb-1">Encuentra los mejores anuncios</h1>
							<p>Sin la necesidad de registros o intermediarios</p>
						</div>
						<div class="row">
							<div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
								<div class="item-search-tabs classifieds-content">
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<div class="form row">
												<div class="form-group col-xl-12 col-lg-12  col-md-12 mb-0">
													<div class="row no-gutters bg-white br-2">
														<div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
															<input type="text" class="form-control border-0" id="txtbuscar" placeholder="Escribe tu Busqueda Aquí" onkeypress="validar(event)">
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

		<!--Add listing-->
		<section class="sptb">
			<div class="container">
				<div class="row">
					<!--Left Side Content-->
					<div class="col-xl-3 col-lg-4 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Categorías</h3>
							</div>
							<div class="card-body">
								<div class="" id="container">
									<div class="filter-product-checkboxs">
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox1" value="Hombres">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Hombres<span class="label label-secondary float-right" id="catHombres"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox2" value="Mujeres">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Mujeres<span class="label label-secondary float-right" id="catMujeres"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox3" value="LGBT">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">LGBT<span class="label label-secondary float-right" id="catLGBT"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox4" value="Swinger">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Swinger<span class="label label-secondary float-right" id="catSwinger"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox5" value="Hoteles">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Hoteles<span class="label label-secondary float-right" id="catHoteles"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox6" value="ClubesNocturnos">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Clubes Nocturnos<span class="label label-secondary float-right" id="catClub"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="JuguetesSexuales">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Juguetes Sexuales<span class="label label-secondary float-right" id="catJug"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox8" value="Vehiculos">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Vehículos<span class="label label-secondary float-right" id="catVeh"></span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox9" value="Energizantes">
											<span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">Energizantes<span class="label label-secondary float-right" id="catEner"></span></a>
											</span>
										</label>
									</div>
								</div>
							</div>
							<div class="card-header border-top">
								<h3 class="card-title">Rango de Precios</h3>
							</div>
							<div class="card-body">
								<h6>
								   <input type="text" id="price">
								</h6>
								<div id="mySlider"></div>
								<br>
								<button class="btn btn-primary" id="button1Func" onclick="rangoPrecioVehiculos()" >Rango de Precios Mayor</button>
								<button class="btn btn-primary" id="button2Func" onclick="rangoPrecioNormal()" style="display:none;">Rango de Precio Menor</button>
							</div>
							<div class="card-header border-top">
								<h3 class="card-title">Ciudades</h3>
							</div>
							<div class="card-body" id="cardCiudades">		
							</div>
							<br>	
							<div class="card-header border-top">
								<h3 class="card-title">Ordenar Por</h3>
							</div>
							<div class="card-body">
							<div class="form-check ">
							<input class="form-check-input" type="radio" name="ordenFilters" id="inlineRadio1" value="fecha">
							<label class="form-check-label" for="inlineRadio1">Fecha de Publicación</label>
							</div>
							<div class="form-check ">
                    		<input class="form-check-input" type="radio" name="ordenFilters" id="inlineRadio2" value="likes">
                    		<label class="form-check-label" for="inlineRadio2">Likes</label>
							</div>
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-secondary btn-block" onclick="GenerarFiltros()">Aplicar Filtros</button>
							</div>
						</div>
					</div>
					<!--/Left Side Content-->

					<div class="col-xl-9 col-lg-8 col-md-12">
						<!--Add Lists-->
						<div class="card mb-0">
							<div class="card-body">
								<div class="item2-gl ">
									<div class="tab-content">
										<div  id="anuncios">

										</div>
									</div>
								</div>
								<div class="center-block text-center" id="chargeMore">
									<button class="btn btn-dark" onclick="UnionDatos()">Cargar Más Anuncios</button>
								</div>
								<div class="ajax-load text-center" id="ajax-load" style="display:none;">
    							<p  style="color:white"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Cargando Más Anuncios</p>
								</div>
							</div>
						</div>
						<!--/Add Lists-->
						<div id="cantidadTotal" style="display:none;"></div>
					</div>
				</div>
			</div>
		</section>
		<!--/Add Listing-->
<?php require_once("../PinParts/footer.php");?>
<script> 
TraerAnuncios();
traerCiudades();
cantidadCategorias();
</script>