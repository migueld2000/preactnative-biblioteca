<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include 'DBConfig.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$S_Renta_id = $obj['Renta_id'];
 
$S_Libro_id= $obj['Libro_id'];
 
$S_Usuario_id = $obj['Usuario_id'];

$S_renta_fecha = $obj['renta_fecha'];
 

$Sql_Query = "UPDATE renta SET Libro_id= '$S_Libro_id', Usuario_id = '$S_Usuario_id', renta_fecha = '$S_renta_fecha' WHERE Renta_id = $S_Renta_id";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'La reanta ha sido actualizado correctamente ...' ;
  
 }
 else{
 
$MSG = 'Inténtelo de nuevo';
 
 }
 $json = json_encode($MSG);
 echo $json ;
 mysqli_close($con);
?>