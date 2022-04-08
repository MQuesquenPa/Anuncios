<?php 
require_once ('../BD/Connection.php');
require_once ('../Models/Publicacion.php');
if (isset($_GET['action'])){
if ($_GET['action']=="comboBoxPais"){
    $resultado=Publicacion::ComboBoxPaises();   
    echo $resultado;
}else if ($_GET['action']=="comboBoxProvincias"){
    $resultado=Publicacion::ComboBoxProvincias($_POST['pais']);   
    echo $resultado;
}else if ($_GET['action']=="comboBoxDistrito"){
    $resultado=Publicacion::ComboBoxDistrito($_POST['ciudad']);   
    echo $resultado;
}else if ($_GET['action']=="comboBoxCategorias"){
    $resultado=Publicacion::ComboBoxCategorias();   
    echo $resultado;
}else if ($_GET['action']=="registrarPublicacion"){
    session_start();
    $resultado1=Publicacion::TraerPublicacionCantidadUsuario($_SESSION['id_usuario']);   
    if($resultado1>0){
    for($x=0; $x < $_POST['txtCantidadFotos']; $x++){
        $imagen=$_FILES["nuestroinput"];
        $uploadPath = "Design/upload_images/"; 
        $fileName = basename($imagen["name"][$x]); 
        $imageUploadPath = $uploadPath . $fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
        $imageTemp = $imagen["tmp_name"][$x]; 
        $ruta=$uploadPath.md5($imageTemp).".".$fileType;
        if(empty($array)){
            $array=array();
            array_push($array,$ruta);
        }else{
            array_push($array,$ruta);
        }
        if($_FILES["nuestroinput"]["size"][$x]<5000000){
        $subir=Publicacion::subirImagenWebpVarias("../".$ruta,$imageTemp);
        }else{
            $subir=3;
        }   
    }
    if($subir==1){
        $desire=implode(",", $array);
        Publicacion::RegistrarPublicacion($_POST['txtCategoria'],addslashes($_POST['txtNombreAnuncio']),$_POST['txtPrecioAnuncio']
        ,addslashes($_POST['txtDescripcionAnuncio']),$_POST['txtPaises'],$_POST['txtProvincias'],$_POST['txtDistrito']
        ,$_POST['txtCantidadFotos'],$desire,$_POST['txtAlturaAnuncio'],addslashes($_POST['txtMedidasAnuncio']),$_POST['txtEdadAnuncio'],
        addslashes($_POST['txtNacionalidadAnuncio']),addslashes($_POST['txtColorAnuncio']),$_POST['txtHorasAnuncio'],$_POST['txtDiasAnuncio'],
        $_POST['txtCelularAnuncio'],$_POST['radioWatsapp'],$_SESSION['id_usuario'],$_SESSION['suscripcion'],$_POST['txtPreferencia'],$_POST['txtAforoAnuncio'],
        addslashes($_POST['direccion']),$_POST['txtLatitud'],$_POST['txtLongitud']);
        Publicacion::ActualizarPublicacionesUsuario($_SESSION['id_usuario']);
        echo 1;
    }else if($subir==2){
        echo 2;
    }else if($subir==3){
        echo 3;
    }
}else{
  echo 4;
}
}else{
echo "Access Forbidden";
}}else{
echo "404 not found";
}
?>