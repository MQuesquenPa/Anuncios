function CambiarTamanio(){
    let desire=window.screen.height;
    if(desire>680){
        $('.changeStyle').css("height","540px");
        $('.changeStyle').css("width","100%");
        $('.changeStyle').css("border-radius", "20px");
    }
}

$('.flotante').remove();

function singleLike(vid_anuncio){
    let valorSession=$('#sessionVlue').val();
    let cantidadLove=parseInt($('#heartBefore').text());
    
    if(valorSession=="0@§"){
        NecesitasLoguearte();
    }else{
        $.ajax({
            method: "POST",
            url: "../../Controllers/buscador_controller.php?action=SeleccionarMegusta",
            data:{id_anuncio: vid_anuncio},
            success: function(data){
              if(data==0){
               $('#heartBefore').text(cantidadLove+1);
              }else if(data==1){
                $('#heartBefore').text(cantidadLove-1);
              }else if(data==2){
                 NecesitasLoguearte();
              }else{
                  alert(data);
              }  
            },error: function(){
                alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
            }
        }); 
    }
}

