<?php
class MenuPrincipal
{  
    public static function publicacionesMenuPrincipal($pais){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT a.id_anuncio,a.celular,a.imagenes,a.fechaPublicacion,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito  where a.pais=:pais order by a.likes DESC limit 7');
        $sql->bindValue('pais',$pais);
        $sql->execute();
        $output="";
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $imagen=explode(",",$row['imagenes']);
        $final=DOMINIO.$imagen[0];
        $fecha=time_passed($row['fechaPublicacion']);
        $descripcion=substr($row['descripcion'],0,113);
        $output .='<div class="item">
        <div class="card">
            <div class="item-card7-img">
                <div class="item-card7-imgs">
                <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'"></a>
                    <img style="height:240px;" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" class="lazy cover-image">
                </div>
                <div class="item-card7-overlaytext">
                    <a href="javascript:void(0)" class="text-white">'.$row['nombreCategoria'].'</a>
                    <h4  class="font-weight-semibold mb-0">$/'.$row['precio'].'</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="item-card7-desc">
                <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'"><h4 class="font-weight-semibold">'.$row['nombre'].'</h4></a>
                </div>
                <div class="item-card7-text">
                    <ul class="icon-card mb-0">
                        <li ><a  href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['provincia'].'</a></li>
                        <li><a  href="javascript:void(0)" class="icons"><i class="si si-event text-muted mr-1"></i>'.$fecha.'</a></li>
                        <li class="mb-0"><a href="javascript:void(0)" class="icons"><i class="si si-heart text-muted mr-1"></i>'.$row['likes'].'</a></li>
                        <li class="mb-0"><a  href="javascript:void(0)" class="icons"><i class="si si-phone text-muted mr-1"></i>'.$row['celular'].'</a></li>
                    </ul>
                    <p class="mb-0">'.$descripcion.'..</p>
                </div>
            </div>
        </div>
    </div>';
        }
        return $output;
}

public static function AnunciosRecientes($pais){
    $db=Db::getConnect();
    $sql=$db->prepare('SELECT a.id_anuncio,a.celular,a.imagenes,a.fechaPublicacion,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito  where a.pais=:pais order by a.fechaPublicacion DESC limit 7');
    $sql->bindValue('pais',$pais);
    $sql->execute();
    $output="";
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    $imagen=explode(",",$row['imagenes']);
    $final=DOMINIO.$imagen[0];
    $fecha=time_passed($row['fechaPublicacion']);
    $descripcion=substr($row['descripcion'],0,113);
    $output .='<div class="item">
						<div class="card mb-0">
							<div class="item-card2-img">
                            <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'"></a>
                            <img style="height:240px;" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" class="lazy cover-image">
							</div>
							<div class="card-body">
								<div class="item-card2">
									<div class="item-card2-desc">
										<ul class="d-flex">
											<li class=""><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['provincia'].'</a></li>
											<li><a href="javascript:void(0)" class="icons"><i class="si si-event text-muted mr-1"></i>'.$fecha.'</a></li>
										</ul>
										<div class="item-card2-text">
                                        <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'"><h4 class="font-weight-semibold">'.$row['nombre'].'</h4></a>
										</div>
										<p class="">'. $descripcion.'..</p>
										<div class="item-card2-rating mb-0">
											<div class="rating-stars d-inline-flex">
												<div class="rating-stars-container">
													<div class="rating-star sm">
														<i class="fa fa-heart"></i>
													</div>
												</div>&nbsp; '.$row['likes'].'
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>';
    } 
    return $output;
}

}
function time_passed($get_timestamp){
    date_default_timezone_set("America/Lima");
        $timestamp = strtotime($get_timestamp);
        $diff = time() - (int)$timestamp;

        if ($diff == 0) 
             return 'justo ahora';

        if ($diff > 604800)
            return date("d M Y",$timestamp);

        $intervals = array
        (
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );

        $value = floor($diff/$intervals[1][1]);
        return 'hace '.$value.' '.$intervals[1][0].($value > 1 ? 's' : '');
}
?>