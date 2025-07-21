<?php
session_start();
require_once('conexion.php');

if (!isset($_SESSION['administrador'])) {
  $_SESSION['error'] = "Acceso denegado.";
  header("Location: ../panel.php?error=acceso-denegado");
  exit();
}

// Si se envía el formulario para modificar un plato
if (isset($_POST['id_plato'])) {
  $id_plato = intval($_POST['id_plato']);
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $ingredientes = mysqli_real_escape_string($conexion, $_POST['ingredientes']);
  $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion'] ?? '');
  $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

  // Verificar si se subió una nueva imagen
  if (isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen = file_get_contents($_FILES['nueva_imagen']['tmp_name']);
    $formato = mime_content_type($_FILES['nueva_imagen']['tmp_name']);

    $query = "UPDATE platos SET nombre = ?, ingredientes = ?, descripcion = ?, estado = ?, ci_imagen_plato = ?, formato_imagen = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssssi", $nombre, $ingredientes, $descripcion, $estado, $imagen, $formato, $id_plato);
  } else {
    // No se subió nueva imagen
    $query = "UPDATE platos SET nombre = ?, ingredientes = ?, descripcion = ?, estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssi", $nombre, $ingredientes, $descripcion, $estado, $id_plato);
  }

  if ($stmt->execute()) {
    $_SESSION['mensaje'] = "El plato fue modificado exitosamente.";
  } else {
    $_SESSION['error'] = "Error al modificar el plato.";
  }

  header("Location: ../panel.php?seccion=mostrar-menu");
  exit();
}

// Si se envía el formulario para filtrar platos por estado
if (isset($_POST['estado']) && empty($_POST['id_plato'])) {
  $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

  $query = "SELECT * FROM platos WHERE estado = ?";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("s", $estado);
  $stmt->execute();
  $resultado = $stmt->get_result();

  $_SESSION['platos'] = ($resultado->num_rows > 0) 
    ? mysqli_fetch_all($resultado, MYSQLI_ASSOC)
    : [];

  header("Location: ../panel.php?seccion=mostrar-menu");
  exit();
}

// Si llega aquí sin parámetros válidos
$_SESSION['error'] = "Solicitud inválida.";
header("Location: ../panel.php?seccion=mostrar-menu");
exit();
?>
