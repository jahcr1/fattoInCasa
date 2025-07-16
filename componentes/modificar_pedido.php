<?php
session_start();
require_once('conexion.php');

if (isset($_SESSION['administrador'])) {
  if (
    isset($_POST['id_pedido'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'],
    $_POST['localidad'], $_POST['direccion'], $_POST['fecha'], $_POST['horario'],
    $_POST['tipo_servicio'], $_POST['detalle_menues'], $_POST['estado'])
  ) {
    $id = intval($_POST['id_pedido']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $localidad = mysqli_real_escape_string($conexion, $_POST['localidad']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $fecha_evento = mysqli_real_escape_string($conexion, $_POST['fecha']);
    $horario = mysqli_real_escape_string($conexion, $_POST['horario']);
    $tipo_servicio = mysqli_real_escape_string($conexion, $_POST['tipo_servicio']);
    $detalle_menues = mysqli_real_escape_string($conexion, $_POST['detalle_menues']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

    $sql = "UPDATE pedidos SET nombre=?, apellido=?, email=?, telefono=?, localidad=?, direccion=?, fecha=?, horario=?, tipo_servicio=?, detalle_menues=?, estado=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssssssi", $nombre, $apellido, $email, $telefono, $localidad, $direccion, $fecha_evento, $horario, $tipo_servicio, $detalle_menues, $estado, $id);

    if ($stmt->execute()) {
      $_SESSION['mensaje'] = "Pedido actualizado correctamente.";
    } else {
      $_SESSION['error'] = "Error al actualizar el pedido.";
    }
    header("Location: ../panel.php?seccion=mostrar-pedidos");
    exit();
  }
}

header("Location: ../panel.php?error=accion-invalida");
exit();
