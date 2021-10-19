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
 
$S_ID = $obj['Usuario_id'];
 
$S_Usuario= $obj['Usuario_nombre'];
 
$S_Telefono = $obj['Usuario_telefono'];

$S_Correo = $obj['Usuario_correo'];

$S_Contraseña = $obj['Usuario_contraseña'];
 

$Sql_Query = "UPDATE usuario SET Usuario_nombre= '$S_Usuario', Usuario_telefono = '$S_Telefono', Usuario_correo = '$S_Correo', Usuario_contraseña = '$S_Contraseña' WHERE Usuario_id = $S_ID";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El Usuario ha sido actualizado correctamente ...' ;
  
 }
 else{
 
$MSG = 'Inténtelo de nuevo';
 
 }
 $json = json_encode($MSG);
 echo $json ;
 mysqli_close($con);
?>