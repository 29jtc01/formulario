<?php

// include('paginator.php');

//     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
//     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
//     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
//     $query      = "SELECT * FROM clientes";

//     $Paginator  = new Paginator( $conn, $query );

//     $results    = $Paginator->getData( $page, $limit );
// $sqlCliente   = ("SELECT * FROM clientes ORDER BY id DESC ");
// $queryCliente = mysqli_query($con, $sqlCliente);
// $cantidad     = mysqli_num_rows($queryCliente);


// Configuración
$registros_por_pagina = 20;
$limite_inferior = 0;

// Conexión a la base de datos
include('config.php');

// Calcular el número total de registros en la tabla
$sql = "SELECT COUNT(*) AS total FROM clientes";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();
$total_registros = $fila['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Determinar la página actual
if (isset($_GET['pagina']) && is_numeric($_GET['pagina'])) {
    $pagina_actual = (int) $_GET['pagina'];
} else {
    $pagina_actual = 1;
}

// Verificar que la página actual no sea mayor al total de páginas
if ($pagina_actual > $total_paginas) {
    $pagina_actual = $total_paginas;
}

// Calcular el límite para la consulta
$limite_inferior = ($pagina_actual - 1) * $registros_por_pagina;
if ($pagina_actual == 1) {
  $limite_inferior = 0;}

// Consultar los datos de la tabla
$sql = "SELECT * FROM clientes LIMIT $limite_inferior, $registros_por_pagina";
$resultado = $conn->query($sql);

// Mostrar los enlaces de paginación
$primer_registro = $limite_inferior + 1;
$ultimo_registro = min($limite_inferior + $registros_por_pagina, $total_registros);

// Mostrar el mensaje con la información de los registros
echo "<p>Mostrando " . $primer_registro . " a " . $ultimo_registro . " de " . $total_registros . " resultados totales</p>";
echo "<div class='paginacion'>";
if ($pagina_actual > 1) {
    echo "<a href='?pagina=".($pagina_actual - 1)."'class='paginacion-enlace'>Anterior</a>";
}
for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == 1 || ($i > ($pagina_actual - 2) && $i < ($pagina_actual + 2)) || $i == $total_paginas) {
    if ($i == $pagina_actual) {
        echo "<span class='paginacion-actual'>$i</span>";
    } elseif ($i <= 3 || $i >= $total_paginas - 2 || ($i >= $pagina_actual - 2 && $i <= $pagina_actual + 2)) {
        echo "<a  class='paginacion-enlace' href='?pagina=$i'>$i</a>";
    } elseif ($i == 4 && $pagina_actual > 6) {
        echo "<span class='paginacion-enlace'>...</span>";
    } elseif ($i == $total_paginas - 3 && $pagina_actual < $total_paginas - 5) {
        echo "<span class='paginacion-enlace'>...</span>";
    }
}
}
if ($pagina_actual < ($total_paginas - 0)) {
    echo "<a href='?pagina=".($pagina_actual + 1)."' class='paginacion-enlace'>Siguiente</a>";
}
// Mostrar los datos en la tabla

echo "<table class='tabla-clientes'>";
// Agregar la fila de encabezados
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Cedula</th>";
echo "<th>Nombre</th>";
echo "<th>Correo</th>";
echo "<th>Celular</th>";
echo "</tr>";
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila['id'] . "</td>";
    echo "<td>" . $fila['cedula'] . "</td>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>" . $fila['celular'] . "</td>";
    // ... Agregar aquí las columnas que deseas mostrar
    echo "</tr>";
}
echo "</table>";

// Mostrar los enlaces de paginación
echo "<div class='paginacion'>";
if ($pagina_actual > 1) {
    echo "<a href='?pagina=".($pagina_actual - 1)."'class='paginacion-enlace'>Anterior</a>";
}
for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == 1 || ($i > ($pagina_actual - 2) && $i < ($pagina_actual + 2)) || $i == $total_paginas) {
    if ($i == $pagina_actual) {
        echo "<span class='paginacion-actual'>$i</span>";
    } elseif ($i <= 3 || $i >= $total_paginas - 2 || ($i >= $pagina_actual - 2 && $i <= $pagina_actual + 2)) {
        echo "<a  class='paginacion-enlace' href='?pagina=$i'>$i</a>";
    } elseif ($i == 4 && $pagina_actual > 6) {
        echo "<span class='paginacion-enlace'>...</span>";
    } elseif ($i == $total_paginas - 3 && $pagina_actual < $total_paginas - 5) {
        echo "<span class='paginacion-enlace'>...</span>";
    }
}
}
if ($pagina_actual < ($total_paginas - 0)) {
    echo "<a href='?pagina=".($pagina_actual + 1)."' class='paginacion-enlace'>Siguiente</a>";
}
echo "</div>";

$primer_registro = $limite_inferior + 1;
$ultimo_registro = min($limite_inferior + $registros_por_pagina, $total_registros);

// Mostrar el mensaje con la información de los registros
echo "<p>Mostrando " . $primer_registro . " a " . $ultimo_registro . " de " . $total_registros . " resultados totales</p>";?>