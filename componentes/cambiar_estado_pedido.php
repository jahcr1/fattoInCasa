<?php
session_start();
require_once('conexion.php');

if (isset($_SESSION['administrador'])) {
  if (isset($_POST['id_pedido'], $_POST['nuevo_estado'])) {
    $id_pedido = intval($_POST['id_pedido']);
    $nuevo_estado = mysqli_real_escape_string($conexion, $_POST['nuevo_estado']);

    $query = "UPDATE pedidos SET estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("si", $nuevo_estado, $id_pedido);
    $stmt->execute();

    $_SESSION['mensaje'] = "Estado actualizado correctamente.";
    header("Location: ../panel.php?seccion=mostrar-servicio");
    exit();
  }
} 
header("Location: ../panel.php?error=accion-invalida");
exit();
