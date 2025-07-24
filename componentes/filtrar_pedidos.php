<?php
session_start();
require_once('conexion.php');

if (isset($_SESSION['administrador'])) {
  if (!empty($_POST['estado'])) {
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $query = "SELECT * FROM pedidos WHERE estado = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $estado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $_SESSION['pedidos_filtrados'] = $resultado->fetch_all(MYSQLI_ASSOC);
    header("Location: ../panel.php?seccion=mostrar-servicio#servicios-filtrados");
    exit();
  } else {
    $_SESSION['error'] = "Debe seleccionar un estado.";
    header("Location: ../panel.php?seccion=mostrar-servicio");
    exit();
  }
} else {
  header("Location: ../panel.php?error=acceso-denegado");
  exit();
}
