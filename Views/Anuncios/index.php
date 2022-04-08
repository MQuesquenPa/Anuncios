<?php require_once("../PinParts/headerAnuncio.php");?>
<div class="banner-1 cover-image sptb-2 sptb-tab" data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner7.jpg" >
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white">
							<h1 class="mb-1" >Continua tu busqueda con Nosotros</h1>
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
		<section class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-12">
						<?=$content?>
						<!--/Classified Description-->

						<h3 class="mb-5 mt-4">Anuncios Relacionados</h3>

						<!--Related Posts-->
						<div id="myCarousel5" class="owl-carousel owl-carousel-icons3">
							<!-- Wrapper for carousel items -->
							
							<?=$relacionados?>
							
						
					
						</div>
                        <!--/Related Posts-->
					</div>

					<!--Right Side Content-->
					<div class="col-xl-4 col-lg-4 col-md-12">
					<div class="card">
            <div class="card-header">
                <h3 class="card-title">Localización</h3>
            </div>
            <div class="card-body">
                <div class="map-header">
                    <div class="map-header-layer" id="mapa"></div>
                </div>
            </div>
        </div>
					
						<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title">Anuncios Populares</h3>
							</div>
							<div class="card-body">
								<div class="rated-products">
									<ul class="vertical-scroll">
									<?=$likesAds?>
									</ul>
								</div>
							</div>
						</div>
						<br>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Anuncios que te pueden Interesar</h3>
							</div>
							<div class="card-body ">
								<ul class="vertical-scroll">
								<?=$populares?>
								</ul>
							</div>
						</div>

					</div>
					<!--/Right Side Content-->
				</div>
			</div>
		</section>
<?php require_once("../PinParts/footer.php");?>
<script>
CambiarTamanio();
$('.lazy').lazyload();
function initMap() {
          var map;
          var bounds = new google.maps.LatLngBounds();
          var mapOptions = {
              mapTypeId: 'roadmap'
          };

          map = new google.maps.Map(document.getElementById('mapa'), {
              mapOptions
          });

          map.setTilt(50);

          // Crear múltiples marcadores desde la Base de Datos 
          var marcadores = [
              ['<?=$direccion?>','<?=$latitud?>','<?=$longitud?>']
          ];

          // Creamos la ventana de información para cada Marcador
          var ventanaInfo = [
            ['<div class="info_content">' + '<h3><?php echo "Direccion Anuncio"; ?></h3>' + '<p><?php echo $direccion; ?></p>' + '</div>']
          ];

          // Creamos la ventana de información con los marcadores 
          var mostrarMarcadores = new google.maps.InfoWindow(),
              marcadores, i;

          // Colocamos los marcadores en el Mapa de Google 
          for (i = 0; i < marcadores.length; i++) {
              var position = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);
              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  title: marcadores[i][0]
              });

              // Colocamos la ventana de información a cada Marcador del Mapa de Google 
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                      mostrarMarcadores.setContent(ventanaInfo[i][0]);
                      mostrarMarcadores.open(map, marker);
                  }
              })(marker, i));

              // Centramos el Mapa de Google para que todos los marcadores se puedan ver 
              map.fitBounds(bounds);
          }

          // Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, también le configramos un zoom de 14 
          var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
              this.setZoom(19);
              google.maps.event.removeListener(boundsListener);
          });

      }

      // Lanzamos la función 'initMap' para que muestre el Mapa con Los Marcadores y toda la configuración realizada 
      google.maps.event.addDomListener(window, 'load', initMap);
</script>