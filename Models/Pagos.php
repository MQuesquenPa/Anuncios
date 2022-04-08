<?php
class Pagos
{     
    public static function RegistrarPago($paypalId,$idPagador,$token,$tipoSuscripcion,$id_usuario,$pago){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO tblpagos VALUES(NULL,:paypalId,:idPagador,:token,:tipo,:id_usuario,NULL,:pago)');
        $insert->bindValue('paypalId',$paypalId);
        $insert->bindValue('idPagador',$idPagador);
        $insert->bindValue('token',$token);
        $insert->bindValue('tipo',$tipoSuscripcion);
        $insert->bindValue('id_usuario',$id_usuario);
        $insert->bindValue('pago',$pago);
        $insert->execute();
    }

    public static function PagosGeneral(){
        $db=Db::getConnect();
        $sql=$db->query('SELECT precio FROM tblsuscripciones');
        $sql->execute();   
        $precio=array();
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){	
        array_push($precio,$row['precio']);
        }
        return $precio;
    }
    
}
?>