<?php 
require_once ('../BD/Connection.php');
require_once ('../Models/Usuario.php');
if (isset($_GET['action'])){
if ($_GET['action']=="login"){
    $resultado=Usuario::Login($_POST['correo'],$_POST['contrasea']);   
    echo $resultado;
}else if($_GET['action']=="salir"){
    session_start();
    session_unset();
    session_destroy();
    header("Location:http://entreangeles.site/");
}else if($_GET['action']=="registrarUsuario"){
    $contra=password_hash($_POST['contrasea'], PASSWORD_DEFAULT,['cost'=>5]);
    $resultado=Usuario::RegistrarUsuario($_POST['correo'],$contra);
    echo $resultado;
}else if($_GET['action']=="actualizarFoto"){
    session_start();
    $imagen=$_FILES['filechange'];
    $fotoAnterior=$_POST['fotoAnterior'];
    $eliminar="../".$fotoAnterior;
    $uploadPath = "Design/upload_images/"; 
    $fileName = basename($imagen["name"]); 
    $imageUploadPath = $uploadPath . $fileName; 
    $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
        $imageTemp = $imagen["tmp_name"]; 
        $ruta=$uploadPath.md5($imageTemp).".".$fileType;
    if($imagen['size']<5000000){
        $subir=Usuario::subirImagenWebp("../".$ruta,$imageTemp);
    }else{
            $subir=3;
    }
    if($subir==1){
        if($fotoAnterior!="Design/img/anonimo.jpg"){
            unlink($eliminar); 
            Usuario::ActualizarFoto($ruta,$_SESSION['id_usuario']);
            $_SESSION['foto']=$ruta;
            echo 1;
        }else{
            Usuario::ActualizarFoto($ruta,$_SESSION['id_usuario']);
            $_SESSION['foto']=$ruta;
            echo 1;
        }      
    }else if($subir==2){
        echo 2;
    }else if($subir==3){
        echo 3;
    }

}else if($_GET['action']=="actualizarDatosUsuario"){
session_start();
if(empty($_SESSION['id_usuario'])){
echo 2;
}else{
Usuario::ActualizarDatosUsuario(addslashes($_POST['nombres']),addslashes($_POST['apellidos']),
$_POST['edad'],$_POST['telefono'],$_POST['pais'],$_SESSION['id_usuario'],addslashes($_POST['about']));
echo 1;
Usuario::ActualizarDatosSession(addslashes($_POST['nombres']),addslashes($_POST['apellidos']),
$_POST['edad'],$_POST['telefono'],$_POST['pais'],addslashes($_POST['about']));
}
}else if($_GET['action']=="traerPublicaciones"){
    session_start();
    $resultado=Usuario::TraerPublicacionCantidad($_SESSION['id_usuario']);
    echo $resultado;
}else if($_GET['action']=="actualizarContraseña"){
    session_start();
    $resultado=Usuario::VerificarPassword($_SESSION['id_usuario'],$_POST['past']);
    if($resultado==1){
        $contras=password_hash($_POST['new'], PASSWORD_DEFAULT,['cost'=>5]);
        Usuario::ActualizarPassword($_SESSION['id_usuario'],$contras);
        echo 1;
    }else if($resultado==2){
        echo 2;
    }else{
        echo 3;
    }    
}else{
    echo "ninguna accion seleccionada";
}
}else{
    echo "404 Not Found";
}
?>