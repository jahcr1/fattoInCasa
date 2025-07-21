<?php
session_start();
require_once('conexion.php');

$nombre = $_POST['nombre'];
$entradas = $_POST['entradas'];
$platos_principales = $_POST['platos_principales'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'] ?? 'Disponible';

// Subida de imagen
$imagen = $_FILES['imagen']['tmp_name'];
$formato = $_FILES['imagen']['type'];
$img_data = addslashes(file_get_contents($imagen));

$query = "INSERT INTO eventos (nombre, entradas, platos_principales, descripcion, ci_imagen_plato, formato_imagen, estado)
          VALUES ('$nombre', '$entradas', '$platos_principales', '$descripcion', '$img_data', '$formato', '$estado')";

if (mysqli_query($conexion, $query)) {
    $_SESSION['mensaje'] = "Evento cargado correctamente.";
} else {
    $_SESSION['mensaje'] = "Error al guardar el evento.";
}

header("Location: ../panel.php?seccion=cargar-evento");
exit;
?>
