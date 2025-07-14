<?php
session_start();

if (!isset($_SESSION['administrador'])) {
  header("Location: ../panel.php");
  exit();
}

$seccion = $_GET['seccion'] ?? 'cargar-menu'; // Por defecto muestra la primera
?>

    <?php
    switch ($seccion) {
      case 'cargar-menu':
        header("Location: ../panel.php?seccion=cargar-menu");
        break;

      case 'mostrar-menu':
        header("Location: ../panel.php?seccion=mostrar-menu");
        break;

      case 'tomar-pedidos':
        header("Location: ../panel.php?seccion=tomar-pedidos");
        break;

      case 'mostrar-pedidos':
        header("Location: ../panel.php?seccion=mostrar-pedidos");
        break;

      default:
        echo "<div class='alert alert-danger'>Sección no encontrada</div>";
    }
    ?>
  