function TraerAnuncios(){
    let plor=$('#glyes').val();
    if(plor==1){
        $.ajax({
            method: "GET",
            url: "../../Controllers/buscador_controller.php?action=listarAnuncios",
            success: function(data){
              $('#anuncios').append(data);  
            },error: function(){
                alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
            },complete: function(){
                $('.lazy').lazyload();
            }
        });  
    }else if(plor==2){
        traerAnunciosFiltros();
    }else if(plor==3){
    let search=$('#search').val();
    $.ajax({
        method: "POST",
        url: "../../Controllers/buscador_controller.php?action=listarAnuncios3",
        data:{palabra : search },
        success: function(data){
            if(data==""){
                $('#anuncios').append("<div><h3>No hay resultados disponibles para "+search+"</h3></div>");
                $('#chargeMore').remove();
            }else{
                $('#anuncios').append(data); 
                if($(".idair:last").attr("id")<4){
                $('#chargeMore').remove(); 
                } 
            }
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
        },complete: function(){
            $('.lazy').lazyload();
        }
    });  
    }else{
        alert("Error al ejecutar Petición");
    }
}

function traerCiudades(){
    $.ajax({
        method: "GET",
        url: "../../Controllers/buscador_controller.php?action=listarCiudades",
        success: function(data){
          $('#cardCiudades').append(data);   
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
        },complete: function(){
            $('#cardCiudades').showmore({
                closedHeight: 150,
                buttonTextMore: 'Ver Más',
                buttonTextLess: 'Cerrar',
                buttonCssClass: 'showmore-button',
                animationSpeed: 0.5
            });
        }
    });  
}

function UnionDatos(){
    let variable=$('#glyes').val();
    var last_id = $(".idair:last").attr("id");
    if(variable==1){
        loadMoreData(last_id);
        $('#ajax-load').show();
    }else if(variable==2){
        loadMoreData2(last_id);
        $('#ajax-load').show();
    }else if(variable==3){
        loadMoreData3(last_id);
        $('#ajax-load').show();
    }else{
        alert("Error al ejecutar Petición");
    }
}

function loadMoreData(last_id){
    let cant=parseInt(last_id)+1;
    $.ajax({
      method: "POST",
      url: "../../Controllers/buscador_controller.php?action=listarAnunciosCarga",
      data: {limite: cant},
      success: function(data){
        if(data==1){
            $('#ajax-load').hide();
            $('#chargeMore').remove();
        }else{
          $('#anuncios').append(data);
          $('#ajax-load').hide();   
        }
      },error: function(){
          alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
      },complete: function(){
        $('.lazy').lazyload();
      }
  }); 
}

function loadMoreData2(last_id){
    let cant=parseInt(last_id)+1;
    let categorias=$('#categoria').val();
    if(categorias==""){
    var vox1="";
    var vox2="";
    var vox3="";
    var vox4="";
    var vox5="";
    var vox6="";
    var vox7="";
    var vox8="";
    var vox9="";
    }else{
    categorias=categorias.replace("Hombres", '1');
    categorias=categorias.replace("Mujeres", '2');
    categorias=categorias.replace("LGBT", '3');
    categorias=categorias.replace("Swinger", '4');
    categorias=categorias.replace("Hoteles", '5');
    categorias=categorias.replace("ClubesNocturnos", '6');
    categorias=categorias.replace("JuguetesSexuales", '7');
    categorias=categorias.replace("Vehiculos", '8');
    categorias=categorias.replace("Energizantes", '9');
    let finalCategoria=categorias.split("-");
    if(finalCategoria.length==1){
        var vox1=finalCategoria[0];
        var vox2="";
        var vox3="";
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==2){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3="";
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==3){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==4){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==5){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==6){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==7){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==8){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8=finalCategoria[7];
        var vox9="";
    }else if(finalCategoria.length==9){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8=finalCategoria[7];
        var vox9=finalCategoria[8];
    }        
}

let valueCiudad=$('#vciudad').val();
let valueOrden=$('#vorden').val();
let valuePrecio=$('#vprecio').val();
let finalPrecios=valuePrecio.split("-");
let valPrecio1=finalPrecios[0];
let valPrecio2=finalPrecios[1];
$.ajax({
    method: "POST",
    url: "../../Controllers/buscador_controller.php?action=listarAnunciosCarga2",
    data:{categoria1 : vox1,categoria2 : vox2, categoria3 : vox3, categoria4 :vox4, categoria5:vox5 , categoria6 : vox6, categoria7:vox7,
    categoria8: vox8,categoria9: vox9, ciudad: valueCiudad, orden: valueOrden, precio1:valPrecio1,precio2:valPrecio2, limite:cant},
    success: function(data){
        if(data==1){
            $('#ajax-load').hide();
            $('#chargeMore').remove();
        }else{
          $('#anuncios').append(data);
          $('#ajax-load').hide();   
        }
    },error: function(){
        alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
    },complete: function(){
        $('.lazy').lazyload();
    }
});  
}

  function loadMoreData3(last_id){
    let search=$('#search').val();
    let cant=parseInt(last_id)+1;
    $.ajax({
      method: "POST",
      url: "../../Controllers/buscador_controller.php?action=listarAnunciosCarga3",
      data: {limite: cant,palabra:search},
      success: function(data){
        if(data==1){
            $('#ajax-load').hide();
            $('#chargeMore').remove();
        }else{
          $('#anuncios').append(data);
          $('#ajax-load').hide();   
        }
      },error: function(){
          alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
      },complete: function(){
        $('.lazy').lazyload();
      }
  }); 
  }

  function BuscarPalabra(){
    let valor=$('#txtbuscar').val();
    if(valor==""){
        window.location.href = "../Buscador/";   
    }else{
        let valorFinal=valor.replace(/[ ]+/g, '-');
      window.location.href = "../Buscador/index.php?search="+valorFinal;
    }
}

function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13) {
        BuscarPalabra();
    };
}



function traerAnunciosFiltros(){
    let categorias=$('#categoria').val();
    if(categorias==""){
    var vox1="";
    var vox2="";
    var vox3="";
    var vox4="";
    var vox5="";
    var vox6="";
    var vox7="";
    var vox8="";
    var vox9="";
    }else{
    categorias=categorias.replace("Hombres", '1');
    categorias=categorias.replace("Mujeres", '2');
    categorias=categorias.replace("LGBT", '3');
    categorias=categorias.replace("Swinger", '4');
    categorias=categorias.replace("Hoteles", '5');
    categorias=categorias.replace("ClubesNocturnos", '6');
    categorias=categorias.replace("JuguetesSexuales", '7');
    categorias=categorias.replace("Vehiculos", '8');
    categorias=categorias.replace("Energizantes", '9');
    let finalCategoria=categorias.split("-");
    if(finalCategoria.length==1){
        var vox1=finalCategoria[0];
        var vox2="";
        var vox3="";
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==2){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3="";
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==3){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4="";
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==4){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5="";
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==5){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6="";
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==6){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7="";
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==7){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8="";
        var vox9="";
    }else if(finalCategoria.length==8){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8=finalCategoria[7];
        var vox9="";
    }else if(finalCategoria.length==9){
        var vox1=finalCategoria[0];
        var vox2=finalCategoria[1];
        var vox3=finalCategoria[2];
        var vox4=finalCategoria[3];
        var vox5=finalCategoria[4];
        var vox6=finalCategoria[5];
        var vox7=finalCategoria[6];
        var vox8=finalCategoria[7];
        var vox9=finalCategoria[8];
    }        
}

let valueCiudad=$('#vciudad').val();
let valueOrden=$('#vorden').val();
let valuePrecio=$('#vprecio').val();
let finalPrecios=valuePrecio.split("-");
let valPrecio1=finalPrecios[0];
let valPrecio2=finalPrecios[1];
$.ajax({
    method: "POST",
    url: "../../Controllers/buscador_controller.php?action=listarAnuncios2",
    data:{categoria1 : vox1,categoria2 : vox2, categoria3 : vox3, categoria4 :vox4, categoria5:vox5 , categoria6 : vox6, categoria7:vox7,
    categoria8: vox8,categoria9: vox9, ciudad: valueCiudad, orden: valueOrden, precio1:valPrecio1,precio2:valPrecio2},
    success: function(data){
        if(data==""){
            $('#chargeMore').remove(); 
            $('#anuncios').append("<div><h3>No hay Anuncios con los Filtros Seleccionados</h3></div>");
        }else{
            $('#anuncios').append(data);
            if($(".idair:last").attr("id")<4){
                $('#chargeMore').remove(); 
            } 
        }
    },error: function(){
        alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
    },complete:function(){
        $('.lazy').lazyload();
    }
});  

}

function GenerarFiltros(){
var checkGeneral="";
let check1=$('input:checkbox[name=checkbox1]:checked').val();
let check2=$('input:checkbox[name=checkbox2]:checked').val();
let check3=$('input:checkbox[name=checkbox3]:checked').val();
let check4=$('input:checkbox[name=checkbox4]:checked').val();
let check5=$('input:checkbox[name=checkbox5]:checked').val();
let check6=$('input:checkbox[name=checkbox6]:checked').val();
let check7=$('input:checkbox[name=checkbox7]:checked').val();
let check8=$('input:checkbox[name=checkbox8]:checked').val();
let check9=$('input:checkbox[name=checkbox9]:checked').val();

if(check1!=null){
    checkGeneral=checkGeneral+'-'+check1;
}
if(check2!=null){
    checkGeneral=checkGeneral+'-'+check2;
}
if(check3!=null){
    checkGeneral=checkGeneral+'-'+check3;
}
if(check4!=null){
    checkGeneral=checkGeneral+'-'+check4;
}
if(check5!=null){
    checkGeneral=checkGeneral+'-'+check5;
}
if(check6!=null){
    checkGeneral=checkGeneral+'-'+check6;
}
if(check7!=null){
    checkGeneral=checkGeneral+'-'+check7;
}
if(check8!=null){
    checkGeneral=checkGeneral+'-'+check8;
}
if(check9!=null){
    checkGeneral=checkGeneral+'-'+check9;
}

checkGeneral=checkGeneral.replace("-", '');

let precios=$('#price').val();
let preciosFinal=precios.replace(/[$]+/g, '');
let local=preciosFinal.replace(/[ ]+/g, '');
let finalPrecios=local.split("-");
let precio1=finalPrecios[0];
let precio2=finalPrecios[1];

let ciudad= $('input:radio[name=ciudadFilters]:checked').val();
if(ciudad==null){
    var vCiudad="";
}else{
    var vCiudad=ciudad;
}         
let orden= $('input:radio[name=ordenFilters]:checked').val();
if(orden==null){
var  vOrden="";

}else{
var  vOrden=orden;
} 
var urlFinal="";
if(checkGeneral!=""){
    urlFinal=urlFinal+"Categorias/"+checkGeneral+"/";
}
if(precio1!="" && precio2!=""){
    urlFinal=urlFinal+"Precios/"+precio1+"-"+precio2+"/";
}
if(vCiudad!=""){
    urlFinal=urlFinal+"Ciudad/"+vCiudad+"/";
}
if(vOrden!=""){
    urlFinal=urlFinal+"Orden/"+vOrden+"/";
}

urlFinal="../Buscador/index.php?search=Filtros/"+urlFinal;
window.location.href = urlFinal;  
}


function cantidadCategorias(){
    $.ajax({
        method: "GET",
        url: "../../Controllers/buscador_controller.php?action=cantCategorias",
        success: function(data){
          $('#cantidadTotal').append(data);   
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
        },complete: function(){
            pegarCategorias();
        }
    }); 
}

function rangoPrecioVehiculos(){
    $( "#mySlider" ).slider({
		range: true,
		min: 0,
		max: 99999,
		values: [ 1000, 6000 ],
		slide: function( event, ui ) {
			$( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});

	$( "#price" ).val( "$" + $( "#mySlider" ).slider( "values", 0 ) +
               " - $" + $( "#mySlider" ).slider( "values", 1 ) );
    $('#button1Func').hide();
    $('#button2Func').show();

}

function rangoPrecioNormal(){
    $( "#mySlider" ).slider({
		range: true,
		min: 0,
		max: 1000,
		values: [ 200, 500 ],
		slide: function( event, ui ) {
			$( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});

	$( "#price" ).val( "$" + $( "#mySlider" ).slider( "values", 0 ) +
               " - $" + $( "#mySlider" ).slider( "values", 1 ) );
    $('#button1Func').show();
    $('#button2Func').hide();
}



function pegarCategorias(){
    let valor1=$('#cant1').text();
    let valor2=$('#cant2').text();
    let valor3=$('#cant3').text();
    let valor4=$('#cant4').text();
    let valor5=$('#cant5').text();
    let valor6=$('#cant6').text();
    let valor7=$('#cant7').text();
    let valor8=$('#cant8').text();
    let valor9=$('#cant9').text();
    $('#catHombres').text(valor1);
    $('#catMujeres').text(valor2);
    $('#catLGBT').text(valor3);
    $('#catSwinger').text(valor4);
    $('#catHoteles').text(valor5);
    $('#catClub').text(valor6);
    $('#catJug').text(valor7);
    $('#catVeh').text(valor8);
    $('#catEner').text(valor9);   
}



function pegarPrinciapal(){
    let valor1=$('#cant1').text();
    let valor2=$('#cant2').text();
    let valor3=$('#cant3').text();
    let valor4=$('#cant4').text();
    let valor5=$('#cant5').text();
    let valor6=$('#cant6').text();
    let valor8=$('#cant8').text();
    let valor9=$('#cant9').text();
    $('#catHombres').before(valor1);
    $('#catMujeres').before(valor2);
    $('#catLGBT').before(valor3);
    $('#catSwinger').before(valor4);
    $('#catHoteles').before(valor5);
    $('#catClub').before(valor6);
    $('#catVeh').before(valor8);
    $('#catEner').before(valor9);   
}


function CantPrincipal(){
    $.ajax({
        method: "GET",
        url: "Controllers/buscador_controller.php?action=cantCategorias",
        success: function(data){
          $('#cantidadTotal').append(data);   
        },error: function(){
            alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
        },complete: function(){
            pegarPrinciapal();
        }
    }); 
}


function darlike(vid_anuncio){
    let valorSession=$('#sessionVlue').val();
    let cantidadLove=parseInt($('#'+'cantLikes'+vid_anuncio).text());
    if(valorSession=="0@§"){
        NecesitasLoguearte();
    }else{
        $.ajax({
            method: "POST",
            url: "../../Controllers/buscador_controller.php?action=SeleccionarMegusta",
            data:{id_anuncio: vid_anuncio},
            success: function(data){
              if(data==0){
                dioLike();
                $('#'+'cantLikes'+vid_anuncio).text(cantidadLove+1);
              }else if(data==1){
                quitoLike();
                $('#'+'cantLikes'+vid_anuncio).text(cantidadLove-1);
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

function dioLike(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
      Toast.fire({
        icon: 'success',
        title: 'Acabas de Dar like a un Anuncio'
      })
}

function quitoLike(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
      Toast.fire({
        icon: 'error',
        title: 'Acabas de quitar tu like a un Anuncio'
      })
}

function NecesitasLoguearte(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Necesitas estar Logueado para interactuar con los Anuncios!',
        footer: '<a href="../Login/" style="color:#E61470">Click Aquí para Iniciar Sesión</a>',
        confirmButtonText: 'Seguir Viendo Anuncios',
        confirmButtonColor: '#6963ff',
      })
}