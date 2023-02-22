<?php
include('config.php');
// Conectar a la base de datos y verificar si existe un registro con el ID proporcionado
if ($existe_registro) {
  $datos = array(
    'nombre' => $nombre,
    'correo' => $correo
  );
  echo json_encode($datos);
} else {
  echo json_encode(null);
}
?>