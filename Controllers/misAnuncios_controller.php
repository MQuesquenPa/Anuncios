<?php 
session_start();
require_once ('../BD/Connection.php');
require_once ('../Models/Publicacion.php');
if (isset($_GET['action'])){
if ($_GET['action']=="actualizarEstado"){
 $resultado=Publicacion::ActualizarEstadoPublicacion($_POST['id_anuncio'],$_POST['dato']);
 echo $resultado;
}else{
    echo "ERROR 404 NOT FOUND";
}
}else{
    echo "ACCESS NOT PERMITED";
}
?>