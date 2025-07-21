<?php
session_start();
require_once('conexion.php');

if (!isset($_SESSION['administrador'])) {
  $_SESSION['error'] = "Acceso denegado.";
  header("Location: ../panel.php?error=acceso-denegado");
  exit();
}

// Si se envía el formulario para modificar un evento
if (isset($_POST['id_evento'])) {
  $id_evento = intval($_POST['id_evento']);
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $entradas = mysqli_real_escape_string($conexion, $_POST['entradas']);
  $platos_principales = mysqli_real_escape_string($conexion, $_POST['platos_principales']);
  $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion'] ?? '');
  $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

  // Verificar si se subió una nueva imagen
  if (isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen = file_get_contents($_FILES['nueva_imagen']['tmp_name']);
    $formato = mime_content_type($_FILES['nueva_imagen']['tmp_name']);

    $query = "UPDATE eventos SET nombre = ?, entradas = ?, platos_principales = ?, descripcion = ?, estado = ?, ci_imagen_plato = ?, formato_imagen = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssssssi", $nombre, $entradas, $platos_principales, $descripcion, $estado, $imagen, $formato, $id_evento);
  } else {
    // No se subió nueva imagen
    $query = "UPDATE eventos SET nombre = ?, entradas = ?, platos_principales = ?, descripcion = ?, estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssssi", $nombre, $entradas, $platos_principales, $descripcion, $estado, $id_evento);
  }

  if ($stmt->execute()) {
    $_SESSION['mensaje'] = "El evento fue modificado exitosamente.";
  } else {
    $_SESSION['error'] = "Error al modificar el evento.";
  }

  header("Location: ../panel.php?seccion=mostrar-evento");
  exit();
}

// Si se envía el formulario para filtrar eventos por estado
if (isset($_POST['estado']) && empty($_POST['id_evento'])) {
  $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

  $query = "SELECT * FROM eventos WHERE estado = ?";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("s", $estado);
  $stmt->execute();
  $resultado = $stmt->get_result();

  $_SESSION['eventos'] = ($resultado->num_rows > 0) 
    ? mysqli_fetch_all($resultado, MYSQLI_ASSOC)
    : [];

  header("Location: ../panel.php?seccion=mostrar-evento");
  exit();
}

// Si llega aquí sin parámetros válidos
$_SESSION['error'] = "Solicitud inválida.";
header("Location: ../panel.php?seccion=mostrar-evento");
exit();
?>
