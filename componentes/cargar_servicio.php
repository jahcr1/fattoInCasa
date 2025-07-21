<?php
session_start();
require_once('conexion.php');

// Función para sanitizar entradas
function limpiarDato($dato) {
    return trim(htmlspecialchars($dato, ENT_QUOTES, 'UTF-8'));
}

// Función para validar email
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validar que se haya enviado por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['mensaje'] = 'Método no permitido';
    header('Location: ../panel.php?seccion=tomar-pedidos');
    exit();
}

// Capturar y limpiar datos
$nombre          = limpiarDato($_POST['nombre'] ?? '');
$apellido        = limpiarDato($_POST['apellido'] ?? '');
$email           = limpiarDato($_POST['email'] ?? '');
$telefono        = limpiarDato($_POST['telefono'] ?? '');
$localidad       = limpiarDato($_POST['localidad'] ?? '');
$direccion       = limpiarDato($_POST['direccion'] ?? '');
$fecha           = limpiarDato($_POST['fecha'] ?? '');
$horario         = limpiarDato($_POST['horario'] ?? '');
$tipo_servicio   = limpiarDato($_POST['tipo_servicio'] ?? '');
$detalle_menues  = limpiarDato($_POST['detalle_menues'] ?? '');

// Validaciones básicas
$errores = [];

if (empty($nombre)) $errores[] = 'El nombre es obligatorio';
if (empty($apellido)) $errores[] = 'El apellido es obligatorio';
if (!validarEmail($email)) $errores[] = 'Correo electrónico inválido';
if (empty($telefono)) $errores[] = 'El teléfono es obligatorio';
if (empty($localidad)) $errores[] = 'La localidad es obligatoria';
if (empty($direccion)) $errores[] = 'La dirección es obligatoria';
if (empty($fecha)) $errores[] = 'La fecha es obligatoria';
if (empty($horario)) $errores[] = 'El horario es obligatorio';
if (empty($tipo_servicio)) $errores[] = 'Debes seleccionar un tipo de servicio';
if (empty($detalle_menues)) $errores[] = 'Debes detallar los menús y cantidades';

// Si hay errores, redirigir con mensaje
if (!empty($errores)) {
    $_SESSION['mensaje'] = implode('<br>', $errores);
    header('Location: ../panel.php?seccion=tomar-pedidos');
    exit();
}

// Preparar la consulta con sentencia preparada
try {
    $stmt = $conexion->prepare("INSERT INTO pedidos (nombre, apellido, email, telefono, localidad, direccion, fecha, horario, tipo_servicio, detalle_menues) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        'ssssssssss',
        $nombre,
        $apellido,
        $email,
        $telefono,
        $localidad,
        $direccion,
        $fecha,
        $horario,
        $tipo_servicio,
        $detalle_menues
    );

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = 'Pedido registrado con éxito.';
    } else {
        $_SESSION['mensaje'] = 'Error al registrar el pedido.';
    }

    $stmt->close();
} catch (Exception $e) {
    $_SESSION['mensaje'] = 'Error inesperado: ' . $e->getMessage();
}

header('Location: ../panel.php?seccion=tomar-pedidos');
exit();
?>
