<?php 
require_once ('../BD/Connection.php');
require_once ('../Models/Comentarios.php');
if (isset($_GET['action'])){
session_start();    
if ($_GET['action']=="enviarComentario"){
    $resultado=Comentarios::RegistrarComentario(addslashes($_POST['nombre']),$_POST['correo'],addslashes($_POST['comentario']));
    echo 1;
}else{
    echo "ACCESS FORBIDDEN";
}
}else{
echo "404 NOT FOUND";
}