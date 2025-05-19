<?php
session_start();
require_once 'conexion.php';

// Obtener los datos del formulario
$nombre_solicitante = $_POST['nombre_solicitante'];
$rut_solicitante = $_POST['rut_solicitante'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$nombre_est = $_POST['nombre_est'];
$curso = $_POST['curso'];
$rut_estudiante = $_POST['rut_estudiante'];

$tipo = $_POST['tipo'];
$motivo = $_POST['motivo'];
$fecha = $_POST['fecha']; // formato: YYYY-MM-DD

// 1. Insertar o actualizar al solicitante
$sql_solicitante = "INSERT INTO solicitante (rut_solicitante, nombre_solicitante, telefono, correo)
VALUES ('$rut_solicitante', '$nombre_solicitante', '$telefono', '$correo')
ON DUPLICATE KEY UPDATE
  nombre_solicitante = VALUES(nombre_solicitante),
  telefono = VALUES(telefono),
  correo = VALUES(correo)";
mysqli_query($conn, $sql_solicitante);

// 2. Insertar o actualizar al estudiante
$sql_estudiante = "INSERT INTO estudiante (rut_estudiante, nombre_est, curso)
VALUES ('$rut_estudiante', '$nombre_est', '$curso')
ON DUPLICATE KEY UPDATE
  nombre_est = VALUES(nombre_est),
  curso = VALUES(curso)";
mysqli_query($conn, $sql_estudiante);

// 3. Insertar solicitud (estado por defecto es 'Recibida')
$sql_solicitud = "INSERT INTO solicitud (tipo, motivo, fecha, rut_solicitante, rut_estudiante)
VALUES ('$tipo', '$motivo', '$fecha', '$rut_solicitante', '$rut_estudiante')";

if (mysqli_query($conn, $sql_solicitud)) {
    // Obtener código de seguimiento recién insertado
    $codigo = mysqli_insert_id($conn);
    $codigo_formateado = str_pad($codigo, 5, "0", STR_PAD_LEFT);

    // Guardar en sesión los datos para mostrar en confirmación
    $_SESSION['datos_solicitud'] = [
        'codigo' => $codigo_formateado,
        'nombre_solicitante' => $nombre_solicitante,
        'rut_solicitante' => $rut_solicitante,
        'nombre_est' => $nombre_est,
        'rut_estudiante' => $rut_estudiante,
        'curso' => $curso,
        'tipo' => $tipo,
        'motivo' => $motivo,
        'fecha' => $fecha
    ];

    header("Location: confirmacion.php");
    exit();
} else {
    echo "❌ Error al guardar la solicitud: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
