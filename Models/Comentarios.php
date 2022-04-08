<?php
class Comentarios
{     
    public static function RegistrarComentario($nombre,$correo,$comentario){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO tblcomentarios VALUES(NULL,:nombre,:correo,:comentario)');
        $insert->bindValue('nombre',$nombre);
        $insert->bindValue('correo',$correo);
        $insert->bindValue('comentario',$comentario);
        $insert->execute();
    }
}
?>