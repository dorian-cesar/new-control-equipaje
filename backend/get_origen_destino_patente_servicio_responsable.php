<?php
include 'conexion.php';
// Verificar la conexión


// Consultar los valores únicos de los campos origen, destino, patente, cod_servicio y conductor
$queryOrigen = "SELECT DISTINCT origen FROM registros";
$queryDestino = "SELECT DISTINCT destino FROM registros";
$queryPatente = "SELECT DISTINCT patente FROM registros";
$queryServicio = "SELECT DISTINCT cod_servicio FROM registros";
$queryResponsable = "SELECT DISTINCT conductor FROM registros";

// Ejecutar las consultas
$resultOrigen = $conn->query($queryOrigen);
$resultDestino = $conn->query($queryDestino);
$resultPatente = $conn->query($queryPatente);
$resultServicio = $conn->query($queryServicio);
$resultResponsable = $conn->query($queryResponsable);

// Almacenar los resultados en arrays
$origenes = [];
$destinos = [];
$patentes = [];
$servicios = [];
$responsables = [];

// Procesar los resultados
if ($resultOrigen->num_rows > 0) {
    while ($row = $resultOrigen->fetch_assoc()) {
        $origenes[] = $row['origen'];
    }
}

if ($resultDestino->num_rows > 0) {
    while ($row = $resultDestino->fetch_assoc()) {
        $destinos[] = $row['destino'];
    }
}

if ($resultPatente->num_rows > 0) {
    while ($row = $resultPatente->fetch_assoc()) {
        $patentes[] = $row['patente'];
    }
}

if ($resultServicio->num_rows > 0) {
    while ($row = $resultServicio->fetch_assoc()) {
        $servicios[] = $row['cod_servicio'];
    }
}

if ($resultResponsable->num_rows > 0) {
    while ($row = $resultResponsable->fetch_assoc()) {
        $responsables[] = $row['conductor'];
    }
}

// Crear un array con todos los resultados
$response = [
    'origenes' => $origenes,
    'destinos' => $destinos,
    'patentes' => $patentes,
    'servicios' => $servicios,
    'responsables' => $responsables
];

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
