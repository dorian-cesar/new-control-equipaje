<?php
// Conexión a la base de datos

include 'conexion.php';

// Capturamos los datos enviados por POST
$fechaHoraViaje = $_POST['fechaHoraViaje'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$patente = $_POST['patente'];
//$servicio = $_POST['servicio'];
//$responsable = $_POST['responsable'];

// Creamos la consulta

$sql = "SELECT * FROM registros WHERE 
        fecha_hora_viaje = '$fechaHoraViaje' AND 
        origen = '$origen' AND 
        destino ='$destino' AND
        patente = '$patente' 
        ";

// Ejecutamos la consulta

$result = $conn->query($sql);

// Convertimos los resultados en un array
$registros = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $registros[] = $row;
    }
    // Enviamos los resultados en formato JSON
    echo json_encode($registros);
} else {

    $response = [
        'status' => 'error',
        'message' => 'No se encontraron registros para los criterios seleccionados.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}



$conn->close();
