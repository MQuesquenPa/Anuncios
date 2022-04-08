<?php 
session_start();
require_once ('../BD/Connection.php');
require_once ('../Models/Usuario.php');
require_once ('../Models/Pagos.php');
if (isset($_GET['action'])){
if ($_GET['action']=="pagar"){
    if(empty($_POST['pago']) || empty($_POST['token']) || empty($_POST['pagador'] || empty($_SESSION['id_usuario']))){
        echo 1;
    }else{
    $fecha = new DateTime();
    Pagos::RegistrarPago($_POST['pago'],$_POST['pagador'],$_POST['token'],$_POST['tipoPago'],$_SESSION['id_usuario'],$_POST['precio']);
    if($_POST['tipoPago']==2){
        Usuario::ActualizarPlan($_POST['tipoPago'],$_SESSION['id_usuario'],15);
        $_SESSION['suscripcion']=2;
        echo 2;
    }else if($_POST['tipoPago']==3){
        Usuario::ActualizarPlan($_POST['tipoPago'],$_SESSION['id_usuario'],25);
        $_SESSION['suscripcion']=3;
        echo 2;
    }  
    }  
}else if($_GET['action']=="gratuito"){
    if(empty($_SESSION['id_usuario'])|| $_SESSION['suscripcion']>0){
         echo 1;   
    }else{
        Usuario::ActualizarPlan(1,$_SESSION['id_usuario'],10); 
        $_SESSION['suscripcion']=1;
        echo 2;
    }

}else{
    echo "ninguna accion seleccionada";
}
}else{
    echo "404 Not Found";
}
?>