
function InicializadorPublicacionCrear(){
    $('.select2').select2()
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
  recargarComboBoxPaises();
  validarCategoriaDocumento();
  traerPublicaciones();
  }
    
  function validarCategoriaDocumento(){
    let valort=$('#txtCategoria').val();
    if(valort==1){
        $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Hombres");
    }else if(valort==2){
        $('#MedidasGeneral').text("Medidas");
        $('#txtMedidasAnuncio').attr("placeholder", "Este es el formate base 90-60-90");
        $('#precioGeneral').text("Precio");
        $('#txtPrecioAnuncio').attr("placeholder", "Precio del Anuncio");
        $('#divPreferencia').hide();
        $('#divAlturaAnuncio').show();
        $('#divEdadAnuncio').show();
        $('#divColorAnuncio').show();
        $('#divAforo').hide();
        $('#txtNacionalidadAnuncio').attr("placeholder","Nacionalidad de la persona anunciada");
        $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Mujeres");
    }else if(valort==3){
        $('#MedidasGeneral').text("Tipo de Medida");
          $('#txtMedidasAnuncio').attr("placeholder", "Especifique su medida o medidas");
          $('#precioGeneral').text("Precio");
          $('#txtPrecioAnuncio').attr("placeholder", "Precio del Anuncio");
          $('#divPreferencia').show();
          $('#divAlturaAnuncio').show();
          $('#divEdadAnuncio').show();
          $('#divColorAnuncio').show();
          $('#divAforo').hide();
          $('#txtNacionalidadAnuncio').attr("placeholder","Nacionalidad de la persona anunciada");
          $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría LGBT");
    }else if(valort==4){
          $('#txtPrecioAnuncio').attr("placeholder", "Si es gratis solo debe poner 0");  
          $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Swinger");
          let todo='<div class="form-group" id="divColorAnuncio"><label>Soy/Somos</label><select class="form-control"  name="txtColorAnuncio" id="txtColorAnuncio" onfocusout="validarColorAnuncio()"><option value="0">--Seleccione su Sexo o si es una pareja--</option><option value="Hombre">Hombre</option><option value="Mujer">Mujer</option><option value="Trans">Trans</option><option value="Gay">Gay</option><option value="Pareja">Pareja</option></select><span  id="spanColorAnuncio" style="display:none;"></span></div>';
          $('#divColorAnuncio').remove();
          $('#txtCategoria').before(todo);
          $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
          $('#divPreferencia').remove();
          let nust='<div class="form-group" id="divPreferencia" style="display:none;"><label for="">Preferencia Sexual</label><select class="form-control" name="txtPreferencia" id="txtPreferencia" onfocusout="validarPreferencia()"><option value="0">Seleccióna una Opción</option><option value="Hombres">Hombres</option><option value="Mujeres">Mujeres</option><option value="Parejas">Parejas</option><option value="Trío">Trío</option><option value="Orgía">Orgía</option><option value="Intercambios">Intercambios</option><option value="Intercambios">Fiesta</option></select><span id="spanPreferenciaSexual" style="display:none;"></span></div>';
          $('#divAforo').after(nust);
          $('#divPreferencia').show();
          $('#divAlturaAnuncio').hide();
          $('#divMedidasAnuncio').hide();
          $('#txtEdadAnuncio').attr("placeholder","Especifique la Edad de la persona que anuncia");
    }else if(valort==5){
      $('#MedidasGeneral').text("Tamaño del Lugar");
      $('#txtMedidasAnuncio').attr("placeholder", "Escribalo en metros por favor");
      $('#precioGeneral').text("Precio Entrada");
      $('#txtPrecioAnuncio').attr("placeholder", "Si es gratis solo debe poner 0");
      $('#divPreferencia').hide();
      $('#divAlturaAnuncio').hide();
      $('#divEdadAnuncio').hide();
      $('#divColorAnuncio').hide();
      $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
      $('#txtNacionalidadAnuncio').attr("placeholder","Nacionalidad del lugar anunciado");
      $('#divAforo').show();
      $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Hoteles");
    }else if(valort==6){
      $('#MedidasGeneral').text("Tamaño del Lugar");
      $('#txtMedidasAnuncio').attr("placeholder", "Escribalo en metros por favor");
      $('#precioGeneral').text("Precio Entrada");
      $('#txtPrecioAnuncio').attr("placeholder", "Si es gratis solo debe poner 0");
      $('#divPreferencia').hide();
      $('#divAlturaAnuncio').hide();
      $('#divEdadAnuncio').hide();
      $('#divColorAnuncio').hide();
      $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
      $('#txtNacionalidadAnuncio').attr("placeholder","Nacionalidad del lugar anunciado");
      $('#divAforo').show();
      $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Clubes Nocturnos");
    }else if(valort==7){
      $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Juguetes Sexuales");
      $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
      $('#divNacionalidadAnuncio').hide();
      $('#divAlturaAnuncio').hide();
      $('#divMedidasAnuncio').hide();
      $('#divEdadAnuncio').hide();
      $('#divColorAnuncio').hide();
    }else if(valort==8){
      $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Vehículos");
      $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
      let todo='<div class="form-group" id="divColorAnuncio"><label>Tipo</label><select class="form-control"  name="txtColorAnuncio" id="txtColorAnuncio" onfocusout="validarColorAnuncio()"><option value="0">--Selecciona lo que deseas vender--</option><option value="Autos">Autos</option><option value="Camionetas">Camionetas</option><option value="Motos">Motos</option><option value="Accesorios">Accesorios</option><option value="Servicios">Servicios</option></select><span  id="spanColorAnuncio" style="display:none;"></span></div>';
      $('#divColorAnuncio').remove();
      $('#txtCategoria').before(todo);
      $('#divNacionalidadAnuncio').hide();
      $('#divAlturaAnuncio').hide();
      $('#labelEdad').text("Año");
      $('#txtEdadAnuncio').attr("placeholder","Especifique el año del Vehículo");
      $('#MedidasGeneral').text("Marca");
      $('#txtMedidasAnuncio').attr("placeholder","Especifique la Marca del Vehículo");
    }else if(valort==9){
      $('#txtCatedDes').text("Estas Creando un Anuncio para la Categoría Energizantes");
      $('#txtNombreAnuncio').attr("placeholder","Titulo de su Anuncio");
      $('#divNacionalidadAnuncio').hide();
      $('#divAlturaAnuncio').hide();
      $('#divMedidasAnuncio').hide();
      $('#divEdadAnuncio').hide();
      $('#divColorAnuncio').hide();
    }
  }
  


  
  
  
  function AbrirUbicacion(){
    let valorModal=$('#valorSaveMapa').val();
    if(valorModal==0){
    $('#ModalUbicacionGeo').modal("show");
    cargarMapa();
    $('#direccion').val("");
    $('#coordenadas').val("");
    }else{
    $('#ModalUbicacionGeo').modal("show");
    }
  }
  
  function guardarCambiosMapa(){
    let valor1=$('#coordenadas').val();
    let valor2=$('#direccion').val();
    if(valor1=="" || valor2==""){
      Swal.fire({
        position: 'bottom-center',
        icon: 'error',
        title: 'Debes seleccionar tu ubicación para guardar los cambios',
        showConfirmButton: false,
        timer: 2200
      });
    }else{
      $('#valorSaveMapa').val(1);
      $('#ModalUbicacionGeo').modal("hide");
      let texto=$('#coordenadas').val();
      let arraysCoordenadas=texto.split(",");
      let desire=arraysCoordenadas[0].split("(");
      let lanqued=arraysCoordenadas[1].split(")");
      $('#txtLatitud').val(desire[1]);
      $('#txtLongitud').val(lanqued[0]);
    }
  }
  
  function cancelarMapa(){
    $('#valorSaveMapa').val(0);
    $('#ModalUbicacionGeo').modal("hide");
  }
  
  function cargarMapa(){
    var map;
    var geocoder;
    var infoWindow;
    var marker;
    var latitud=$('#latitudUsuario').val()
    var longitud=$('#longitudUsuario').val();
  var latLng = new google.maps.LatLng(latitud,longitud);
  var opciones = {
  center: latLng,
  zoom: 10,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  var map = new google.maps.Map(document.getElementById('map_canvas'), opciones);
      geocoder = new google.maps.Geocoder();
      infowindow = new google.maps.InfoWindow();
  
      google.maps.event.addListener(map, 'click', function(event) {
        geocoder.geocode(
            {'latLng': event.latLng},
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                  document.getElementById('direccion').value = results[0].formatted_address;
                  document.getElementById('coordenadas').value = results[0].geometry.location;
                  if (marker) {
                    marker.setPosition(event.latLng);
                  } else {
                    marker = new google.maps.Marker({
                       position: event.latLng,
                       map: map});
                  }
                  infowindow.setContent(results[0].formatted_address+'<br/> Coordenadas: '+results[0].geometry.location);
                  infowindow.open(map, marker);
                } else {
                  document.getElementById('geocoding').innerHTML =
                      'No se encontraron resultados';
                }
              } else {
                document.getElementById('geocoding').innerHTML =
                    'Geocodificación  ha fallado debido a: ' + status;
              }
            });
      });
        
    }
  
  
  function recargarComboBoxPaises(){
      $.ajax({
        method: "GET",
        url: "../../Controllers/publicaciones_controller.php?action=comboBoxPais",
        success: function(data){
          $('#divcomboBoxPais').append(data);
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el registro");
        },
    });
  }
  function recargarComboBoxCategoria(){
    $.ajax({
      method: "GET",
      url: "../../Controllers/publicaciones_controller.php?action=comboBoxCategorias",
      success: function(data){
        $('#divComboBoxCategoría').append(data);
      },error: function(){
          alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el registro");
      },
  });
  }

  
  function validarComboBoxPaises(){
    let valor=$('#txtPaises').val();
    if(valor==0){
      $('#txtProvincias').remove();
      $('#txtDistrito').remove();
      $('#spanDistrito').remove(); 
      $('#spanProvincias').remove(); 
      $('#txtPaises').css("border-color","red");
      $('#spanPaises').text("Debes elegir un País para continuar");
      $('#spanPaises').css("color","red");
      $('#spanPaises').show(); 
      return false;
    }else{
        $('#spanProvincias').remove();
      $('#txtProvincias').remove();
      $('#spanPaises').hide(); 
      $('#txtPaises').css("border-color","gray");
      $.ajax({
        method: "POST",
        url: "../../Controllers/publicaciones_controller.php?action=comboBoxProvincias",
        data: {pais: valor},
        success: function(data){
          $('#divcomboBoxProvincia').append(data);
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el registro");
        },
    });
      return true;
    }
  }
  
  function validarComboBoxProvincias(){
    let valor=$('#txtProvincias').val();
    if(valor==0){
      $('#txtDistrito').remove();
      $('#spanDistrito').remove(); 
      $('#txtProvincias').css("border-color","red");
      $('#spanProvincias').text("Debes elegir una Provincia para continuar");
      $('#spanProvincias').css("color","red");
      $('#spanProvincias').show(); 
      return false;
    }else{
      $('#txtDistrito').remove();
      $('#spanDistrito').remove(); 
      $('#spanProvincias').hide(); 
      $('#txtProvincias').css("border-color","gray");
      $.ajax({
        method: "POST",
        url: "../../Controllers/publicaciones_controller.php?action=comboBoxDistrito",
        data: {ciudad: valor},
        success: function(data){
          $('#divcomboBoxDistrito').append(data);
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el registro");
        },
    });
      return true;
    }
  }
  
  function validarComboBoxDistrito(){
    let valor=$('#txtDistrito').val();
    if(valor==0){
      $('#txtDistrito').css("border-color","red");
      $('#spanDistrito').text("Debes elegir un Distrito para continuar");
      $('#spanDistrito').css("color","red");
      $('#spanDistrito').show(); 
      return false;
    }else{
      $('#txtDistrito').css("border-color","gray");
      $('#spanDistrito').hide(); 
      return true;
    }
  }
  
  function modalFotos(){
    if(validarCantidadFotos()==false){
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Verifique la cantidad de fotos por favor',
        showConfirmButton: false,
        timer: 2500
      })
    }else{
      let cantFoto=$('#txtCantidadFotos').val();
      if(cantFoto==1){
        $('#divFoto1').show();
        $('#divFoto2').hide();
        $('#divFoto3').hide();
        $('#divFoto4').hide();
        $('#divFoto5').hide();
        $('#hr1').hide();
        $('#hr2').hide();
        $('#hr3').hide();
        $('#hr4').hide();
        $('#modalFotos').modal("show");
      }else if(cantFoto==2){
        $('#divFoto1').show();
        $('#divFoto2').show();
        $('#divFoto3').hide();
        $('#divFoto4').hide();
        $('#divFoto5').hide();
        $('#hr1').show();
        $('#hr2').hide();
        $('#hr3').hide();
        $('#hr4').hide();
        $('#modalFotos').modal("show");
      }else if(cantFoto==3){
        $('#divFoto1').show();
        $('#divFoto2').show();
        $('#divFoto3').show();
        $('#divFoto4').hide();
        $('#divFoto5').hide();
        $('#hr1').show();
        $('#hr2').show();
        $('#hr3').hide();
        $('#hr4').hide();
        $('#modalFotos').modal("show");
      }else if(cantFoto==4){
        $('#divFoto1').show();
        $('#divFoto2').show();
        $('#divFoto3').show();
        $('#divFoto4').show();
        $('#divFoto5').hide();
        $('#hr1').show();
        $('#hr2').show();
        $('#hr3').show();
        $('#hr4').hide();
        $('#modalFotos').modal("show");
      }else if(cantFoto==5){
        $('#divFoto1').show();
        $('#divFoto2').show();
        $('#divFoto3').show();
        $('#divFoto4').show();
        $('#divFoto5').show();
        $('#hr1').show();
        $('#hr2').show();
        $('#hr3').show();
        $('#hr4').show();
        $('#modalFotos').modal("show");
      }else{
        alert("Tratas de Ingresar mas valores,lamentablemente no se puede por el momento");
      }
      
    }
  }
  
  function validarCantidadFotos(){
    let valor=$('#txtCantidadFotos').val();
    if(valor==""){
      $('#txtCantidadFotos').css("border-color","red");
      $('#spanCantidadFotos').text("Debes de especificar un valor");
      $('#spanCantidadFotos').css("color","red");
      $('#spanCantidadFotos').show(); 
        return false;
      }else if(valor<0 || valor>5){
        $('#txtCantidadFotos').css("border-color","red");
        $('#spanCantidadFotos').text("La cantidad de fotos debe ser menor a 5");
        $('#spanCantidadFotos').css("color","red");
        $('#spanCantidadFotos').show(); 
        return false;
      }else{
        $('#txtCantidadFotos').css("border-color","gray");
      $('#spanCantidadFotos').hide(); 
        return true;
      }
  }

  function validarImagin(){
    if($('#imagenPreview1').length){
      $('#txtCantidadFotos').css("border-color","gray");
      $('#spanCantidadFotos').hide(); 
        return true;
    }else{
      $('#txtCantidadFotos').css("border-color","red");
      $('#spanCantidadFotos').text("No has subido ninguna imagen,haz click en Subir Fotos");
      $('#spanCantidadFotos').css("color","red");
      $('#spanCantidadFotos').show(); 
      return false;
    }
  }
  
  function limpiarFotos(){
    $('#imagenPreview1').attr("style","width:0px");
    $('#imagenPreview2').attr("style","width:0px");
    $('#imagenPreview3').attr("style","width:0px");
    $('#imagenPreview4').attr("style","width:0px");
    $('#imagenPreview5').attr("style","width:0px");
    $('#modalFotos').modal("hide");
  }
  
  
  function validarNombreAnuncio(){
   let valor=$('#txtNombreAnuncio').val();
   if(valor==""){
    $('#txtNombreAnuncio').css("border-color","red");
    $('#spanNombreAnuncio').text("No puedes dejar vacio el campo Nombre");
    $('#spanNombreAnuncio').css("color","red");
    $('#spanNombreAnuncio').show(); 
    return false;
   }else if(valor.length>40){
    $('#txtNombreAnuncio').css("border-color","red");
    $('#spanNombreAnuncio').text("El titulo no puede contener más de 40 caracteres");
    $('#spanNombreAnuncio').css("color","red");
    $('#spanNombreAnuncio').show(); 
    return false;
   }else{
    $('#txtNombreAnuncio').css("border-color","gray");
    $('#spanNombreAnuncio').hide(); 
      return true;  
   }
  }
  
  function validarPrecioAnuncio(){
    let valor=$('#txtPrecioAnuncio').val();
    if(valor==""){
     $('#txtPrecioAnuncio').css("border-color","red");
     $('#spanPrecioAnuncio').text("No puedes dejar vacio el campo Precio");
     $('#spanPrecioAnuncio').css("color","red");
     $('#spanPrecioAnuncio').show(); 
     return false;
    }else if(isNaN(valor)){
      $('#txtPrecioAnuncio').css("border-color","red");
      $('#spanPrecioAnuncio').text("Debes Ingresar un Número Valido");
      $('#spanPrecioAnuncio').css("color","red");
      $('#spanPrecioAnuncio').show(); 
      return false;
    }else{
     $('#txtPrecioAnuncio').css("border-color","gray");
     $('#spanPrecioAnuncio').hide(); 
       return true;  
    }
   }
  
   function validarDescripcionAnuncio(){
    let valor=$('#txtDescripcionAnuncio').val();
    if(valor==""){
     $('#txtDescripcionAnuncio').css("border-color","red");
     $('#spanDescripcionAnuncio').text("No puedes dejar vacio el campo Descripción");
     $('#spanDescripcionAnuncio').css("color","red");
     $('#spanDescripcionAnuncio').show(); 
     return false;
    }else if(valor.length>800){
      $('#txtDescripcionAnuncio').css("border-color","red");
      $('#spanDescripcionAnuncio').text("La descripción no puede contener mas de 800 caracteres");
      $('#spanDescripcionAnuncio').css("color","red");
      $('#spanDescripcionAnuncio').show(); 
      return false;
    }else{
     $('#txtDescripcionAnuncio').css("border-color","gray");
     $('#spanDescripcionAnuncio').hide(); 
       return true;  
    }
   }
  
  function validarAlturaAnuncio(){
    let valor=$('#txtAlturaAnuncio').val();
    if(valor==""){
     $('#txtAlturaAnuncio').css("border-color","red");
     $('#spanAlturaAnuncio').text("No puedes dejar vacio el campo Altura");
     $('#spanAlturaAnuncio').css("color","red");
     $('#spanAlturaAnuncio').show(); 
     return false;
    }else if(isNaN(valor)){
      $('#txtAlturaAnuncio').css("border-color","red");
      $('#spanAlturaAnuncio').text("Debes Ingresar un Número Valido");
      $('#spanAlturaAnuncio').css("color","red");
      $('#spanAlturaAnuncio').show(); 
      return false;
    }else if(valor>2.8){
      $('#txtAlturaAnuncio').css("border-color","red");
      $('#spanAlturaAnuncio').text("Debes Ingresar una altura valida");
      $('#spanAlturaAnuncio').css("color","red");
      $('#spanAlturaAnuncio').show(); 
      return false;
    }else{
     $('#txtAlturaAnuncio').css("border-color","gray");
     $('#spanAlturaAnuncio').hide(); 
       return true;  
    }
  }
  
  
  function ValidarMedidasAnuncio(){
    let categoria=$('#txtCategoria').val();
    let valor=$('#txtMedidasAnuncio').val();
    if(categoria==1 || categoria==3 || categoria==4 || categoria==5 || categoria==6 || categoria==8){
      if(valor==""){
        $('#txtMedidasAnuncio').css("border-color","red");
        $('#spanMedidasAnuncio').text("No puede dejar este campo vacío");
        $('#spanMedidasAnuncio').css("color","red");
        $('#spanMedidasAnuncio').show(); 
        return false;
       }else{
        $('#txtMedidasAnuncio').css("border-color","gray");
        $('#spanMedidasAnuncio').hide(); 
        return true;
       }
    }else if(categoria==2){
      if(valor==""){
        $('#txtMedidasAnuncio').css("border-color","red");
        $('#spanMedidasAnuncio').text("No puedes dejar vacio el campo Medidas");
        $('#spanMedidasAnuncio').css("color","red");
        $('#spanMedidasAnuncio').show(); 
        return false;
       }else if(valor.length<8 || valor.length>11){
        $('#txtMedidasAnuncio').css("border-color","red");
        $('#spanMedidasAnuncio').text("Debe seguir este ejemplo con los guiónes 90-60-80");
        $('#spanMedidasAnuncio').css("color","red");
        $('#spanMedidasAnuncio').show(); 
        return false;
       }else{
        $('#txtMedidasAnuncio').css("border-color","gray");
        $('#spanMedidasAnuncio').hide(); 
        return true;
       }
    }
  }
  
  function validarEdadAnuncio(){
    let plot=$('#txtCategoria').val();
    let valor=$('#txtEdadAnuncio').val();
    if(plot==8){
      if(valor==""){
        $('#txtEdadAnuncio').css("border-color","red");
        $('#spanEdadAnuncio').text("No puedes dejar vacio el campo Edad");
        $('#spanEdadAnuncio').css("color","red");
        $('#spanEdadAnuncio').show(); 
        return false;
       }else if( isNaN(valor)){
        $('#txtEdadAnuncio').css("border-color","red");
        $('#spanEdadAnuncio').text("Solo se permiten Números");
        $('#spanEdadAnuncio').css("color","red");
        $('#spanEdadAnuncio').show(); 
        return false;
       }else{
        $('#txtEdadAnuncio').css("border-color","gray");
        $('#spanEdadAnuncio').hide(); 
        return true;
       }
    }else{
      if(valor==""){
        $('#txtEdadAnuncio').css("border-color","red");
        $('#spanEdadAnuncio').text("No puedes dejar vacio el campo Edad");
        $('#spanEdadAnuncio').css("color","red");
        $('#spanEdadAnuncio').show(); 
        return false;
       }else if(valor<18){
        $('#txtEdadAnuncio').css("border-color","red");
        $('#spanEdadAnuncio').text("Debes de ser mayor de edad para anunciar");
        $('#spanEdadAnuncio').css("color","red");
        $('#spanEdadAnuncio').show(); 
        return false;
       }else if(valor>100 || isNaN(valor)){
        $('#txtEdadAnuncio').css("border-color","red");
        $('#spanEdadAnuncio').text("Debes de escribir una edad real");
        $('#spanEdadAnuncio').css("color","red");
        $('#spanEdadAnuncio').show(); 
        return false;
       }else{
        $('#txtEdadAnuncio').css("border-color","gray");
        $('#spanEdadAnuncio').hide(); 
        return true;
       }
    }   
  }
  
  function validarNacionalidad(){
    let valor=$('#txtNacionalidadAnuncio').val();
    if(valor==""){
     $('#txtNacionalidadAnuncio').css("border-color","red");
     $('#spanNacionalidadAnuncio').text("No puedes dejar vacio este campo");
     $('#spanNacionalidadAnuncio').css("color","red");
     $('#spanNacionalidadAnuncio').show(); 
     return false;
    }else{
     $('#txtNacionalidadAnuncio').css("border-color","gray");
     $('#spanNacionalidadAnuncio').hide(); 
       return true;  
    }
  }
  
  function validarColorAnuncio(){
    let valat=$('#txtCategoria').val();
    if(valat==4){
      let valor=$('#txtColorAnuncio').val();
      if(valor==0){
       $('#txtColorAnuncio').css("border-color","red");
       $('#spanColorAnuncio').text("Debes elegir una de las opciones disponibles");
       $('#spanColorAnuncio').css("color","red");
       $('#spanColorAnuncio').show(); 
       return false;
      }else{
       $('#txtColorAnuncio').css("border-color","gray");
       $('#spanColorAnuncio').hide(); 
         return true;  
      }
    }else if(valat==8){
      let valor=$('#txtColorAnuncio').val();
      if(valor==0){
       $('#txtColorAnuncio').css("border-color","red");
       $('#spanColorAnuncio').text("Debes elegir una de las opciones disponibles");
       $('#spanColorAnuncio').css("color","red");
       $('#spanColorAnuncio').show(); 
       return false;
      }else if(valor=="Servicios" || valor=="Accesorios"){
        $('#txtEdadAnuncio').val(0);
        $('#divEdadAnuncio').hide();
        $('#txtMedidasAnuncio').val("Ninguno");
        $('#divMedidasAnuncio').hide();
       $('#txtColorAnuncio').css("border-color","gray");
       $('#spanColorAnuncio').hide(); 
         return true;  
      }else{
        $('#divEdadAnuncio').show();
        $('#divMedidasAnuncio').show();
        $('#txtColorAnuncio').css("border-color","gray");
       $('#spanColorAnuncio').hide(); 
         return true;  
      }

    }else{
      let valor=$('#txtColorAnuncio').val();
      if(valor==0){
       $('#txtColorAnuncio').css("border-color","red");
       $('#spanColorAnuncio').text("Por favor elige un color");
       $('#spanColorAnuncio').css("color","red");
       $('#spanColorAnuncio').show(); 
       return false;
      }else{
       $('#txtColorAnuncio').css("border-color","gray");
       $('#spanColorAnuncio').hide(); 
         return true;  
      }
    }
  }

  function validarHorasAnuncio(){
    let valor=$('#txtHorasAnuncio').val();
    if(valor==""){
     $('#txtHorasAnuncio').css("border-color","red");
     $('#spanHorasAnuncio').text("Debes especificar un horario");
     $('#spanHorasAnuncio').css("color","red");
     $('#spanHorasAnuncio').show(); 
     return false;
    }else if(valor<0 || valor>24){
      $('#txtHorasAnuncio').css("border-color","red");
      $('#spanHorasAnuncio').text("El día solo contiene 24 horas");
      $('#spanHorasAnuncio').css("color","red");
      $('#spanHorasAnuncio').show(); 
      return false;
     }else{
     $('#txtHorasAnuncio').css("border-color","gray");
     $('#spanHorasAnuncio').hide(); 
       return true;  
    }
  }
  
  function validarNumeroContacto(){
    let valor=$('#txtCelularAnuncio').val();
    if(valor==""){
      $('#txtCelularAnuncio').css("border-color","red");
      $('#spanCelularAnuncio').text("Debes especificar un celular");
      $('#spanCelularAnuncio').css("color","red");
      $('#spanCelularAnuncio').show(); 
      return false;
    }else if(valor.length==9){
      $('#txtCelularAnuncio').css("border-color","gray");
     $('#spanCelularAnuncio').hide(); 
       return true;  
    }else{
      $('#txtCelularAnuncio').css("border-color","red");
      $('#spanCelularAnuncio').text("El celular que ingresaste no es valido");
      $('#spanCelularAnuncio').css("color","red");
      $('#spanCelularAnuncio').show(); 
      return false;
    }
  }
  
  function validarWatsapp(){
  let valor=$('input:radio[name=radioWatsapp]:checked').val();
  if(valor==null){
    $('#spanWatsapp').show();
    return false;
  }else{
    $('#spanWatsapp').hide();
    return true;
  }
  }
  
  $('#btnPublicar').on('click', function (event) {
let pronted=$('#txtCategoria').val();
if(pronted==1 || pronted==2){
    if( validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false || validarNacionalidad()==false || validarCantidadFotos()==false || validarImagin()==false || validarMapaGoogle()==false || validarAlturaAnuncio()==false || ValidarMedidasAnuncio()==false || validarEdadAnuncio()==false  || validarColorAnuncio()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
      Swal.fire({
        position: 'bottom-center',
        icon: 'info',
        title: 'Sigue las Indicaciones Por favor',
        showConfirmButton: false,
        timer: 1400
      });
    }else{
      enviarDatosFinal();
    }
}else if(pronted==3){
    if(  validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false || validarNacionalidad()==false || validarCantidadFotos()==false || validarImagin()==false|| validarMapaGoogle()==false || validarPreferencia()==false ||  validarAlturaAnuncio()==false || ValidarMedidasAnuncio()==false || validarEdadAnuncio()==false  || validarColorAnuncio()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
        Swal.fire({
          position: 'bottom-center',
          icon: 'info',
          title: 'Sigue las Indicaciones Por favor',
          showConfirmButton: false,
          timer: 1400
        });
      }else{
        enviarDatosFinal();
      }
}else if(pronted==4){
  if( validarColorAnuncio()==false || validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false || validarNacionalidad()==false || validarCantidadFotos()==false || validarImagin()==false || validarMapaGoogle()==false || validarPreferencia()==false || validarEdadAnuncio()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
    Swal.fire({
      position: 'bottom-center',
      icon: 'info',
      title: 'Sigue las Indicaciones Por favor',
      showConfirmButton: false,
      timer: 1400
    });
  }else{
    enviarDatosFinal();
  }

}else if(pronted==5 || pronted==6){
  if( validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false || validarNacionalidad()==false || validarCantidadFotos()==false || validarImagin()==false ||validarMapaGoogle()==false || validarAforoAnuncio()==false || ValidarMedidasAnuncio()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
    Swal.fire({
      position: 'bottom-center',
      icon: 'info',
      title: 'Sigue las Indicaciones Por favor',
      showConfirmButton: false,
      timer: 1400
    });
  }else{
    enviarDatosFinal();
  }

}else if(pronted==7 || pronted==9){
  if( validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false ||  validarCantidadFotos()==false || validarImagin()==false || validarMapaGoogle()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
    Swal.fire({
      position: 'bottom-center',
      icon: 'info',
      title: 'Sigue las Indicaciones Por favor',
      showConfirmButton: false,
      timer: 1400
    });
  }else{
    enviarDatosFinal();
  }
}else if(pronted==8){
  if(validarColorAnuncio()==false || validarNombreAnuncio()==false || validarPrecioAnuncio()==false || validarDescripcionAnuncio()==false || validarPaisAnun()==false || validarProvinciaAnun()==false || validarDistritoAnun()==false ||  validarCantidadFotos()==false || validarImagin()==false || validarMapaGoogle()==false || ValidarMedidasAnuncio()==false || validarEdadAnuncio()==false || validarHorasAnuncio()==false || validarDiasAnuncio()==false || validarNumeroContacto()==false || validarWatsapp()==false ){
    Swal.fire({
      position: 'bottom-center',
      icon: 'info',
      title: 'Sigue las Indicaciones Por favor',
      showConfirmButton: false,
      timer: 1400
    });
  }else{
    enviarDatosFinal();
  }
}
  });




  function enviarDatosFinal(){
    let daster=$('#selectDias').val();
    let cant=daster.join("-");
    $('#txtDiasAnuncio').val(cant);
  event.preventDefault();
  var datos = new FormData($("#datosPublicacion")[0]);
  $.blockUI({message:"Estamos Enviando los datos un momento Por favor.." ,css: { 
    border: 'none', 
    padding: '15px', 
    backgroundColor: '#000', 
    '-webkit-border-radius': '10px', 
    '-moz-border-radius': '10px', 
    opacity: .5, 
    color: '#fff' 
} }); 
  $.ajax({
      url: "../../Controllers/publicaciones_controller.php?action=registrarPublicacion",
      type: "POST",
      data: datos,
      contentType: false,
      processData: false,
      success: function(datos){
        alert(datos);
      },error: function(){
        $.unblockUI();
        Swal.fire({
          position: 'bottom-center',
          icon: 'error',
          title: 'La Petición no se Completo, intentalo más tarde',
          showConfirmButton: false,
          timer: 2200
        });
      }
    });
  }

function noTienesSaldo(){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'leg btn btn-success',
      cancelButton: 'leg btn btn-danger'
    },
    buttonsStyling: false
  })
      swalWithBootstrapButtons.fire({
        title: 'Actualmente no tienes más Anuncios',
        text: "Te recomendamos adquirir más",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Ir a Comprar Anuncios!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          alert("esas llendo a recargar");
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'No podras publicar hasta conseguir más',
            'error'
          )
        }
      })
}
  
  function validarPaisAnun(){
    let valor=$('#txtPaises').val();
    if(valor==0){
      $('#txtPaises').css("border-color","red");
      $('#spanPaises').text("Debes elegir un País para continuar");
      $('#spanPaises').css("color","red");
      $('#spanPaises').show(); 
      return false;
    }else{
      $('#spanPaises').hide(); 
      $('#txtPaises').css("border-color","gray");
      return true;
    }
  }
  
  function validarDistritoAnun(){
    let valor=$('#txtDistrito').val();
    if(valor==0){
      $('#txtDistrito').css("border-color","red");
      $('#spanDistrito').text("Debes elegir un Distrito para continuar");
      $('#spanDistrito').css("color","red");
      $('#spanDistrito').show(); 
      return false;
    }else{
      $('#txtDistrito').css("border-color","gray");
      $('#spanDistrito').hide(); 
      return true;
    }
  }
  
  function validarProvinciaAnun(){
    let valor=$('#txtProvincias').val();
    if(valor==0){
      $('#txtProvincias').css("border-color","red");
      $('#spanProvincias').text("Debes elegir una Provincia para continuar");
      $('#spanProvincias').css("color","red");
      $('#spanProvincias').show(); 
      return false;
    }else{
      $('#spanProvincias').hide(); 
      $('#txtProvincias').css("border-color","gray");
      return true;
    }
  }
  
  function validarDiasAnuncio(){
    let testArrays=$('#selectDias').val();
    if (Object.entries(testArrays).length === 0) {
      $('#spanDias').text("Debes de Seleccionar los días");
      $('#spanDias').css("color","red"); 
      $('#spanDias').show(); 
      return false;
    }else{
      $('#spanDias').hide(); 
      return true;
    }
  }
  
  
  function validarPreferencia(){
    let valor=$('#txtPreferencia').val();
    if(valor==0){
      $('#txtPreferencia').css("border-color","red");
      $('#spanPreferenciaSexual').text("Elige una de las Opciones para continuar");
      $('#spanPreferenciaSexual').css("color","red");
      $('#spanPreferenciaSexual').show(); 
      return false;
    }else{
      $('#spanPreferenciaSexual').hide(); 
      $('#txtPreferencia').css("border-color","gray");
      return true;
    }
  }
  
  function validarAforoAnuncio(){
    let valor=$('#txtAforoAnuncio').val();
    if(valor==0 || valor==""){
      $('#txtAforoAnuncio').css("border-color","red");
      $('#spanAforoAnuncio').text("Especifica cuantas personas pueden ingresar");
      $('#spanAforoAnuncio').css("color","red");
      $('#spanAforoAnuncio').show(); 
      $('#txtAlturaAnuncio').val(0);
      $('#txtEdadAnuncio').val(18);
      $('#txtColorAnuncio').val("Blanca");
      return false;
    }else{
      $('#spanAforoAnuncio').hide(); 
      $('#txtAforoAnuncio').css("border-color","gray");
      $('#txtAlturaAnuncio').val(0);
      $('#txtEdadAnuncio').val(18);
      $('#txtColorAnuncio').val("Blanca");
      return true;
    }
  }
  
  function validarMapaGoogle(){
    let valorCoordenadas=$('#coordenadas').val();
    let valorLugar=$('#direccion').val();
    let vLatitud = $('#txtLatitud').val();
    let vLongitud = $('#txtLongitud').val();
  if(valorCoordenadas=="" || valorLugar=="" || vLatitud =="" || vLongitud=="" ){
    $('#spanUbicacion').text("Debes seleccionar tu Ubicación");
    $('#spanUbicacion').css("color","red");
    $('#spanUbicacion').show(); 
    return false;
  }else{
    $('#spanUbicacion').hide(); 
    return true;
  }
  }