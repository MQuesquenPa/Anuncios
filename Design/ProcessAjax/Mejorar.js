function validarNombreMejorar(){
    var valor=$('#txnombre').val();
    if(valor==""){
      $("#spannombre").text("Debes Escribir tu Nombre o un pseudonimo") ;
      $('#spannombre').css('color', 'red');
      $("#spannombre").show();
      $("#txnombre").css('border-color','red');
      return false;
    }else{
        $("#txnombre").css('border-color','gray');
        $("#spannombre").hide();
        return true; 
    }
}

function validarCorreoMejorar(){
    var valor=$('#txcorreo').val();
    if(valor==""){
      $("#spancorreo").text("Debes Escribir Correo para contactarnos contigo de ser necesario") ;
      $('#spancorreo').css('color', 'red');
      $("#spancorreo").show();
      $("#txcorreo").css('border-color','red');
      return false;
    }else{
    $("#txcorreo").css('border-color','gray');
    $("#spancorreo").hide();
    return true; 
    }
}

function validarComentarioMejorar(){
    var valor=$('#txcomentario').val();
    if(valor==""){
      $("#spancomentario").text("No puedes enviar un comentario vacío ") ;
      $('#spancomentario').css('color', 'red');
      $("#spancomentario").show();
      $("#txcomentario").css('border-color','red');
      return false;
    }else{
    $("#txcomentario").css('border-color','gray');
    $("#spancomentario").hide();
    return true; 
    }
}


function EnviarComentario(){
    if(validarNombreMejorar()==false || validarCorreoMejorar()==false || validarComentarioMejorar()==false ){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Sigue las Indicaciones Por favor',
            showConfirmButton: false,
            timer: 2500
          })
    }else{
        let vnombre=$('#txnombre').val();
        let vcorreo=$('#txcorreo').val();
        let vcomentario=$('#txcomentario').val();
        $.ajax({
            method: "POST",
            url: "../../Controllers/comentarios_controller.php?action=enviarComentario",
            data: { nombre : vnombre, correo : vcorreo, comentario: vcomentario},
            success: function(data){
              if(data==1){
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Gracias por ayudarnos con tu comentario',
                    showConfirmButton: false,
                    timer: 2500
                  })
                  $('#txnombre').val("");
                  $('#txcorreo').val("");
                  $('#txcomentario').val("");
              }else{
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Ocurrió un error interno te pedimso que lo intentes más tarde',
                    showConfirmButton: false,
                    timer: 2500
                  })
              }
            },error: function(){
                alert("hubo un error");
            },
        })
    }
}