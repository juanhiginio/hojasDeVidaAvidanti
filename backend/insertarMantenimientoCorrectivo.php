<?php
session_start();

$conn = include('./connection.php');

header('Content-Type: application/json; charset=utf-8');

if (!$conn) {
    die(json_encode(['status' => 'error', 'message' => 'Error en la conexión a la base de datos.']));
}

$ejecutorMantenimiento = $_POST['ejecutorMantenimiento'] ?? null;
$fechaMantenimiento = $_POST['fechaMantenimiento'] ?? null;
$problemaPresentado = $_POST['problemaPresentado'] ?? null;
$diagnostico = $_POST['diagnostico'] ?? null;
$solucion = $_POST['solucion'] ?? null;
$observaciones = $_POST['observaciones'] ?? null;
$serialEquipo = $_POST['serialEquipo'] ?? null; 

if (empty($ejecutorMantenimiento) || empty($fechaMantenimiento) || empty($problemaPresentado) || empty($diagnostico) || empty($solucion) || empty($observaciones)) {
    echo json_encode(['status' => 'datosFaltantes', 'message' => 'Faltan datos obligatorios.']);
    exit;
}

try {

    $sql = "INSERT INTO mantenimientos (ejecutor, fecha, problema, diagnostico, solucion, observaciones, serial, id_tipo, id_responsable) VALUES (:ejecutor, :fecha, :problema, :diagnostico, :solucion, :observaciones, 'serialPrueba1', 2, 2)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":ejecutor", $ejecutorMantenimiento);
    $stmt->bindParam(":fecha", $fechaMantenimiento);
    $stmt->bindParam(":problema", $problemaPresentado);
    $stmt->bindParam(":diagnostico", $diagnostico);
    $stmt->bindParam(":solucion", $solucion);
    $stmt->bindParam(":observaciones", $observaciones);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $response = ['status' => 'success', 'message' => 'Registro de mantenimiento agregado exitosamente.'];
    } else {
        $response = ['status' => 'error', 'message' => 'No se pudo agregar el registro del mantenimiento.'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $err) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error al insertar el registro: ' . $err->getMessage()]);
}

