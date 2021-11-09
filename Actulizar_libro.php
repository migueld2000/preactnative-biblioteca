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
 
$S_Libro_id = $obj['Libro_id'];
 
$S_Libro_codigo= $obj['Libro_codigo'];
 
$S_Libro_nombre = $obj['Libro_nombre'];

$S_Libro_genero = $obj['Libro_genero'];

$S_Libro_fecha = $obj['Libro_fecha'];

$S_Libro_estado = $obj['Libro_estado'];
 

$Sql_Query = "UPDATE libros SET Libro_codigo= '$S_Libro_codigo', Libro_codigo = '$S_Libro_codigo', Libro_nombre = '$S_Libro_nombre', Libro_genero = '$S_Libro_genero', Libro_fecha= '$S_Libro_fecha', Libro_estado= '$S_Libro_estado' WHERE Libro_codigo = $S_Libro_id";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El Libro ha sido actualizado correctamente ...' ;
  
 }
 else{
 
$MSG = 'Inténtelo de nuevo';
 
 }
 $json = json_encode($MSG);
 echo $json ;
 mysqli_close($con);
?>