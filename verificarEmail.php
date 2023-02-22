<?php
include('config.php');

$correo = $_REQUEST['correo'];

$jsonData = array();
$selectQuery = "SELECT correo FROM clientes WHERE correo = ?";
$stmt = mysqli_prepare($con, $selectQuery);
mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$totalCliente = mysqli_num_rows($result);

if ($totalCliente <= 0) {
  $jsonData['success'] = 0;
  $jsonData['message'] = '<p style="color:blue;">Correo disponible</p>';
} else {
  $jsonData['success'] = 1;
  $jsonData['message'] = '<p style="color:red;">Ya existe este correo <strong>(' . $correo . ')<strong></p>';
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsonData);
?>