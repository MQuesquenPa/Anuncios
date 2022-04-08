<?php
DEFINE("SITE","http://localhost/anuncios/");
class Buscador
{
    public static function listarAnuncios($pais){
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre,a.estado from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito  where a.pais=:pais order by tipsus DESC,fechaPublicacion DESC limit 0,5');
        $sql->bindValue('pais',$pais);
        $sql->execute();
        $output="";
        $id=0;
		while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $imagen=explode(",",$row['imagenes']);
        $final=SITE.$imagen[0];
        $output .='<div class="card overflow-hidden idair" id="'.$id.'">
					<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                        <div class="d-md-flex">
                            <div class="item-card9-img">
                            <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
								<div class="item-card9-imgs">
                               <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                                </div>
                                </a>
								<div class="item-card9-icons">
								<a href="javascript:void(0)" class="item-card9-icons1 wishlist active" onclick="darlike('.$row['id_anuncio'].')"><i class="fa fa fa-heart-o"></i></a>
								<br>
								<div style="text-align:center;color:black" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
							    </div>
							</div>
							<div class="card border-0 mb-0">
								<div class="card-body ">
								<div class="item-card9">
									<a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
									<p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
								</div>
								</div>
								<div class="card-footer pt-4 pb-4">
								    <div class="item-card9-footer d-flex">
									    <div class="item-card9-cost">
											<h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
										</div>
                                    <div class="ml-auto">
										<a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';               
                $id++; 
            }
		return $output;
        }

        public static function listarAnunciosCarga($id_limit,$pais){
            $db=Db::getConnect();
            $sql=$db->prepare('SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito where a.pais=:pais order by tipsus DESC,fechaPublicacion DESC limit :id_limit,5');
            $sql->bindValue('id_limit',$id_limit,PDO::PARAM_INT);
            $sql->bindValue('pais',$pais);
            $sql->execute();
            $output="";
            $verificacion=$sql->rowCount();
            $ad=$id_limit;
            if($verificacion>=1){
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                    $imagen=explode(",",$row['imagenes']);
                    $final=SITE.$imagen[0];
                    $output .='<div class="card overflow-hidden idair" id="'.$ad.'">
					<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
					    <div class="d-md-flex">
					        <div class="item-card9-img">
                                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
                                <div class="item-card9-imgs">
                                <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                                </div>
                                </a>
								<div class="item-card9-icons">
								<a href="javascript:void(0)" onclick="darlike('.$row['id_anuncio'].')" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
								<br>
								<div style="text-align:center;color:black;" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
							    </div>
							</div>
							<div class="card border-0 mb-0">
								<div class="card-body ">
								<div class="item-card9">
									<a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
									<p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
								</div>
								</div>
								<div class="card-footer pt-4 pb-4">
								    <div class="item-card9-footer d-flex">
									    <div class="item-card9-cost">
											<h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
										</div>
                                    <div class="ml-auto">
										<a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';   
                $ad++; 
                        }
            }else{
                $output=1;
            }
        
            return $output;
            }

        public static function listarAnuncios2($categoria1,$categoria2,$categoria3,$categoria4,$categoria5,$categoria6,$categoria7,$categoria8,$categoria9,$ciudad,$orden,$precio,$precio2,$pais){
                $sentencia="SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito where";
                $arr=array();
                if($pais!=""){
                    $sentencia .= " a.pais = :pais AND";
                    $arr[":pais"] = "$pais";
                }
                if($categoria1!=""){
                    if($categoria2=="" && $categoria3=="" && $categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""){
                    $sentencia .= " a.categoria = :categoria1 AND";
                    $arr[":categoria1"] = "$categoria1";
                    }else{
                    $sentencia .= " a.categoria = :categoria1 OR";
                    $arr[":categoria1"] = "$categoria1";
                    }   
                }
                if($categoria2!=""){
                    if($categoria3=="" && $categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9=="" ){
                    $sentencia .= " a.categoria = :categoria2 AND";
                    $arr[":categoria2"] = "$categoria2";
                    }else{
                    $sentencia .= " a.categoria = :categoria2 OR";
                    $arr[":categoria2"] = "$categoria2";
                    }   
                }
                if($categoria3!=""){
                    if($categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9=="" ){
                    $sentencia .= " a.categoria = :categoria3 AND";
                    $arr[":categoria3"] = "$categoria3";
                    }else{
                    $sentencia .= " a.categoria = :categoria3 OR";
                    $arr[":categoria3"] = "$categoria3";
                    }   
                }
                if($categoria4!=""){
                    if($categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""  ){
                    $sentencia .= " a.categoria = :categoria4 AND";
                    $arr[":categoria4"] = "$categoria4";
                    }else{
                    $sentencia .= " a.categoria = :categoria4 OR";
                    $arr[":categoria4"] = "$categoria4";
                    }   
                }
                if($categoria5!=""){
                    if($categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""){
                    $sentencia .= " a.categoria = :categoria5 AND";
                    $arr[":categoria5"] = "$categoria5";
                    }else{
                    $sentencia .= " a.categoria = :categoria5 OR";
                    $arr[":categoria5"] = "$categoria5";
                    }   
                }
                if($categoria6!=""){
                    if($categoria7=="" && $categoria8=="" && $categoria9==""){
                    $sentencia .= " a.categoria = :categoria6 AND";
                    $arr[":categoria6"] = "$categoria6";
                    }else{
                    $sentencia .= " a.categoria = :categoria6 OR";
                    $arr[":categoria6"] = "$categoria6";
                    }   
                }
                if($categoria7!=""){
                    if($categoria8=="" && $categoria9==""){
                    $sentencia .= " a.categoria = :categoria7 AND";
                    $arr[":categoria7"] = "$categoria7";
                    }else{
                    $sentencia .= " a.categoria = :categoria7 OR";
                    $arr[":categoria7"] = "$categoria7";
                    }   
                }
                if($categoria8!=""){
                    if($categoria9=="" ){
                    $sentencia .= " a.categoria = :categoria8 AND";
                    $arr[":categoria8"] = "$categoria8";
                    }else{
                    $sentencia .= " a.categoria = :categoria8 OR";
                    $arr[":categoria8"] = "$categoria8";
                    }   
                }
                if($categoria9!=""){
                    $sentencia .= " a.categoria = :categoria9 AND";
                    $arr[":categoria9"] = "$categoria9";                       
                }
                if($precio!="" && $precio2!=""){
                $sentencia .= " a.precio BETWEEN :prec AND :prec2 ";
                $arr[":prec"] = "$precio";  
                $arr[":prec2"] = "$precio2";  
                }
                if($ciudad!=""){
                    $sentencia .= " AND  a.provincia = :provincia";
                    $arr[":provincia"] = "$ciudad";  
                }
                if($orden!=""){
                    if($orden=="fecha"){
                        $sentencia .= " order by a.fechaPublicacion DESC limit 0,5";
                    }else if($orden=="likes"){
                        $sentencia .= " order by  a.likes DESC limit 0,5";
                    }
                }else{
                    $sentencia .=" order by a.tipsus DESC,a.fechaPublicacion DESC limit 0,5";
                }
                $db=Db::getConnect();
                $sql=$db->prepare($sentencia);
                foreach ($arr as $key => &$val) {
                    $sql->bindParam($key, $val);
                }
                $sql->execute();
                $output="";
                $id=0;
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $imagen=explode(",",$row['imagenes']);
                $final=SITE.$imagen[0];
                $output .='<div class="card overflow-hidden idair" id="'.$id.'">
                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                    <div class="d-md-flex">
                        <div class="item-card9-img">
                        <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
                            <div class="item-card9-imgs">
                            <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                            </div>
                        </a>
                            <div class="item-card9-icons">
                            <a href="javascript:void(0)" onclick="darlike('.$row['id_anuncio'].')" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
                            <br>
                            <div style="text-align:center;color:black;" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
                            </div>
                        </div>
                        <div class="card border-0 mb-0">
                            <div class="card-body ">
                            <div class="item-card9">
                                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
                                <p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
                            </div>
                            </div>
                            <div class="card-footer pt-4 pb-4">
                                <div class="item-card9-footer d-flex">
                                    <div class="item-card9-cost">
                                        <h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
                                    </div>
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                        $id++; 
                    }
                    return $output;
              
                }
                public static function listarAnunciosCarga2($categoria1,$categoria2,$categoria3,$categoria4,$categoria5,$categoria6,$categoria7,$categoria8,$categoria9,$ciudad,$orden,$precio,$precio2,$pais,$limite){
                    $sentencia="SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito where";
                    $arr=array();
                    if($pais!=""){
                        $sentencia .= " a.pais = :pais AND";
                        $arr[":pais"] = "$pais";
                    }
                    if($categoria1!=""){
                        if($categoria2=="" && $categoria3=="" && $categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""){
                        $sentencia .= " a.categoria = :categoria1 AND";
                        $arr[":categoria1"] = "$categoria1";
                        }else{
                        $sentencia .= " a.categoria = :categoria1 OR";
                        $arr[":categoria1"] = "$categoria1";
                        }   
                    }
                    if($categoria2!=""){
                        if($categoria3=="" && $categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9=="" ){
                        $sentencia .= " a.categoria = :categoria2 AND";
                        $arr[":categoria2"] = "$categoria2";
                        }else{
                        $sentencia .= " a.categoria = :categoria2 OR";
                        $arr[":categoria2"] = "$categoria2";
                        }   
                    }
                    if($categoria3!=""){
                        if($categoria4=="" && $categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9=="" ){
                        $sentencia .= " a.categoria = :categoria3 AND";
                        $arr[":categoria3"] = "$categoria3";
                        }else{
                        $sentencia .= " a.categoria = :categoria3 OR";
                        $arr[":categoria3"] = "$categoria3";
                        }   
                    }
                    if($categoria4!=""){
                        if($categoria5=="" && $categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""  ){
                        $sentencia .= " a.categoria = :categoria4 AND";
                        $arr[":categoria4"] = "$categoria4";
                        }else{
                        $sentencia .= " a.categoria = :categoria4 OR";
                        $arr[":categoria4"] = "$categoria4";
                        }   
                    }
                    if($categoria5!=""){
                        if($categoria6=="" && $categoria7=="" && $categoria8=="" && $categoria9==""){
                        $sentencia .= " a.categoria = :categoria5 AND";
                        $arr[":categoria5"] = "$categoria5";
                        }else{
                        $sentencia .= " a.categoria = :categoria5 OR";
                        $arr[":categoria5"] = "$categoria5";
                        }   
                    }
                    if($categoria6!=""){
                        if($categoria7=="" && $categoria8=="" && $categoria9==""){
                        $sentencia .= " a.categoria = :categoria6 AND";
                        $arr[":categoria6"] = "$categoria6";
                        }else{
                        $sentencia .= " a.categoria = :categoria6 OR";
                        $arr[":categoria6"] = "$categoria6";
                        }   
                    }
                    if($categoria7!=""){
                        if($categoria8=="" && $categoria9==""){
                        $sentencia .= " a.categoria = :categoria7 AND";
                        $arr[":categoria7"] = "$categoria7";
                        }else{
                        $sentencia .= " a.categoria = :categoria7 OR";
                        $arr[":categoria7"] = "$categoria7";
                        }   
                    }
                    if($categoria8!=""){
                        if($categoria9=="" ){
                        $sentencia .= " a.categoria = :categoria8 AND";
                        $arr[":categoria8"] = "$categoria8";
                        }else{
                        $sentencia .= " a.categoria = :categoria8 OR";
                        $arr[":categoria8"] = "$categoria8";
                        }   
                    }
                    if($categoria9!=""){
                        $sentencia .= " a.categoria = :categoria9 AND";
                        $arr[":categoria9"] = "$categoria9";                       
                    }
                    if($precio!="" && $precio2!=""){
                    $sentencia .= " a.precio BETWEEN :prec AND :prec2 ";
                    $arr[":prec"] = "$precio";  
                    $arr[":prec2"] = "$precio2";  
                    }
                    if($ciudad!=""){
                        $sentencia .= " AND  a.provincia = :provincia";
                        $arr[":provincia"] = "$ciudad";  
                    }
                    if($orden!=""){
                        if($orden=="fecha"){
                            $sentencia .= " order by a.fechaPublicacion DESC limit :limite,5";
                        }else if($orden=="likes"){
                            $sentencia .= " order by  a.likes DESC limit :limite,5";
                        }
                    }else{
                        $sentencia .=" order by a.tipsus DESC,a.fechaPublicacion DESC limit :limite,5";
                    }
                    $db=Db::getConnect();
                    $sql=$db->prepare($sentencia);
                    foreach ($arr as $key => &$val) {
                        $sql->bindParam($key, $val);
                    }
                    $sql->bindParam("limite",$limite,PDO::PARAM_INT);
                    $sql->execute();
                    $output="";
                    $verificacion=$sql->rowCount();
                    $ad=$limite;
                    if($verificacion>=1){
                        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                            $imagen=explode(",",$row['imagenes']);
                            $final=SITE.$imagen[0];
                    $output .='<div class="card overflow-hidden idair" id="'.$ad.'">
                    <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                        <div class="d-md-flex">
                            <div class="item-card9-img">
                                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
                                <div class="item-card9-imgs">
                                <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                                </div>
                                </a>
                                <div class="item-card9-icons">
                                <a href="javascript:void(0)" onclick="darlike('.$row['id_anuncio'].')" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
                                <br>
                                <div style="text-align:center;color:black;" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
                                </div>
                            </div>
                            <div class="card border-0 mb-0">
                                <div class="card-body ">
                                <div class="item-card9">
                                    <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
                                    <p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
                                </div>
                                </div>
                                <div class="card-footer pt-4 pb-4">
                                    <div class="item-card9-footer d-flex">
                                        <div class="item-card9-cost">
                                            <h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
                                        </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                            $ad++; 
                        }}else{
                            $output=1;
                        }
                        return $output;
                  
                    }
            

        public static function listarAnuncios3($palabra,$pais){
                $db=Db::getConnect();
                $sql=$db->prepare('SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,d.provincia,a.nombre FROM tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tblpais as p on p.id_pais=a.pais inner join tblciudad as ci on ci.id_ciudad=a.provincia inner join tbldistrito as d on d.id_distrito=a.distrito WHERE  a.pais=:pais AND CONCAT(a.nombre,a.descripcion,c.nombreCategoria,p.pais,ci.ciudad,d.provincia,a.preferencia,a.nacionalidad,a.precio) like :palabra  order by tipsus DESC,fechaPublicacion DESC limit 0,5');
                $sql->bindValue('palabra','%'.$palabra.'%');
                $sql->bindValue('pais',$pais);
                $sql->execute();
                $output="";
                $id=0;
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $imagen=explode(",",$row['imagenes']);
                $final=SITE.$imagen[0];
                $output .='<div class="card overflow-hidden idair" id="'.$id.'">
                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                    <div class="d-md-flex">
                        <div class="item-card9-img">
                            <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
                            <div class="item-card9-imgs">
                            <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                            </div>
                            </a>
                            <div class="item-card9-icons">
                            <a href="javascript:void(0)" onclick="darlike('.$row['id_anuncio'].')" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
                            <br>
                            <div style="text-align:center;color:black;" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
                            </div>
                        </div>
                        <div class="card border-0 mb-0">
                            <div class="card-body ">
                            <div class="item-card9">
                                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
                                <p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
                            </div>
                            </div>
                            <div class="card-footer pt-4 pb-4">
                                <div class="item-card9-footer d-flex">
                                    <div class="item-card9-cost">
                                        <h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
                                    </div>
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                        $id++; 
                    }
                return $output;
                }


        public static function listarAnunciosCarga3($palabra,$id_limit,$pais){
                    $db=Db::getConnect();
                    $sql=$db->prepare('SELECT a.id_anuncio,a.imagenes,a.precio,a.likes,c.nombreCategoria,a.descripcion,d.provincia,a.nombre FROM tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tblpais as p on p.id_pais=a.pais inner join tblciudad as ci on ci.id_ciudad=a.provincia inner join tbldistrito as d on d.id_distrito=a.distrito WHERE  a.pais=:pais AND CONCAT(a.nombre,a.descripcion,c.nombreCategoria,p.pais,ci.ciudad,d.provincia,a.preferencia,a.nacionalidad,a.precio) like :palabra  order by tipsus DESC,fechaPublicacion DESC limit :id_limit,5');
                    $sql->bindValue('palabra','%'.$palabra.'%');
                    $sql->bindValue('id_limit',$id_limit,PDO::PARAM_INT);
                    $sql->bindValue('pais',$pais);
                    $sql->execute();
                    $output="";
                    $verificacion=$sql->rowCount();
                    $ad=$id_limit;
                    if($verificacion>=1){
                        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                            $imagen=explode(",",$row['imagenes']);
                            $final=SITE.$imagen[0];
                            $output .='<div class="card overflow-hidden idair" id="'.$ad.'">
                            <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                                <div class="d-md-flex">
                                    <div class="item-card9-img">
                                        <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'">
                                        <div class="item-card9-imgs">
                                        <img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" style="height:197px;width:480px;" class="lazy cover-image">
                                        </div>
                                        </a>
                                        <div class="item-card9-icons">
                                        <a href="javascript:void(0)" onclick="darlike('.$row['id_anuncio'].')" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
                                        <br>
                                        <div style="text-align:center;color:black;" id="cantLikes'.$row['id_anuncio'].'">'.$row['likes'].'</div>
                                        </div>
                                    </div>
                                    <div class="card border-0 mb-0">
                                        <div class="card-body ">
                                        <div class="item-card9">
                                            <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="text-dark"><h4 class="font-weight-semibold mt-1">'.stripslashes($row['nombre']).' </h4></a>
                                            <p class="mb-0 leading-tight">'.stripslashes($row['descripcion']).'</p>
                                        </div>
                                        </div>
                                        <div class="card-footer pt-4 pb-4">
                                            <div class="item-card9-footer d-flex">
                                                <div class="item-card9-cost">
                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$/'.$row['precio'].'</h4>
                                                </div>
                                            <div class="ml-auto">
                                                <a href="javascript:void(0)" class="location"><i class="fa fa-map-marker text-muted mr-1"></i>'.stripslashes($row['provincia']).'</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                    $ad++; 
                                }
                    }else{
                        $output=1;
                    }
                
                    return $output;
        }


        public static function listarCiudades($pais){
            $db=Db::getConnect();
            $sql=$db->prepare('SELECT id_ciudad,ciudad from tblciudad where id_paisfk=:pais');
            $sql->bindValue('pais',$pais);
            $sql->execute();
            $output="";
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $output .='<div class="form-check ">
            <input class="form-check-input" type="radio" name="ciudadFilters" id="inlineRadio1" value="'.$row['id_ciudad'].'">
            <label class="form-check-label" for="inlineRadio1">'.$row['ciudad'].'</label>
            </div>';
                }
            return $output;
            }

        public static function listarCantidadCategoria($pais){
            $db=Db::getConnect();
            $sql=$db->prepare('SELECT count(*) as cat from tblanuncios WHERE pais=:pais group by categoria');
            $sql->bindValue('pais',$pais);
            $sql->execute();
            $output="";
            $i=1;
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $output .='<b id="cant'.$i.'">'.$row['cat'].'</b>';
            $i++;
            }
            return $output;
        }

    public static function SeleccionarMegusta($id_anuncio,$id_usuario){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT id_anuncio from tbllikes where id_anuncio=:id_anuncio and id_usuario=:id_usuario limit 1');
        $sql->bindValue('id_anuncio',$id_anuncio);
        $sql->bindValue('id_usuario',$id_usuario);
        $sql->execute();   
        $verificacion=$sql->rowCount();
        if($verificacion>0){
            $insert=$db->prepare('DELETE FROM  tbllikes WHERE id_anuncio=:id_anuncio and id_usuario=:id_usuario limit 1');
            $insert->bindValue('id_anuncio',$id_anuncio);
            $insert->bindValue('id_usuario',$id_usuario);
            $insert->execute();
            $update=$db->prepare('UPDATE tblanuncios set likes=likes-1 where id_anuncio=:id_anuncio limit 1');
            $update->bindValue('id_anuncio',$id_anuncio);
            $update->execute();
            return 1;
        }else{
            $insert=$db->prepare('INSERT INTO tbllikes VALUES(NULL,:id_anuncio,:id_usuario)');
            $insert->bindValue('id_anuncio',$id_anuncio);
            $insert->bindValue('id_usuario',$id_usuario);
            $insert->execute();
            $update=$db->prepare('UPDATE tblanuncios set likes=likes+1 where id_anuncio=:id_anuncio limit 1');
            $update->bindValue('id_anuncio',$id_anuncio);
            $update->execute();
            return 0;
        }                  
    }                 

}
?>