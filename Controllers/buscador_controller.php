<?php 
require_once ('../BD/Connection.php');
require_once ('../Models/Buscador.php');
if (isset($_GET['action'])){
session_start();    
if ($_GET['action']=="listarAnuncios"){
    $resultado=Buscador::listarAnuncios($_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="listarAnunciosCarga"){
    $resultado=Buscador::listarAnunciosCarga((int)trim($_POST['limite']),$_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="listarAnuncios2"){
    $resultado=Buscador::listarAnuncios2($_POST['categoria1'],$_POST['categoria2'],$_POST['categoria3'],$_POST['categoria4'],$_POST['categoria5']
    ,$_POST['categoria6'],$_POST['categoria7'],$_POST['categoria8'],$_POST['categoria9'],$_POST['ciudad'],$_POST['orden'],$_POST['precio1'],$_POST['precio2'],$_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="listarAnunciosCarga2"){
    $resultado=Buscador::listarAnunciosCarga2($_POST['categoria1'],$_POST['categoria2'],$_POST['categoria3'],$_POST['categoria4'],$_POST['categoria5']
    ,$_POST['categoria6'],$_POST['categoria7'],$_POST['categoria8'],$_POST['categoria9'],$_POST['ciudad'],$_POST['orden'],$_POST['precio1'],$_POST['precio2'],$_SESSION['pais'],(int)trim($_POST['limite']));
    echo $resultado;
}else if($_GET['action']=="listarAnuncios3"){
    $resultado=Buscador::listarAnuncios3($_POST['palabra'],$_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="listarAnunciosCarga3"){
    $resultado=Buscador::listarAnunciosCarga3($_POST['palabra'],(int)trim($_POST['limite']),$_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="listarCiudades"){
    $resultado=Buscador::listarCiudades($_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="cantCategorias"){
    $resultado=Buscador::listarCantidadCategoria($_SESSION['pais']);
    echo $resultado;
}else if($_GET['action']=="SeleccionarMegusta"){
    if(empty($_SESSION['id_usuario'])){
        echo 2;
    }else{
        $resultado=Buscador::SeleccionarMegusta($_POST['id_anuncio'],$_SESSION['id_usuario']);
        echo $resultado;
    } 
}else{
    echo "Access Forbidden";
}
}else{
    echo "404 NOT FOUND";
}
?>