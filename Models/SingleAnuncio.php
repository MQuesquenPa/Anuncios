<?php
class Anuncios
{  
    public static function SingleAnuncio($id_anuncio){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT a.id_anuncio,a.estado,a.aforo,a.pais,a.categoria,ca.nombreCategoria,a.nombre,a.precio,a.descripcion,c.ciudad,d.provincia,a.altura,a.medida,a.edad,a.nacionalidad,a.color,a.horas,a.dias,a.likes,a.direccion,a.cantidadFotos,a.imagenes,a.celular,a.watsapp,a.fechaPublicacion,us.nombres,a.preferencia from tblanuncios as a inner join tblciudad as c on c.id_ciudad=a.provincia inner join tbldistrito as d on d.id_distrito=a.distrito inner join tblcategorias as ca on ca.id_categoria=a.categoria inner join tblusuarios as us on us.id_usuario=a.id_usuario where a.id_anuncio=:id_anuncio LIMIT 1');
        $sql->bindValue('id_anuncio',$id_anuncio);
        $sql->execute(); 
        $output="";
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            if($row['estado']==0){
                $estado='<div style="background-color:#EF0000;color:white;text-align:center"> Anuncio Retirado</div>';
            }else{
                $estado="";
            }
            $cantidadFotos=$row['cantidadFotos'];
            $imagenes=$row['imagenes'];
            $desire=explode(",",$imagenes);
            $iteds="";
            for($x=0; $x < $cantidadFotos; $x++){
            $fecha=time_passed($row['fechaPublicacion']);
                if($x==0){
                    $iteds .='<div class="carousel-item active" ><img class="lazy changeStyle" style="width:100%;height:300px;" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.DOMINIO.$desire[$x].'" alt="img"> </div>';
                }
                $iteds .='<div class="carousel-item"><img class="lazy changeStyle" style="width:100%;height:300px;" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.DOMINIO.$desire[$x].'" alt="img"></div>';
            } 
            if($row['dias']=="Todos"){
                $dias="Lun-Mar-Mier-Jue-Vie-Sab-Dom";
            }else{
                $dias=$row['dias'];
            }
            if($row['pais']=="PE"){
                $ayuda=51;
            }else if($row['pais']=="AR"){
                $ayuda=54;
            }else if($row['pais']=="BO"){
                $ayuda=591;
            }else if($row['pais']=="BR"){
                $ayuda=55;
            }else if($row['pais']=="CL"){
                $ayuda=56;
            }else if($row['pais']=="CO"){
                $ayuda=57;
            }else if($row['pais']=="EC"){
                $ayuda=593;
            }else if($row['pais']=="PY"){
                $ayuda=595;
            }else if($row['pais']=="UY"){
                $ayuda=598;
            }else if($row['pais']=="VE"){
                $ayuda=58;
            }
            if($row['watsapp']==1){
                $numeros=' <a href="tel:+'.$ayuda.$row['celular'].'" class="btn btn-danger icons"><i class="si si-phone mr-1"></i>Llamar</a>
                <a  href="https://wa.me/'.$ayuda.$row['celular'].'" target="_blank" class="btn btn-success icons"><i class="fa fa-whatsapp mr-1"></i>Enviar Mensaje Watsapp</a>';
            }else{
                $numeros=' <a href="tel:+'.$ayuda.$row['celular'].'" class="btn btn-danger icons"><i class="si si-phone mr-1"></i>Llamar</a>';
            }
            if($row['categoria']==1){
                if(is_numeric($row['medida'])){
                    $medida=$row['medida']." cm";
                }else{
                    $medida=$row['medida'];
                }
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Altura:</span> '.$row['altura'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Tamaño Miembro:</span> '.$medida.'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Color de Piel :</span> '.$row['color'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Edad :</span>'.$row['edad'].'</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Nacionalidad :</span> '.$row['nacionalidad'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Horario :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Días :</span> '.$dias.'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold" >'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="icons">
                    <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                        '.$numeros.'
                    </div>
                </div>
            </div>
           ';
            }else if($row['categoria']==2){
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Altura:</span> '.$row['altura'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Medidas:</span> '.$row['medida'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Color de Piel :</span> '.$row['color'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Edad :</span>'.$row['edad'].'</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Nacionalidad :</span> '.$row['nacionalidad'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Horario :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Días :</span> '.$dias.'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }else if($row['categoria']==3){
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Altura:</span> '.$row['altura'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Medidas:</span> '.$row['medida'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Color de Piel :</span> '.$row['color'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Edad :</span>'.$row['edad'].'</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Nacionalidad :</span> '.$row['nacionalidad'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Horario :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Días :</span> '.$dias.'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Preferencia Sexual :</span> '.$row['preferencia'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }else if($row['categoria']==4){
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Soy/Somos:</span> '.$row['color'].'</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Edad :</span>'.$row['edad'].'</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Nacionalidad :</span> '.$row['nacionalidad'].'</td>
                                    </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Días :</span> '.$dias.'</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Horario :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Preferencia Sexual :</span> '.$row['preferencia'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }else if($row['categoria']==5 || $row['categoria']==6){
                if(is_numeric($row['medida'])){
                    $medida=$row['medida']."m²";
                }else{
                    $medida=$row['medida'];
                }
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Aforo:</span> '.$row['aforo'].' personas</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Tamaño del Lugar :</span>'.$medida.'</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Nacionalidad :</span> '.$row['nacionalidad'].'</td>
                                    </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Días :</span> '.$dias.'</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Horario :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }else if($row['categoria']== 7 || $row['categoria']== 9){
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                    <tbody class="col-lg-12 col-xl-12 p-0">
                                        <tr>
                                            <td><span class="font-weight-bold">Disponibilidad del Vendedor :</span> '.$dias.'</td>
                                        </tr>
                                        <tr>
                                        <td><span class="font-weight-bold">Horario del Vendedor :</span> '.$row['horas'].' Horas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }else if($row['categoria']== 8){
                $output ='<div class="card overflow-hidden">
                <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">'.$row['nombreCategoria'].'</span></div>
                <div class="card-body h-100">
                    <div class="item-det mb-4">
                        <a href="javascript:void(0)" class="text-dark"><h3>'.$row['nombre'].'</h3></a>
                        <div class=" d-flex">
                            <ul class="d-flex mb-0">
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-map text-muted mr-1"></i>'.$row['ciudad'].','.$row['provincia'].'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-calendar text-muted mr-1"></i>'.$fecha.'</a></li>
                                <li class="mr-5"><a href="javascript:void(0)" class="icons"><i class="si si-location-pin text-muted mr-1"></i>'.$row['direccion'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-slider">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="arrow-ribbon2 bg-dark">$/'.$row['precio'].'</div>
                            <div class="carousel-inner">
                              '.$iteds.'
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            '.$estado.'
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Descripción</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                      '.$row['descripcion'].'
                    </div>
                    <h4 class="mb-4">Especificaciones</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><span class="font-weight-bold">Tipo:</span>'.$row['color'].'</td>
                                </tr>
                                <tr>
                                <td><span class="font-weight-bold">Marca:</span>'.$row['medida'].'</td>
                                </tr>
                            </tbody>
                            <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><span class="font-weight-bold">Días Atención:</span> '.$dias.'</td>
                                </tr>
                                <tr>
                                <td><span class="font-weight-bold">Horario de Vendedor:</span> '.$row['horas'].' Horas</td>
                                </tr>
                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">ID de Clasificación : #'.$row['id_anuncio'].'</a>
                            </div>
                            <div class="col col-auto">
                                Publicado Por <a class="mb-0 font-weight-bold">'.$row['nombres'].'</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="icons">
                <a href="javascript:void(0)"  onclick="singleLike('.$row['id_anuncio'].')" class="btn btn-primary icons"><i class="si si-heart  mr-1" ></i><b id="heartBefore">'.$row['likes'].'</b></a>
                    '.$numeros.'
                </div>
                </div>
            </div>';
            }
        }
        return $output;          
    }


    public static function publicacionesAsociadas($id_categoria,$pais,$id_anuncio){
            $db=Db::getConnect();
            $sql=$db->prepare('SELECT a.id_anuncio,a.celular,a.imagenes,a.fechaPublicacion,a.precio,a.likes,c.nombreCategoria,a.descripcion,di.provincia,a.nombre from tblanuncios as a inner join tblcategorias as c on a.categoria=c.id_categoria inner join tbldistrito as di on di.id_distrito=a.distrito  where a.pais=:pais AND a.categoria=:id_categoria AND a.id_anuncio!=:id_anuncio order by fechaPublicacion DESC limit 8');
            $sql->bindValue('id_categoria',$id_categoria);
            $sql->bindValue('pais',$pais);
            $sql->bindValue('id_anuncio',$id_anuncio);
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
                    <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'"></a>
                        <img style="height:250px;" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'" alt="img" class="lazy cover-image">
                    </div>
                    <div class="item-card7-overlaytext">
                        <a href="javascript:void(0)" class="text-white">'.$row['nombreCategoria'].'</a>
                        <h4  class="font-weight-semibold mb-0">$/'.$row['precio'].'</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="item-card7-desc">
                    <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'"><h4 class="font-weight-semibold">'.$row['nombre'].'</h4></a>
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

    public static function MasPopulares($id_categoria,$pais,$id_anuncio){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT id_anuncio,nombre,precio,imagenes from tblanuncios where pais=:pais AND categoria!=:id_categoria AND id_anuncio!=:id_anuncio order by likes DESC limit 7');
        $sql->bindValue('id_categoria',$id_categoria);
        $sql->bindValue('pais',$pais);
        $sql->bindValue('id_anuncio',$id_anuncio);
        $sql->execute();
        $output="";
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $imagen=explode(",",$row['imagenes']);
            $final=DOMINIO.$imagen[0];
            $output .='
            <li class="news-item">
                <table cellpadding="4">
                    <tr>
                        <td> <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'"><img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'"  class="lazy w-8" /></a></td>
                        <td><h5 class="mb-1 ">'.$row['nombre'].'</h5><a href="../Anuncios/index.php?id='.$row['id_anuncio'].'" class="btn-link">Ver Anunció</a><span class="float-right font-weight-bold">$/'.$row['precio'].'</span></td>
                    </tr>
                </table>
            </li>';
        }
        return $output;
    }

    public static function AnunciosLike($id_categoria,$pais,$id_anuncio){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT id_anuncio,nombre,precio,imagenes,likes,precio from tblanuncios where pais=:pais AND categoria=:id_categoria AND id_anuncio!=:id_anuncio order by likes DESC limit 5');
        $sql->bindValue('id_categoria',$id_categoria);
        $sql->bindValue('pais',$pais);
        $sql->bindValue('id_anuncio',$id_anuncio);
        $sql->execute();
        $output="";
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $imagen=explode(",",$row['imagenes']);
            $final=DOMINIO.$imagen[0];
            $output .='
            <li class="item">
            <div class="media m-0 mt-0 p-5">
                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'"><img class="lazy mr-4" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$final.'"  alt="img"></a>
                <div class="media-body">
                <a href="../Anuncios/index.php?id='.$row['id_anuncio'].'"> <h4 class="mt-2 mb-1">'.$row['nombre'].'</h4></a>
                    <span class="rated-products-ratings">
                        <i class="fa fa-heart text-danger" style="margin-left:2%"> </i>
                        '.$row['likes'].'
                    </span>
                    <div class="h5 mb-0 font-weight-semibold mt-1">$/'.$row['precio'].'</div>
                </div>
            </div>
        </li>';
        }
        return $output;
    }

}
function time_passed($get_timestamp)
{       date_default_timezone_set("America/Lima");
        $timestamp = strtotime($get_timestamp);
        $diff = getDate()[0]- $timestamp;

        if ($diff == 0) 
             return 'justo ahora';

        if ($diff > 604800)
            return date("d M Y",$timestamp);

        $intervals = array
        (
            //1                   => array('año',    31556926),
           // $diff < 31556926    => array('mes',   2628000),
           // $diff < 2629744     => array('semana',    604800),
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );

        $value = floor($diff/$intervals[1][1]);
        return 'hace '.$value.' '.$intervals[1][0].($value > 1 ? 's' : '');
}
?>