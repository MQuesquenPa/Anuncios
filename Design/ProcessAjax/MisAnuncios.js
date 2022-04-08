function listarTabla(){
    $('#myTable').DataTable({
        "oLanguage": {
            "sProcessing":     "Procesando...",
            "sLengthMenu": 'Mostrar <select>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">Todos</option>'+
                '</select> registros',    
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Filtrar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
}


function RestaurarAnuncio(vId){
$.ajax({
    method: "POST",
    url: "../../Controllers/misAnuncios_controller.php?action=actualizarEstado",
    data:{id_anuncio: vId, dato : 1},
    success: function(data){
    if(data==1){
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Su Publicación se Restauro Satisfactoriamente',
            showConfirmButton: false,
            timer: 2500
          });
          window.location.href = "../PanelUsuario/misAnuncios.php";
    }else{
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Ocurrió un error interno, le pedimos que lo intente en unos minutos',
            showConfirmButton: false,
            timer: 2500
          });
    }
    },error: function(){
        alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
    }
}); 
}

function EliminarAnuncio(vId){
$.ajax({
    method: "POST",
    url: "../../Controllers/misAnuncios_controller.php?action=actualizarEstado",
    data:{id_anuncio: vId, dato : 0},
    success: function(data){
    if(data==1){
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Su Publicación se Retiro sin ningun Problema',
            showConfirmButton: false,
            timer: 2500
          });
          window.location.href = "../PanelUsuario/misAnuncios.php";
    }else{
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Ocurrió un error interno, le pedimos que lo intente en unos minutos',
            showConfirmButton: false,
            timer: 2500
          });
    }
    },error: function(){
        alert("En estos Momentos ha suscedido algo inesperado y no se pudo Completar el pedido");
    }
}); 
}