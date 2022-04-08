<?php
class Usuario
{     

    public static function subirImagenWebp($ruta,$imageTemp){        
            $compressedImage = compressImage($imageTemp, $ruta, 75); 
             
            if($compressedImage){ 
                $statusMsg = 1; 
            }else{ 
                $statusMsg = 2; 
            } 
    
            return $statusMsg;
    }

    
 public static function Login($user,$password){
    $db=Db::getConnect();
    $select=$db->prepare('SELECT id_usuario,nombres,apellidos,edad,foto,contrasea,rol,suscripcion,pais,telefono,aboutme from tblusuarios where correo=:correo  limit 1');
    $select->bindValue('correo',$user);
    $select->execute();
    $verificacion=$select->rowCount();
    if($verificacion>0){
        $row = $select->fetch(PDO::FETCH_NUM);
        $contrasea=$row['5'];
        if(password_verify($password,$contrasea)){
            $ip = "181.176.103.29";
            $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
            $dataSolicitud = json_decode($informacionSolicitud);
            if($row['6']==1){
            session_start();
            $_SESSION['id_usuario']=$row['0'];
            $_SESSION['nombres']=$row['1'];
            $_SESSION['apellidos']=$row['2'];
            $_SESSION['edad']=$row['3'];
            $_SESSION['foto']=$row['4'];
            $_SESSION['rol']=$row['6'];
            $_SESSION['suscripcion']=$row['7'];
            $_SESSION['pais']=$row['8'];
            $_SESSION['telefono']=$row['9'];
            $_SESSION['about']=$row['10'];
            $_SESSION['latitud']=$dataSolicitud->geoplugin_latitude;
            $_SESSION['longitud']=$dataSolicitud->geoplugin_longitude;
            $_SESSION['pais']=$dataSolicitud->geoplugin_countryCode;
            return 1;
            }else if($row['6']==2){
                session_start();
                $_SESSION['id_usuario']=$row['0'];
                $_SESSION['nombres']=$row['1'];
                $_SESSION['apellidos']=$row['2'];
                $_SESSION['edad']=$row['3'];
                $_SESSION['foto']=$row['4'];
                $_SESSION['rol']=$row['6'];
                $_SESSION['suscripcion']=$row['7'];
                $_SESSION['pais']=$row['8'];
                $_SESSION['telefono']=$row['9'];
                $_SESSION['about']=$row['10'];
                $_SESSION['latitud']=$dataSolicitud->geoplugin_latitude;
                $_SESSION['longitud']=$dataSolicitud->geoplugin_longitude;
                $_SESSION['pais']=$dataSolicitud->geoplugin_countryCode;
                return 2;   
            }
        }else{
            return 3;
        }       
    }else{
        return 4;
    }
 }

 public static function RegistrarUsuario($correo,$contrasea){
    $db=Db::getConnect();
    $select=$db->prepare('SELECT id_usuario from tblusuarios where correo=:correo  limit 1');
    $select->bindValue('correo',$correo);
    $select->execute();
    $verificacion=$select->rowCount();
    if($verificacion>0){
        return 1;
    }else{
    $insert=$db->prepare('INSERT INTO tblusuarios VALUES(NULL,"Usuario","",0,"Design/img/anonimo.jpg",0,:correo,:contrasea,0,0,2,0,0,0,0,"")');
    $insert->bindValue('correo',$correo);
    $insert->bindValue('contrasea',$contrasea);
    $insert->execute();
    $selects=$db->prepare('SELECT id_usuario,nombres,apellidos,edad,foto,rol,suscripcion,pais,telefono,aboutme from tblusuarios where correo=:correo  limit 1');
    $selects->bindValue('correo',$correo);
    $selects->execute();
    $row = $selects->fetch(PDO::FETCH_NUM);
    $ip = "181.176.103.29";
    $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
    $dataSolicitud = json_decode($informacionSolicitud);
    session_start();
    $_SESSION['id_usuario']=$row['0'];
    $_SESSION['nombres']=$row['1'];
    $_SESSION['apellidos']=$row['2'];
    $_SESSION['edad']=$row['3'];
    $_SESSION['foto']=$row['4'];
    $_SESSION['rol']=$row['5'];
    $_SESSION['suscripcion']=$row['6'];
    $_SESSION['pais']=$row['7'];
    $_SESSION['telefono']=$row['8'];
    $_SESSION['about']=$row['9'];
    $_SESSION['latitud']=$dataSolicitud->geoplugin_latitude;
    $_SESSION['longitud']=$dataSolicitud->geoplugin_longitude;
    $_SESSION['pais']=$dataSolicitud->geoplugin_countryCode;
    return 2;
    }  
 }

 public static function ActualizarPlan($tipo,$id_usuario,$publicaciones){
    $db=Db::getConnect();
    $update=$db->prepare('UPDATE tblusuarios SET suscripcion=:suscripcion,publicaciones=:publicaciones+publicaciones WHERE id_usuario=:id_usuario');
    $update->bindValue('id_usuario',$id_usuario);
    $update->bindValue('suscripcion',$tipo);
    $update->bindValue('publicaciones',$publicaciones);
    $update->execute(); 
}



public static function ActualizarFoto($foto,$id_usuario){
    $db=Db::getConnect();
    $update=$db->prepare('UPDATE tblusuarios SET foto=:foto WHERE id_usuario=:id_usuario');
    $update->bindValue('id_usuario',$id_usuario);
    $update->bindValue('foto',$foto);
    $update->execute(); 
}


public static function ActualizarDatosUsuario($nombres,$apellidos,$edad,$telefono,$pais,$id_usuario,$about){
    $db=Db::getConnect();
    $update=$db->prepare('UPDATE tblusuarios SET nombres=:nombres,apellidos=:apellidos,edad=:edad,telefono=:telefono,pais=:pais,aboutme=:about WHERE id_usuario=:id_usuario');
    $update->bindValue('id_usuario',$id_usuario);
    $update->bindValue('nombres',$nombres);
    $update->bindValue('apellidos',$apellidos);
    $update->bindValue('edad',$edad);
    $update->bindValue('telefono',$telefono);
    $update->bindValue('pais',$pais);
    $update->bindValue('about',$about);
    $update->execute(); 
}

public static function ActualizarDatosSession($nombres,$apellidos,$edad,$telefono,$pais,$about){
$_SESSION['nombres']=$nombres;
$_SESSION['apellidos']=$apellidos;
$_SESSION['edad']=$edad;
$_SESSION['telefono']=$telefono;
$_SESSION['pais']=$pais;
$_SESSION['about']=$about;
}


public static function TraerPublicacionCantidad($id_usuario){
        $db=Db::getConnect();
        $sql=$db->prepare('SELECT publicaciones FROM tblusuarios where id_usuario=:id_usuario limit 1');
        $sql->bindValue('id_usuario',$id_usuario);
        $sql->execute();   
        $output='';
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){	
        $output=$row['publicaciones']." Publicaciones Restantes";
        }
        return $output;
}

public static function VerificarPassword($id_usuario,$password){
    $db=Db::getConnect();
    $select=$db->prepare('SELECT contrasea from tblusuarios where id_usuario=:id_usuario  limit 1');
    $select->bindValue('id_usuario',$id_usuario);
    $select->execute();
    $verificacion=$select->rowCount();
    if($verificacion>0){
        $row = $select->fetch(PDO::FETCH_NUM);
        $contrasea=$row['0'];
        if(password_verify($password,$contrasea)){
            return 1;
        }else{
            return 2;
        }
    }else{
        return 3;
    }
}
 
public static function ActualizarPassword($id_usuario,$password){
    $db=Db::getConnect();
    $update=$db->prepare('UPDATE tblusuarios SET contrasea=:contrasea WHERE id_usuario=:id_usuario');
    $update->bindValue('id_usuario',$id_usuario);
    $update->bindValue('contrasea',$password);
    $update->execute(); 
}
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
 