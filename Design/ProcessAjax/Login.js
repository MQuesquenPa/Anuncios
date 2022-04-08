function validarEmailLogin(){
    var valor=$('#txtEmail').val();
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if(valor==""){
          $("#spanEmailLogin").text("No puedes dejar vacio este Campo") ;
          $('#spanEmailLogin').css('color', 'red');
          $("#spanEmailLogin").show();
          $("#txtEmail").css('border-color','red');
          $("#divEmail").css('border-color','red');    
          return false;
    }else if(!regex.test(valor.trim())){
          $("#spanEmailLogin").text("Debes Escribir un Correo valido");
          $('#spanEmailLogin').css('color', 'red');
          $("#txtEmail").css('border-color','red');
          $("#divEmail").css('border-color','red');
          $("#spanEmailLogin").show();
          return false;
    }else{
          $("#txtEmail").css('border-color','#6963ff');
          $("#divEmail").css('border-color','#6963ff');
          $("#spanEmailLogin").hide();
          return true; 
         }
}


function validarContraseaLogin(){
var valor=$('#txtPassword').val();
    if(valor==""){
      $("#spanPasswordLogin").text("Debes Escribir tu Contraseña") ;
      $('#spanPasswordLogin').css('color', 'red');
      $("#spanPasswordLogin").show();
      $("#divPassword").css('border-color','red');
      $("#txtPassword").css('border-color','red');
      return false;
    }else{
        $("#txtPassword").css('border-color','#6963ff');
        $("#divPassword").css('border-color','#6963ff');
        $("#spanPasswordLogin").hide();
        return true; 
    }
}


function Login(){
    if(validarEmailLogin()==false || validarContraseaLogin()==false){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Sigue las Indicaciones Por favor',
            showConfirmButton: false,
            timer: 2500
          })
    }else{
    let vCorreo=$('#txtEmail').val();
    let vContra=$('#txtPassword').val();
    $.ajax({
    method: "POST",
    url: "../../Controllers/usuario_controller.php?action=login",
    data: { correo : vCorreo, contrasea : vContra},
    success: function(data){
        if(data==1){
            window.location.href = "../PanelAdmin/";
        }else if(data==2){
            window.location.href = "../PanelUsuario/";
        }else if(data==3){
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'La contraseña que ingresaste es incorrecta',
                showConfirmButton: false,
                timer: 2500
              })
        }else if(data==4){
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'El usuario que ingresaste no Existe',
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
