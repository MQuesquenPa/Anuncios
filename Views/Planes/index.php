<?php 
require_once("../../BD/Connection.php");
require_once("../../Models/Pagos.php");
require_once("../PinParts/header.php");
if(empty($_SESSION['rol'])){
	echo "<script>window.location.href = '../../'</script>";
	}else{
	if($_SESSION['suscripcion']>0){
	echo "<script>window.location.href = '../PanelUsuario/'</script>";
	}else if($_SESSION['suscripcion']==0){
		$informacionSolicitud = file_get_contents("https://api.cambio.today/v1/quotes/PEN/USD/json?quantity=2&key=4435|JdAZGJ*G2Mt2*vjrB4EHrAq_t1HMOfk~");
		$dataSolicitud = json_decode($informacionSolicitud);
		$desire=$dataSolicitud->result->value;
		$rester=Pagos::PagosGeneral();
		$pagoPro=$rester[0];
		$pagoPremium=$rester[1];
		$dester=$pagoPro*$desire;
		$Precio1=round($dester,2);
		$canted=$desire*$pagoPremium;
 		$Precio2=round($canted,2);
	}
	}
?>
<section>
	<div class="bannerimg cover-image " data-image-src="<?=DOMINIO?>Design/assets/images/banners/banner4.webp" >
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">Planes</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Debes elegir uno de ellos para proseguir y crear tu cuenta.</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>		
</section>
<div class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-xs-4 col-md-4 col-xl-4 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">Gratuito</span></div>
							<div class="panel-body text-center">
								<p class="display-4 mb-0">$0.00</p>
							</div>
							<ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><span class="font-weight-semibold"> Publicaciónes </span> Personalizadas</li>
                                <li class="list-group-item"><span class="font-weight-semibold"> 10</span> Anuncios</li>
                                <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Seguridad</li>
                                <li class="list-group-item"><span class="font-weight-semibold"> Anuncio</span> Destacado en Busqueda</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> de Soporte</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Recomendado</span> Para usuarios que solo desean interactuar</li>
							</ul>
							<div class="panel-footer text-center">
								<button type="button" class="btn btn-primary" onclick="registrarPlan(1)">Adquirir Ahora</button>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-md-4 col-xl-4 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Pro</span></div>
							<div class="panel-body text-center">
								<p class="display-4 mb-0">$/<?=$pagoPro?></p>
							</div>
							<ul class="list-group list-group-flush text-center">
								<li class="list-group-item"><span class="font-weight-semibold"> Publicaciónes</span> Personalizadas</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 15</span> Anuncios</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Seguridad</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Anuncios </span> Destacados en Busquedas</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> de Soporte</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Recomendado </span>Para usuarios que desean anunciar</li>
							</ul>
							<div class="panel-footer text-center">
								<button type="button" class="btn btn-primary"  onclick="registrarPlan(2)">Adquirir Ahora</button>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-md-4 col-xl-4 mt-2">
						<div class="panel price  panel-color card overflow-hidden">
							<div class="ribbon ribbon-top-left text-info"><span class="bg-info">Premium</span></div>
							<div class="panel-body text-center">
								<p class="display-4 mb-0">$/<?=$pagoPremium?></p>
							</div>
							<ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><span class="font-weight-semibold"> Publicaciónes</span> Personalizadas</li>
								<li class="list-group-item"><span class="font-weight-semibold">25</span> Anuncios</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Seguridad</li>
                                <li class="list-group-item"><span class="font-weight-semibold"> Anuncios </span> Destacados en Busquedas</li>
								<li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> de Soporte</li>
								<li class="list-group-item"><span class="font-weight-semibold"> Recomendado </span>Para usuarios que desean anunciar</li>
							</ul>
							<div class="panel-footer text-center">
								<button type="button" class="btn btn-primary"  onclick="registrarPlan(3)">Adquirir Ahora</a>
							</div>
						</div>
					</div>
                    <div class="modal fade" id="ModalRegistroPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Metodos de Pago</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="ButtonPaypal">
							<div id="paypal-button-container"></div>
							<div id="paypal-buttons"></div>
                            </div>
                            </div>
                        </div>
                        </div>
				</div>
			</div>
		</div>
<?php require_once("../PinParts/footerPaypal.php");?>		
<script>
		$("#global-loader").fadeOut("slow");
		$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});

	
    paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $Precio1; ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
		return actions.order.capture().then(function(details) {
		$.ajax({
        method: "POST",
        url: "../../Controllers/pagos_controller.php?action=pagar",
        data:{pago : details.id, pagador : details.payer.payer_id, token: details.purchase_units[0].payments.captures[0].id , tipoPago:2, precio: "<?php echo $Precio1?>"},
        success: function(data){   
            if(data==1){
                alert("El pago no se ha procesado por un error interno ponte en contacto con nosotros por favor");
            }else if(data==2){
                window.location.href = "../PanelUsuario/";
            }else{
				alert("Su Pago se Proceso pero ocurrió un error en el servidor,todo esta corroborado en transacciones Paypal");
			}   
        },error: function(){
            alert("Error en el pago");
        },
    	});  
      });
    }
  }).render('#paypal-button-container');

  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $Precio2; ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
		$.ajax({
        method: "POST",
        url: "../../Controllers/pagos_controller.php?action=pagar",
        data:{pago : details.id, pagador : details.payer.payer_id, token: details.purchase_units[0].payments.captures[0].id , tipoPago:3, precio: "<?php echo $Precio2?>"},
        success: function(data){   
            if(data==1){
                alert("El pago no se ha procesado por un error interno ponte en contacto con nosotros por favor");
            }else if(data==2){
                window.location.href = "../PanelUsuario/";
            }else{
				alert("Su Pago se Proceso pero ocurrió un error en el servidor,todo esta corroborado en transacciones Paypal");
			}   
        },error: function(){
            alert("Error en el pago");
        },
    	});  
      });
    }
  }).render('#paypal-buttons');

</script>