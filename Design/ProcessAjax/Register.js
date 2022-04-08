



function validarTerminos(){
    if ($('#txtAgree').is(':checked') ) {
        $('#txtterminos').hide();
        return true;
    }else{ 
        $('#txtterminos').show();
        return false;
    }
}

function validarCorreoRegistro(){
    var valor=$('#txtCorreoRegistro').val();
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if(valor==""){
          $("#spanCorreoRegistro").text("No puedes dejar vacio este Campo") ;
          $('#spanCorreoRegistro').css('color', 'red');
          $("#spanCorreoRegistro").show();
          $("#txtCorreoRegistro").css('border-color','red');
          return false;
    }else if(!regex.test(valor.trim())){
          $("#spanCorreoRegistro").text("Debes Escribir un Correo valido");
          $('#spanCorreoRegistro').css('color', 'red');
          $("#txtCorreoRegistro").css('border-color','red');
          $("#spanCorreoRegistro").show();
          return false;
    }else{
          $("#txtCorreoRegistro").css('border-color','#6963ff');
          $("#spanCorreoRegistro").hide();
          return true; 
         }
}


function validarPasswordRegistro(){
    var valor=$('#txtPasswordRegistro').val();
    if(valor==""){
      $("#spanPasswordRegistro").text("Debes escribir una Contraseña") ;
      $('#spanPasswordRegistro').css('color', 'red');
      $("#spanPasswordRegistro").show();
      $("#txtPasswordRegistro").css('border-color','red');
      return false;
    }else{
        $("#txtPasswordRegistro").css('border-color','#6963ff');
        $("#spanPasswordRegistro").hide();
        return true; 
    }
}


function validarVerifyPassword(){
var valorComparativo=$('#txtPasswordRegistro').val();
var valor=$('#txtConfirmPassowrd').val();
    if(valorComparativo==""){
            $("#spanConfirmPassword").text("No ingresaste una contraseña para verificar") ;
            $('#spanConfirmPassword').css('color', 'red');
            $("#spanConfirmPassword").show();
            $("#txtConfirmPassowrd").css('border-color','red');  
            return false; 
    }else if(valor==valorComparativo){
        $("#txtConfirmPassowrd").css('border-color','#6963ff');
        $("#spanConfirmPassword").hide();
        return true;  
    }else{
        $("#spanConfirmPassword").text("Las Contraseñas no Coinciden") ;
        $('#spanConfirmPassword').css('color', 'red');
        $("#spanConfirmPassword").show();
        $("#txtConfirmPassowrd").css('border-color','red');  
        return false; 
    }
}

function RegistrarUser(){
    if(validarCorreoRegistro()==false || validarPasswordRegistro()==false || validarVerifyPassword()==false || validarTerminos()==false ){
        Swal.fire({
            position: 'top-center',
            icon: 'info',
            title: 'Sigue las Indicaciones Por favor',
            showConfirmButton: false,
            timer: 2500
          })
    }else{
    var vEmail=$('#txtCorreoRegistro').val();
    var vContrasea=$('#txtPasswordRegistro').val();
        $.ajax({
            method: "POST",
            url: "../../Controllers/usuario_controller.php?action=registrarUsuario",
            data: { correo : vEmail, contrasea : vContrasea},
            success: function(data){
               if(data==1){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'El Correo que ingresaste ya existe intenta otro por favor',
                    showConfirmButton: false,
                    timer: 2500
                  })
               }else if(data==2){
                window.location.href = "../Planes";
               }
            },error: function(){
                alert("hubo un error");
            },
        })
        }
    }
    

function registrarPlan(vDato){
        if(vDato==1){
            Opcion1();
        }else if(vDato==2){
          $('#paypal-buttons').hide();
          $('#paypal-button-container').show();
          $('#ModalRegistroPlan').modal("show");
        }else if(vDato==3){
          $('#paypal-button-container').hide();
          $('#paypal-buttons').show();
            $('#ModalRegistroPlan').modal("show");
        }
}


function Opcion1(){    
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'leg btn btn-success',
      cancelButton: 'leg btn btn-danger'
    },
    buttonsStyling: false
  })
      swalWithBootstrapButtons.fire({
        title: 'Estas Seguro?',
        text: "Acabas de Elegir el Plan Gratuito",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Si, Estoy Seguro!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            method: "GET",
            url: "../../Controllers/pagos_controller.php?action=gratuito",
            success: function(data){
              if(data==1){
                Swal.fire({
                  position: 'top-center',
                  icon: 'info',
                  title: 'Ha Ocurrido un error y tu petición no se completo intentalo más tarde',
                  showConfirmButton: false,
                  timer: 2500
                })
              }else if(data==2){
                window.location.href = "../PanelUsuario/";
              }else{
                Swal.fire({
                  position: 'top-center',
                  icon: 'info',
                  title: 'Ocurrio un error interno, por favor intentalo más tarde',
                  showConfirmButton: false,
                  timer: 2500
                })
              }
            },error: function(){
                alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
            },
        });  
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'Elige entre los 3 planes disponibles',
            'error'
          )
        }
      })
}

