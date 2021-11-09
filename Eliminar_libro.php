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
 
$Sql_Query = "DELETE FROM libros WHERE  	Libro_id = '$S_Libro_id'" ;

if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'Libro eliminado correctamente...' ;
 
 }
 else{
 
    $MSG = 'Inténtelo de nuevo';
 
 }
 $json = json_encode($MSG);
 echo $json ;
 mysqli_close($con);
?>