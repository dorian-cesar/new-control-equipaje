<?php
// Conexión a la base de datos
include 'conexion.php';

// Consulta para obtener los valores únicos de origen y destino
$sql_origen = "SELECT DISTINCT origen FROM registros";
$sql_destino = "SELECT DISTINCT destino FROM registros";

$result_origen = $conn->query($sql_origen);
$result_destino = $conn->query($sql_destino);

$origenes = array();
$destinos = array();

if ($result_origen->num_rows > 0) {
    while($row = $result_origen->fetch_assoc()) {
        $origenes[] = $row['origen'];
    }
}

if ($result_destino->num_rows > 0) {
    while($row = $result_destino->fetch_assoc()) {
        $destinos[] = $row['destino'];
    }
}

// Devolvemos los resultados en formato JSON
$response = array(
    "origenes" => $origenes,
    "destinos" => $destinos
);

echo json_encode($response);

$conn->close();
?>
