<?php 
require_once("../../BD/Connection.php");
require_once("../PinPartsUsuario/headerUsuario.php");
require_once("../PinPartsUsuario/asideUsuario.php");
require_once("../../Models/Pagos.php");
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
?>
<div class="card my-select">
							<div class="card-header">
								<h3 class="card-title">Información de Plan</h3>
							</div>
							<div class="card-body">
                            <li style="list-style:none;">
							<i class="fa fa-book text-warning" aria-hidden="true"></i> Tu Plan Actual es <?=$plan?>
                            </li>
                            <li style="list-style:none;">
							<i class="fa fa-copy text-warning" id="publicacionesCantidad" aria-hidden="true"></i> 
							</li>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-md-6 col-xl-4 mt-2">
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
                    <div class="col-xs-4 col-md-6 col-xl-4 mt-2">
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
    </section>
<?php require_once("../PinPartsUsuario/footerUsuario.php")?>
<script src="https://www.paypal.com/sdk/js?client-id=AZXIBD6O7ErWe4o7Ekf8Jqw-RKgM8hRQSeDekWnvMRcOFHXcwaKpGWplrPY4sfKbwdfMqRIU-hPed0xJ"></script>
<script>
traerPublicaciones();
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