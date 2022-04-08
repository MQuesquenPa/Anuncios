
    let polited=$('#sessionVlue').val();
    if(polited!="0@§"){
    $('#comRegister').hide();
    $('#comLogin').hide();
    }else{
    $('#comDash').hide();
    }

    function PublicarAnucio(){
        let polited=$('#sessionVlue').val();
        if(polited!="0@§"){
            window.location.href = "http://localhost/Anuncios/Views/PanelUsuario/";
        }else{
            window.location.href = "http://localhost/Anuncios/Views/Register/";
        }
    }