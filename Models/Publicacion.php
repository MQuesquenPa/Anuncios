<?php
class Publicacion
{  

public static function ComboBoxPaises(){
        $db=Db::getConnect();
        $sql=$db->query('SELECT id_pais, pais FROM tblpais');
        $sql->execute();        
        //Select1
        $cadena="<select id='txtPaises' name='txtPaises' class='form-control' '>".'<option value="0">Seleccionar el País</option>';
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){	 
        $cadena=$cadena.'<option value='.$row['id_pais'].'>'.($row['pais']).'</option>';
        }
        return $cadena=$cadena."</select>";           
		}
		
	public static function ComboBoxProvincias($id_pais){
		$db=Db::getConnect();
        $sql=$db->prepare('SELECT id_ciudad,ciudad FROM tblciudad where id_paisfk=:idpais');
        $sql->bindValue('idpais',$id_pais);
        $sql->execute();      
			//Select1
			$cadena="<select id='txtProvincias' name='txtProvincias' class='form-control' onfocusout='validarComboBoxProvincias()'>".'<option value="0">Seleccionar la Provincia</option>';
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){	 
			$cadena=$cadena.'<option value='.$row['id_ciudad'].'>'.($row['ciudad']).'</option>';
			}
			return $cadena=$cadena."</select><span id='spanProvincias' style='display:none;'></span>";           
        }
            
    public static function ComboBoxDistrito($id_ciudad){
		$db=Db::getConnect();
        $sql=$db->prepare('SELECT id_distrito,provincia FROM tbldistrito where id_ciudadfk=:id_ciudad');
        $sql->bindValue('id_ciudad',$id_ciudad);
        $sql->execute();      
			//Select1
			$cadena="<select id='txtDistrito' name='txtDistrito' class='form-control' onfocusout='validarComboBoxDistrito()'>".'<option value="0">Seleccionar el Distrito</option>';
			while($row = $sql->fetch(PDO::FETCH_ASSOC)){	 
			$cadena=$cadena.'<option value='.$row['id_distrito'].'>'.($row['provincia']).'</option>';
			}
			return $cadena=$cadena."</select><span id='spanDistrito' style='display:none;'></span>";           
        }
    public static function ComboBoxCategorias(){
            $db=Db::getConnect();
            $sql=$db->query('SELECT id_categoria,nombreCategoria FROM tblcategorias');
            $sql->execute();        
            //Select1
            $cadena="<select id='txtCategoria' name='txtCategoria' class='form-control' onfocusout='validarComboBoxCategoria()'>".'<option value="0">Seleccione la Categoría</option>';
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){	 
            $cadena=$cadena.'<option value='.$row['id_categoria'].'>'.($row['nombreCategoria']).'</option>';
            }
            return $cadena=$cadena."</select><span id='spanCategoria' style='display:none;'></span>";           
    }     
   
   
    public static function subirImagenWebpVarias($ruta,$imageTemp){        
        $compressedImage = compressImage($imageTemp, $ruta, 75); 
             
        if($compressedImage){ 
            $statusMsg = 1; 
        }else{ 
            $statusMsg = 2; 
        } 

        return $statusMsg;
    }
    
    public static function TraerPublicacionCantidadUsuario($id_usuario){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT publicaciones FROM tblusuarios where id_usuario=:id_usuario limit 1');
        $sql->bindValue('id_usuario',$id_usuario);
        $sql->execute();   
        $output='';
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){	
        $output=$row['publicaciones'];
        }
        return $output;
}

    public static function RegistrarPublicacion($categoria,$nombre,$precio,$descripcion,$pais,$provincia,$distrito,$cantidadFotos,$imagenes,$altura,$medida,$edad,$nacionalidad,$color,$horas,$dias,$celular,$watsapp,$id_usuario,$suscrip,$preferencia,$aforo,$direccion,$latitud,$longitud){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO tblanuncios VALUES(NULL,:categoria,:nombre,:precio,:descripcion,:pais,:provincia,:distrito,:cantidadFotos,:imagenes,:altura,:medida,:edad,:nacionalidad,:color,:horas,:dias,:celular,:watsapp,:id_usuario,1,NULL,0,:tisup,:preferencia,:aforo,:direccion,:latitud,:longitud)');
        $insert->bindValue('categoria',$categoria);
        $insert->bindValue('nombre',$nombre);
        $insert->bindValue('precio',$precio);
        $insert->bindValue('descripcion',$descripcion);
        $insert->bindValue('pais',$pais);
        $insert->bindValue('provincia',$provincia);
        $insert->bindValue('distrito',$distrito);
        $insert->bindValue('cantidadFotos',$cantidadFotos);
        $insert->bindValue('imagenes',$imagenes);
        $insert->bindValue('altura',$altura);
        $insert->bindValue('medida',$medida);
        $insert->bindValue('edad',$edad);
        $insert->bindValue('nacionalidad',$nacionalidad);
        $insert->bindValue('color',$color);
        $insert->bindValue('horas',$horas);
        $insert->bindValue('dias',$dias);
        $insert->bindValue('celular',$celular);
        $insert->bindValue('watsapp',$watsapp);
        $insert->bindValue('id_usuario',$id_usuario);
        $insert->bindValue('tisup',$suscrip);
        $insert->bindValue('preferencia',$preferencia);
        $insert->bindValue('aforo',$aforo);
        $insert->bindValue('direccion',$direccion);
        $insert->bindValue('latitud',$latitud);
        $insert->bindValue('longitud',$longitud);
        $insert->execute();
    }

    public static function ActualizarPublicacionesUsuario($id_usuario){
        $db=Db::getConnect();
        $update=$db->prepare('UPDATE tblusuarios SET publicaciones=publicaciones-1 WHERE id_usuario=:id_usuario');
        $update->bindValue('id_usuario',$id_usuario);
        $update->execute(); 
    }

    public static function traerAnuncios($id_usuario){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT a.id_anuncio,a.nombre,a.likes,a.fechaPublicacion,a.imagenes,a.precio,a.estado,ca.nombreCategoria FROM tblanuncios as a inner join tblcategorias as ca on a.categoria=ca.id_categoria where a.id_usuario=:id_usuario order by a.fechaPublicacion DESC');
        $sql->bindValue('id_usuario',$id_usuario);
        $sql->execute();   
        $output='';
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){	
        $fecha=time_passed($row['fechaPublicacion']);
        $imagenes=$row['imagenes'];
        $desire=explode(",",$imagenes);
        if($row['estado']==0){
            $estado='<a href="javascript:void(0)" class="badge badge-danger">Retirado</a>';
            $buttons=' <a onclick="RestaurarAnuncio('.$row['id_anuncio'].')" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Restaurar Anuncio"><i class="fa fa-mail-reply"></i></a>
            <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'" target="_blank" class="btn btn-primary btn-sm text-white" data-toggle="tooltip"  data-original-title="Ver"><i class="fa fa-eye"></i></a>';
        }else{
            $estado='<a href="javascript:void(0)" class="badge badge-success">Publicado</a>';
            $buttons=' <a onclick="EliminarAnuncio('.$row['id_anuncio'].')" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Retirar Anuncio"><i class="fa fa-trash-o"></i></a>
            <a href="'.DOMINIO.'Views/Anuncios/index.php?id='.$row['id_anuncio'].'" target="_blank" class="btn btn-primary btn-sm text-white" data-toggle="tooltip"  data-original-title="Ver"><i class="fa fa-eye"></i></a>';
        }
        $output .='	<tr>
        <td>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                <span class="custom-control-label"></span>
            </label>
        </td>
        <td>
            <div class="media mt-0 mb-0">
                <div class="card-aside-img">
                    <a href="javascript:void(0)"></a>
                    <img src="'.DOMINIO.$desire[0].'" alt="img">
                </div>
                <div class="media-body">
                    <div class="card-item-desc ml-4 p-0 mt-2">
                        <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold">'.$row['nombre'].'</h4></a>
                        <a href="javascript:void(0)"><i class="fa fa-clock-o mr-1"></i>'.$fecha.'</a><br>
                        <a href="javascript:void(0)"><i class="fa fa-heart mr-1"></i>'.$row['likes'].'</a>
                    </div>
                </div>
            </div>
        </td>
        <td>'.$row['nombreCategoria'].'</td>
        <td class="font-weight-semibold fs-16">$/'.$row['precio'].'</td>
        <td>
            '.$estado.'       
        </td>
        <td>
           '.$buttons.'
        </td>
    </tr>';
        }
        return $output;
    }

    public static function ActualizarEstadoPublicacion($id_anuncio,$codigo){
        $db=Db::getConnect();
        if($codigo==1){
        $update=$db->prepare('UPDATE tblanuncios SET estado=1 WHERE id_anuncio=:id_anuncio');
        $update->bindValue('id_anuncio',$id_anuncio);
        $update->execute();
        return 1;
        }else if($codigo==0){
        $update=$db->prepare('UPDATE tblanuncios SET estado=0 WHERE id_anuncio=:id_anuncio');
        $update->bindValue('id_anuncio',$id_anuncio);
        $update->execute(); 
        return 1;
        }else{
            return 0;
        }
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

function compressImage($source, $destination, $quality) { 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    imagejpeg($image, $destination, $quality); 
     
    return $destination; 
} 
?>