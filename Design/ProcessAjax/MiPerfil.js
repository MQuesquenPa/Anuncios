function abrirModalFoto(){
    $('#ModalFoto').modal("show");
}

function traerPublicaciones(){
    $.ajax({
      method: "GET",
      url: "../../Controllers/usuario_controller.php?action=traerPublicaciones",
      success: function(data){   
          $('#publicacionesCantidad').after(data);
      },error: function(){
         console.log("Error Publicaciones");
      },
  });
  }

  function validarImagenCambio(){
    if ($('#imagenPreview').length) {
        $('#spanImagenCambio').hide();
        return true;
      } else {
        $('#spanImagenCambio').css('color', 'white');
        $('#spanImagenCambio').show();
        return false;
      }
}


$('#btnCambiarFoto').on('click', function (event) {
    if(validarImagenCambio()==false){
        Swal.fire({
            position: 'bottom-center',
            icon: 'info',
            title: 'Debes elegir una Imagen Por favor',
            showConfirmButton: false,
            timer: 1400
          });
    }else{
        event.preventDefault();
        var datos = new FormData($("#datosFoto")[0]);
        $.ajax({
            url: "../../Controllers/usuario_controller.php?action=actualizarFoto",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function(datos){
                alert(datos);
            },error: function(){
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La Peticion que realizaste no se puede ejecutar',
                footer: 'Por Favor ponte en contacto con el soporte tecnico'
              });
            }  
        });  
      }  
});

function verEdad(){
    let valor= $('#txtEdadPanel').val();
    if(valor==0){
      $('#txtEdadPanel').val("");
     } 
  }
  
  function verTelefono(){
    let valor= $('#txtTelefonoPanel').val();
    if(valor==0){
      $('#txtTelefonoPanel').val("");
    }
  }
  
  function PaisUsuario(){
    let valor =$('#paisUser').val();
    $('#txtPaisPanel').val(valor);
  }

function InicializadorPerfil(){
    verEdad();
    verTelefono();
    PaisUsuario();
    traerPublicaciones();
}

function validarEdad(){
    let valor=$('#txtEdadPanel').val();
    if(valor==""){
      $('#spanEdad').hide();
      return true;
    }else if(valor>125 ){
      $('#spanEdad').text("Escriba una Edad Valida");
      $('#spanEdad').show();
      return false;
    }else if( valor <17){
        $('#spanEdad').text("No puede ser menor de Edad");
        $('#spanEdad').show();
        return false;
      }else {
      $('#spanEdad').hide();
      return true;
    }
    }
    
    function validarTelefono(){
      let valor=$('#txtTelefonoPanel').val();
      let cantidad=valor.length;
      if(isNaN(valor)){
        $('#spanTelefono').text("Un telefono solo contiene números reviselo por favor");
        $('#spanTelefono').show();
      }else if(cantidad==9 || cantidad==0) {
        $('#spanTelefono').hide();
        return true;
      }else {
        $('#spanTelefono').text("Escriba un telefono valido");
        $('#spanTelefono').show();
        return false;
      }
      
    }

    function validarAbout(){
        let valor=$('#txtAboutme').val();
      let cantidad=valor.length;
      if(cantidad>800){
          $('#spanAbout').css("color","#E61470");
        $('#spanAbout').show();
        return false;
      }else{
        $('#spanAbout').hide();
        return true;
      }
    }

    function actualizarDatosUsuario(){
        if(validarEdad()==false || validarTelefono()==false || validarAbout()==false){
          Swal.fire({
              position: 'top-center',
              icon: 'info',
              title: 'Sigue las Indicaciones Por favor',
              showConfirmButton: false,
              timer: 2500
            })
      }else{
        let cadena1=$('#txtNombresPanel').val();
        let cadena2=$('#txtApellidosPanel').val();
        let vNombre=cadena1.replace(/[']+/g, '´');
        let vApellidos=cadena2.replace(/[']+/g, '´');
        let vEdad=$('#txtEdadPanel').val();
        let vTelefono=$('#txtTelefonoPanel').val();
        let vPais=$('#txtPaisPanel').val();
        let vAbout=$('#txtAboutme').val();
        $.ajax({
          method: "POST",
          url: "../../Controllers/usuario_controller.php?action=actualizarDatosUsuario",
          data: { nombres : vNombre, apellidos : vApellidos, edad : vEdad, telefono : vTelefono, pais : vPais, about: vAbout},
          success: function(data){
             if(data==1){
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Acabas de Actualizar tus datos Correctamente',
                showConfirmButton: false,
                timer: 2500
              })
             }else{
              Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Ocurrió un Error y no se pudo Actualizar',
                showConfirmButton: false,
                timer: 2500
              })
             }
          },error: function(){
            Swal.fire({
              position: 'top-center',
              icon: 'error',
              title: 'Tu petición no se completo ponte en contacto con el soporte',
              showConfirmButton: false,
              timer: 2500
            })
          },
      })
      }
      }

function validarPasswordAntigua(){
  let valor=$('#passwordPast').val();
  if(valor==""){
    $('#spanPast').text("No puedes dejar vacio este campo");
    $('#spanPast').css("color","red");
    $('#passwordPast').css("border-color","red");
    $('#spanPast').show();
    return false;  
  }else{
    $('#passwordPast').css("border-color","black");
    $('#spanPast').hide();
    return true;  
  }
}


function validarPasswordNueva(){
  let valor=$('#passwordNew').val();
  if(valor==""){
    $('#spanNew').text("No puedes dejar vacio este campo");
    $('#spanNew').css("color","red");
    $('#passwordNew').css("border-color","red");
    $('#spanNew').show();
    return false;  
  }else if(valor.length<7){
    $('#spanNew').text("La contraseña debe contener mas de 6 caracteres");
    $('#spanNew').css("color","red");
    $('#passwordNew').css("border-color","red");
    $('#spanNew').show();
    return false;  
  }else{
    $('#passwordNew').css("border-color","black");
    $('#spanNew').hide();
    return true;  
  }
  
}

function validarPasswordConfirmacion(){
  let valor=$('#passwordConfirm').val();
  let valor1=$('#passwordNew').val();
  if(valor==""){
    $('#spanConfirm').text("No puedes dejar vacio este campo");
    $('#spanConfirm').css("color","red");
    $('#passwordConfirm').css("border-color","red");
    $('#spanConfirm').show();
    return false;  
  }else if(valor==valor1){
    $('#passwordConfirm').css("border-color","black");
    $('#spanConfirm').hide();
    return true; 
  }else{ 
    $('#spanConfirm').text("Las Contraseñas no coinciden");
    $('#spanConfirm').css("color","red");
    $('#passwordConfirm').css("border-color","red");
    $('#spanConfirm').show();
    return false;
  }
}

function CambiarContrasea(){
  if(validarPasswordAntigua()==false || validarPasswordNueva()==false || validarPasswordConfirmacion()==false){
    Swal.fire({
        position: 'top-center',
        icon: 'info',
        title: 'Sigue las Indicaciones Por favor',
        showConfirmButton: false,
        timer: 2500
      })
}else{
  let vPast=  $('#passwordPast').val();
  let vNew=$('#passwordNew').val();
  $.ajax({
    method: "POST",
    url: "../../Controllers/usuario_controller.php?action=actualizarContraseña",
    data: { past: vPast, new: vNew},
    success: function(data){
   if(data==1){
    limpiarFormContrasea();
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Tu Contraseña se Actualizo Satisfactoriamente',
      showConfirmButton: false,
      timer: 2500
    })
   }else if(data==2){
    $('#spanPast').text("La Contraseña que ingreso no es correcta intentelo nuevamente");
    $('#spanPast').css("color","red");
    $('#passwordPast').css("border-color","red");
    $('#passwordPast').val("");
    $('#spanPast').show();
   }else{
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Ocurrió un Error Interno intentalo más tarde',
      showConfirmButton: false,
      timer: 2500
    })
   }
    },error: function(){
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Tu petición no se completo ponte en contacto con el soporte Tecnico',
        showConfirmButton: false,
        timer: 2500
      })
    },
})
}
}

function limpiarFormContrasea(){
  $('#passwordPast').val("");
  $('#passwordNew').val("");
  $('#passwordConfirm').val("");
  $('#passwordPast').css("border-color","gray");
  $('#passwordNew').css("border-color","gray");
  $('#passwordConfirm').css("border-color","gray");
}
function validarPasswordAntigua(){
  let valor=$('#passwordPast').val();
  if(valor==""){
    $('#spanPast').text("No puedes dejar vacio este campo");
    $('#spanPast').css("color","red");
    $('#passwordPast').css("border-color","red");
    $('#spanPast').show();
    return false;  
  }else{
    $('#passwordPast').css("border-color","black");
    $('#spanPast').hide();
    return true;  
  }
}


function validarPasswordNueva(){
  let valor=$('#passwordNew').val();
  if(valor==""){
    $('#spanNew').text("No puedes dejar vacio este campo");
    $('#spanNew').css("color","red");
    $('#passwordNew').css("border-color","red");
    $('#spanNew').show();
    return false;  
  }else if(valor.length<7){
    $('#spanNew').text("La contraseña debe contener mas de 6 caracteres");
    $('#spanNew').css("color","red");
    $('#passwordNew').css("border-color","red");
    $('#spanNew').show();
    return false;  
  }else{
    $('#passwordNew').css("border-color","black");
    $('#spanNew').hide();
    return true;  
  }
  
}

function validarPasswordConfirmacion(){
  let valor=$('#passwordConfirm').val();
  let valor1=$('#passwordNew').val();
  if(valor==""){
    $('#spanConfirm').text("No puedes dejar vacio este campo");
    $('#spanConfirm').css("color","red");
    $('#passwordConfirm').css("border-color","red");
    $('#spanConfirm').show();
    return false;  
  }else if(valor==valor1){
    $('#passwordConfirm').css("border-color","black");
    $('#spanConfirm').hide();
    return true; 
  }else{ 
    $('#spanConfirm').text("Las Contraseñas no coinciden");
    $('#spanConfirm').css("color","red");
    $('#passwordConfirm').css("border-color","red");
    $('#spanConfirm').show();
    return false;
  }
}

function CambiarContrasea(){
  if(validarPasswordAntigua()==false || validarPasswordNueva()==false || validarPasswordConfirmacion()==false){
    Swal.fire({
        position: 'top-center',
        icon: 'info',
        title: 'Sigue las Indicaciones Por favor',
        showConfirmButton: false,
        timer: 2500
      })
}else{
  let vPast=  $('#passwordPast').val();
  let vNew=$('#passwordNew').val();
  $.ajax({
    method: "POST",
    url: "../../Controllers/usuario_controller.php?action=actualizarContraseña",
    data: { past: vPast, new: vNew},
    success: function(data){
   if(data==1){
    limpiarFormContrasea();
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Tu Contraseña se Actualizo Satisfactoriamente',
      showConfirmButton: false,
      timer: 2500
    })
   }else if(data==2){
    $('#spanPast').text("La Contraseña que ingreso no es correcta intentelo nuevamente");
    $('#spanPast').css("color","red");
    $('#passwordPast').css("border-color","red");
    $('#passwordPast').val("");
    $('#spanPast').show();
   }else{
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Ocurrió un Error Interno intentalo más tarde',
      showConfirmButton: false,
      timer: 2500
    })
   }
    },error: function(){
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Tu petición no se completo ponte en contacto con el soporte Tecnico',
        showConfirmButton: false,
        timer: 2500
      })
    },
})
}
}

function limpiarFormContrasea(){
  $('#passwordPast').val("");
  $('#passwordNew').val("");
  $('#passwordConfirm').val("");
  $('#passwordPast').css("border-color","gray");
  $('#passwordNew').css("border-color","gray");
  $('#passwordConfirm').css("border-color","gray");
}
