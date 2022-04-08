<?php 
require_once("../../BD/Connection.php");
require_once("../../Models/Publicacion.php");
require_once("../PinPartsUsuario/headerUsuario.php");
require_once("../PinPartsUsuario/asideUsuario.php");
$filas=Publicacion::traerAnuncios($_SESSION['id_usuario']);
?>
</div>
<div class="col-xl-9 col-lg-12 col-md-12">
<div class="card mb-0">
<div class="card-header">
    <h3 class="card-title">Mis Anuncios</h3>
    </div>
    <div class="card-body">
   
    <div class=" table-responsive ">
<table class="table table-bordered table-hover mb-0 text-nowrap" id="myTable">
				<thead>
				<tr>
				<th></th>
				<th>Anuncio</th>
				<th>Categoría</th>
				<th>Precio</th>
				<th>Estado</th>
				<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
                    <?php echo $filas?>												
				</tbody>
           </table>
    </div> 
</div>
</div>
</div>					
</div>
</div>
</section>
<?php require_once("../PinPartsUsuario/footerUsuario.php")?>
<script>
listarTabla();
</script>