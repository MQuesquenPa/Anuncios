<?php 
 $ip = "181.176.103.29";
 $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
 $dataSolicitud = json_decode($informacionSolicitud);
 $pais=$dataSolicitud->geoplugin_countryCode;
 $latitud=$dataSolicitud->geoplugin_latitude;
 $longitud=$dataSolicitud->geoplugin_longitude;
 echo $pais;
 echo $latitud;
 echo $longitud;

?>

