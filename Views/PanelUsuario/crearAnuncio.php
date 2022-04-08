<?php 
require_once("../PinPartsUsuario/headerUsuario.php");
require_once("../PinPartsUsuario/asideUsuario.php");
if(empty($_GET['categoria'])){
    echo '<script>window.location.href = "../PanelUsuario/"</script>';
}else{
    if($_GET['categoria']==1){
        $input=1;
    }else if($_GET['categoria']==2){
        $input=2;
    }else if($_GET['categoria']==3){
        $input=3;
    }else if($_GET['categoria']==4){
        $input=4;
    }else if($_GET['categoria']==5){
        $input=5;
    }else if ($_GET['categoria']==6){
        $input=6;
    }else if($_GET['categoria']==7){
        $input=7;
    }else if($_GET['categoria']==8){
        $input=8;
    }else if($_GET['categoria']==9){
        $input=9;
    }else{
        echo '<script>window.location.href = "../PanelUsuario/"</script>'; 
    }
}
?>
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
					<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title" id="txtCatedDes"></h3>
							</div>
							<div class="card-body">
                <form id="datosPublicacion">
								<div class="row">
									<div class="col-md-6" data-select2-id="119">
                <input type="hidden" id="txtCategoria" name="txtCategoria" value="<?=$input?>">
                <div class="form-group">
                 <label for="">Nombre del Anuncio</label>
                 <input class="form-control" id="txtNombreAnuncio" name="txtNombreAnuncio" placeholder="Nombre de la persona que anuncia" type="text" onfocusout="validarNombreAnuncio()">
                <span id="spanNombreAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group">
                  <label id="precioGeneral">Precio</label>
                 <input class="form-control" type="number" id="txtPrecioAnuncio" name="txtPrecioAnuncio" placeholder="Precio del Anuncio" onfocusout="validarPrecioAnuncio()">
                 <span id="spanPrecioAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group">
                  <label>Descripción</label>
                 <textarea class="form-control" id="txtDescripcionAnuncio" name="txtDescripcionAnuncio" cols="30" rows="4" onfocusout="validarDescripcionAnuncio()"></textarea>
                 <span id="spanDescripcionAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divcomboBoxPais">
                  <label>País</label>
                </div>
                <div class="form-group" id="divcomboBoxProvincia">
                  <label>Provincia</label>
                  <select disabled class="form-control" name="txtDistrito" id="txtProvincias">
                    <option value="0">Seleccione la Provincia</option>
                  </select>
                </div>
                <div class="form-group" id="divcomboBoxDistrito">
                  <label>Distrito</label>
                  <select disabled class="form-control" name="txtDistrito" id="txtDistrito">
                    <option value="0">Seleccione el Distrito</option>
                  </select>
                </div>
                <div class="form-group" id="divNacionalidadAnuncio">
                  <label>Nacionalidad</label>
                 <input class="form-control" type="text" id="txtNacionalidadAnuncio" name="txtNacionalidadAnuncio" placeholder="Nacionalidad de la persona anunciada" onfocusout="validarNacionalidad()">
                 <span  id="spanNacionalidadAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" >
                  <label>Cantidad de Fotos</label>
                  <input type="number" id="txtCantidadFotos" onfocusout="validarCantidadFotos()" name="txtCantidadFotos" class="form-control" placeholder="Escriba la cantidad de Fotos a subir">
                  <span id="spanCantidadFotos" style="display:none;"></span>
                  <br>
                  <button type="button" class="btn btn-danger" onclick="modalFotos()">Subir Fotos</button>
                  <div class="modal fade" id="modalFotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-body">
                        <div class="greid" id="divFoto1">
                          <div>
                        <span class="mi-archivo">
                            <input type="file" class="nuestroinputs" accept="image/png, image/jpeg, image/jpeg, image/webp"  name="nuestroinput[]" id="file1">
                          </span>
                          <label for="file1">
                            <span>Sube la Imagen 1</span>
                          </label>
                          </div>
                          <div id="insert1"></div>
                        </div>
                        <hr id="hr1">
                        <div class="greid" id="divFoto2">
                          <div>
                        <span class="mi-archivo">
                            <input type="file" class="nuestroinputs" accept="image/png, image/jpeg, image/jpeg, image/webp" name="nuestroinput[]" id="file2">
                          </span>
                          <label for="file2">
                            <span>Sube la Imagen 2</span>
                          </label>
                          </div>
                          <div id="insert2"></div>
                        </div>
                        <hr id="hr2">
                        <div class="greid" id="divFoto3">
                          <div>
                        <span class="mi-archivo">
                            <input type="file" class="nuestroinputs" accept="image/png, image/jpeg, image/jpeg, image/webp" name="nuestroinput[]" id="file3">
                          </span>
                          <label for="file3">
                            <span>Sube la Imagen 3</span>
                          </label>
                          </div>
                          <div id="insert3"></div>
                        </div>
                        <hr id="hr3">
                        <div class="greid" id="divFoto4">
                          <div>
                        <span class="mi-archivo">
                            <input type="file" class="nuestroinputs" accept="image/png, image/jpeg, image/jpeg, image/webp" name="nuestroinput[]" id="file4">
                          </span>
                          <label for="file4">
                            <span>Sube la Imagen 4</span>
                          </label>
                          </div>
                          <div id="insert4"></div>
                        </div>
                        <hr id="hr4">
                        <div class="greid" id="divFoto5">
                          <div>
                        <span class="mi-archivo">
                            <input type="file" class="nuestroinputs" accept="image/png, image/jpeg, image/jpeg, image/webp" name="nuestroinput[]" id="file5">
                          </span>
                          <label for="file5">
                            <span>Sube la Imagen 5</span>
                          </label>
                          </div>
                          <div id="insert5"></div>
                        </div>                    
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="limpiarFotos()">Quitar Fotos</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" data-select2-id="132">
              <div class="form-group">
              <label >Ubicación</label><br>
                <button class="btn btn-warning" type="button" onclick="AbrirUbicacion()">Click para abrir Mapa</button>
                <br>
                <span id="spanUbicacion" style="display:none;"></span>
                <div class="modal fade" id="ModalUbicacionGeo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <input type="hidden" id="valorSaveMapa" value="0" >
                      Dirección de destino: <input readonly class="form-control" type="text" name="direccion" id="direccion"  />
                      <br/>
                      Coordenadas: <input readonly class="form-control" type="text" id="coordenadas"  />
                      <br/>
                      <input type="hidden" id="txtLatitud" name="txtLatitud">
                      <input type="hidden" id="txtLongitud" name="txtLongitud">
                      <span id="geocoding" style="display:none;"></span>
                      <div id="map_canvas" style="width:100%; height:350px"></div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="guardarCambiosMapa()">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelarMapa()">Cancelar </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="divAforo" style="display:none">
                  <label>Aforo</label>
                 <input class="form-control" id="txtAforoAnuncio" name="txtAforoAnuncio" value="0" type="number" placeholder="Especifique la Cantidad de Personas Máximas" onfocusout="validarAforoAnuncio()">
                  <span  id="spanAforoAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divPreferencia" style="display:none;">
                 <label for="">Preferencia Sexual</label>
               <select class="form-control" name="txtPreferencia" id="txtPreferencia" onfocusout="validarPreferencia()">
               <option value="0">Seleccióna una Opción</option>
                 <option value="Hombres">Hombres</option>
                 <option value="Mujeres">Mujeres</option>
                 <option value="Parejas">Parejas</option>
                 <option value="Ambos">Ambos</option>
               </select>
                <span id="spanPreferenciaSexual" style="display:none;"></span>
                </div>
              <div class="form-group" id="divAlturaAnuncio">
                  <label>Altura</label>
                 <input class="form-control" id="txtAlturaAnuncio" name="txtAlturaAnuncio" type="number" placeholder="Especifique la Altura" onfocusout="validarAlturaAnuncio()">
                <span  id="spanAlturaAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divMedidasAnuncio">
                  <label id="MedidasGeneral">Medidas</label>
                 <input class="form-control" id="txtMedidasAnuncio" name="txtMedidasAnuncio" type="text" placeholder="Especifique el tamaño del miembro" onfocusout="ValidarMedidasAnuncio()">
                 <span  id="spanMedidasAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divEdadAnuncio">
                  <label id="labelEdad">Edad</label>
                 <input class="form-control" type="number" id="txtEdadAnuncio" name="txtEdadAnuncio" placeholder="Especifique la edad" onfocusout="validarEdadAnuncio()">
                 <span  id="spanEdadAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divColorAnuncio">
                  <label>Color de Piel</label>
                 <select class="form-control"  name="txtColorAnuncio" id="txtColorAnuncio" onfocusout="validarColorAnuncio()">
                 <option value="0">Seleccione un color de Piel</option>
                   <option value="Blanca">Blanca</option>
                   <option value="Rosado">Rosado</option>
                   <option value="Rojiza">Rojiza</option>
                   <option value="MorenaClara">Morena Clara</option>
                   <option value="Morena">Morena</option>
                 </select>
                 <span  id="spanColorAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group" id="divHorasAnuncio">
                  <label>Horas</label>
                 <input class="form-control" name="txtHorasAnuncio" id="txtHorasAnuncio" type="number" placeholder="Disponibilidad de horas al día" onfocusout="validarHorasAnuncio()">
                 <span id="spanHorasAnuncio" style="display:none;"></span>
                </div>
                <div class="form-group">
                <div class="form-group">
                  <label>Días</label>
                  <input type="hidden" id="txtDiasAnuncio" name="txtDiasAnuncio">
                  <div class="select2-purple">
                    <select class="select2" id="selectDias" name="selectDias" multiple="multiple" data-placeholder="Eliga su disponiblidad en Días" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <option value="Todos">Todos los Días</option>
                      <option value="Lun">Lunes</option>
                      <option value="Mar">Martes</option>
                      <option value="Mier">Miércoles</option>
                      <option value="Jue">Jueves</option>
                      <option value="Vie">Viernes</option>
                      <option value="Sab">Sabado</option>
                      <option value="Dom">Domingo</option>
                    </select>
                    <span id="spanDias" style="display:none;"></span>  
                  </div>
                </div>
                </div>
                    <div class="form-group">
                    <label>Número de Contacto</label>
                    <input class="form-control" id="txtCelularAnuncio" name="txtCelularAnuncio" type="number" placeholder="Especifique su número de celular" onfocusout="validarNumeroContacto()">
                    <span id="spanCelularAnuncio" style="display:none;"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Su telefono tiene Whatsapp?</label>
                    <br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioWatsapp" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioWatsapp" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <br>
                    <span id="spanWatsapp" style="color:red;display:none;">Debes Seleccionar una Opción</span>
                    </div>
                        </div>
                                </div>
                                </form>
							</div>
							<div class="card-footer">
								<button type="button"  id="btnPublicar" class="btn btn-primary" >Publicar Anuncio</button>
							</div>
						</div>
					</div>
				</div>
			</div>
    </section>
						
<?php require_once("../PinPartsUsuario/footerUsuario.php")?>
<script>
InicializadorPublicacionCrear();
document.getElementById("file1").onchange = function(e) {
    let reader = new FileReader()
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
      let preview = document.getElementById('insert1'),
              image = document.createElement('img');
              image.style.height = "95px";
              image.style.width = "75%";
              image.id = "imagenPreview1";
      image.src= reader.result;
      preview.innerHTML = '';
      preview.append(image);
      
    };
    
  }
  document.getElementById("file2").onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
      let preview = document.getElementById('insert2'),
              image = document.createElement('img');
              image.style.height = "95px";
              image.style.width = "75%";
              image.id = "imagenPreview2";
      image.src= reader.result;
      preview.innerHTML = '';
      preview.append(image);
      
    };
  }
  document.getElementById("file3").onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
      let preview = document.getElementById('insert3'),
              image = document.createElement('img');
              image.style.height = "95px";
              image.style.width = "75%";
              image.id = "imagenPreview3";
      image.src= reader.result;
      preview.innerHTML = '';
      preview.append(image);   
    };
  }
  document.getElementById("file4").onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
      let preview = document.getElementById('insert4'),
              image = document.createElement('img');
              image.style.height = "95px";
              image.style.width = "75%";
              image.id = "imagenPreview4";
      image.src= reader.result;
      preview.innerHTML = '';
      preview.append(image);   
    };
  }
  document.getElementById("file5").onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
      let preview = document.getElementById('insert5'),
              image = document.createElement('img');
              image.style.height = "95px";
              image.style.width = "75%";
              image.id = "imagenPreview5";
      image.src= reader.result;
      preview.innerHTML = '';
      preview.append(image);    
    };
  }

</script>