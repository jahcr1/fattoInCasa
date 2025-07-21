<?php
session_start();

if (!isset($_SESSION['administrador'])) {
  header("Location: ../panel.php");
  exit();
}

$seccion = $_GET['seccion'] ?? 'cargar-evento'; // Por defecto muestra la primera
?>

    <?php
    switch ($seccion) {
      case 'cargar-evento':
        header("Location: ../panel.php?seccion=cargar-evento");
        break;

      case 'mostrar-evento':
        header("Location: ../panel.php?seccion=mostrar-evento");
        break;

      case 'cargar-servicio':
        header("Location: ../panel.php?seccion=cargar-servicio");
        break;

      case 'mostrar-servicio':
        header("Location: ../panel.php?seccion=mostrar-servicio");
        break;

      default:
        echo "<div class='alert alert-danger'>Sección no encontrada</div>";
    }
    ?>
  