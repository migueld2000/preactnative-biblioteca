<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
include 'DBConfig.php';
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Obtener datos en formato de JSON
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);

$S_Renta_id = $obj['Renta_id'];

$sql = "SELECT * FROM renta WHERE Renta_id = '$S_Renta_id'";

$result = $conn->query($sql);
$json = '';
if ($result->num_rows > 0) {
    while ($row[] = $result->fetch_assoc()) {
        $item = $row;
        $json = json_encode($item);
    }
} else {
    $json = "la renta no se encuentra ...";
}
echo $json;
$conn->close();
