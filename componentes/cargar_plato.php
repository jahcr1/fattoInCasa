<?php
include('conexion.php');

$nombre = $_POST['nombre'];
$ingredientes = $_POST['ingredientes'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'] ?? 'Disponible';

// Subida de imagen
$imagen = $_FILES['imagen']['tmp_name'];
$formato = $_FILES['imagen']['type'];
$img_data = addslashes(file_get_contents($imagen));

$query = "INSERT INTO platos (nombre, ingredientes, descripcion, ci_imagen_plato, formato_imagen, estado)
          VALUES ('$nombre', '$ingredientes', '$descripcion', '$img_data', '$formato', '$estado')";

if (mysqli_query($conexion, $query)) {
    $_SESSION['mensaje'] = "Plato cargado correctamente.";
} else {
    $_SESSION['mensaje'] = "Error al guardar el plato.";
}

header("Location: ../panel.php");
exit;
?>
