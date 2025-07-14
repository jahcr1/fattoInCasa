<?php
session_start();

$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Panel Administrativo FATTO IN CASA</title>


  <!-- ICONOS DE BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- ICONOS DE FONTAWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DATATABLES CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <!-- CSS PROPIO -->
  <link rel="stylesheet" href="CSS/styles.css">

  <style>
    .estado-pendiente {
      color: orange;
    }

    .estado-confirmado {
      color: limegreen;
    }

    .estado-rechazado {
      color: red;
    }
  </style>

</head>

<body id="body-panel">

  <!-- NAV PRINCIPAL -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 pt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FATTO IN CASA</a>

      <div class="d-flex ms-auto">
        <?php if (isset($_SESSION['administrador'])): ?>
          <span class="navbar-text me-4 text-warning">
            Bienvenido, <?= htmlspecialchars($_SESSION['administrador']) ?>
          </span>
        <?php else: ?>
          <form action="./componentes/acceder.php" method="POST" class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 py-2 px-2" role="login">
            <input class="form-control form-control" type="text" name="usuario-admin" placeholder="Usuario" aria-label="Usuario" autocomplete="off">
            <input class="form-control form-control" type="password" name="pass-admin" placeholder="Contraseña" aria-label="Contraseña">
            <button class="btn btn-warning text-dark w-100 w-lg-auto" type="submit">Iniciar sesión</button>
          </form>

        <?php endif; ?>
      </div>
    </div>
  </nav>


  <?php if (isset($_SESSION['administrador'])) { ?>
    <?php
    $seccion = $_GET['seccion'] ?? 'cargar-menu';
    ?>

    <div class="container-fluid">
      <div class="row flex-lg-nowrap">

        <!-- SIDEBAR -->
        <div class="col-12 col-lg-2 sidebar">
          <a href="./componentes/logout.php" class="btn btn-sm btn-outline-warning text-center text-danger" onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?');">Cerrar sesión</a>
          <a class="nav-link-inactive text-white px-4 w-100 text-center">Panel Administrativo</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=cargar-menu" class="nav-link">Cargar Menú</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=mostrar-menu" class="nav-link">Mostrar Menúes</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=tomar-pedidos" class="nav-link">Cargar Servicio de Catering</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=mostrar-pedidos" class="nav-link">Ver Pedidos</a>
        </div>

        <!-- CONTENIDO PRINCIPAL -->
        <div class="col-12 col-lg-10 p-4">
          <!-- Mostrar mensaje si hay -->
          <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info"><?= $mensaje ?></div>
          <?php endif; ?>

          <?php
          switch ($seccion) {
            case 'cargar-menu':
          ?>
              <section id="cargar-menu" class="seccion-panel">
                <div class="container">
                  <h4 class="text-white">Cargar nuevo plato</h4>
                  <form action="./componentes/cargar_plato.php" method="POST" enctype="multipart/form-data" class="bg-dark p-4 rounded shadow">

                    <div class="mb-3">
                      <label class="form-label text-white">Nombre del Plato</label>
                      <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label text-white">Ingredientes</label>
                      <textarea name="ingredientes" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label text-white">Descripción</label>
                      <textarea name="descripcion" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label text-white">Imagen del plato</label>
                      <input type="file" name="imagen" class="form-control" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label text-white">Estado</label>
                      <select name="estado" class="form-select">
                        <option value="Disponible" selected>Disponible</option>
                        <option value="No disponible">No disponible</option>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar plato</button>
                  </form>
                </div>

              </section>

            <?php break;

            case 'mostrar-menu':
            ?>
              <section id="mostrar-menu" class="seccion-panel">
                <h4 class="text-white">Acá se mostrarán los menús existentes</h4>
                <!-- Podés cargar dinámicamente desde PHP o JS -->
              </section>

            <?php break;

            case 'tomar-pedidos':
            ?>
              <section id="tomar-pedidos" class="seccion-panel">
                <!-- FORMULARIO DE PEDIDO -->
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Registrar Pedido</h5>
                  <form action="./componentes/cargar_menu.php" method="POST">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                      <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                      </div>
                      <div class="col-md-6">
                        <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" required>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="localidad" class="form-control" placeholder="Localidad" required>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="fecha" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <input type="time" name="horario" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <select name="tipo_servicio" class="form-select" required>
                          <option value="">Tipo de Servicio</option>
                          <option value="Familiar">Familiar</option>
                          <option value="Evento">Evento</option>
                          <option value="Empresarial">Empresarial</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <textarea name="detalle_menues" class="form-control" rows="2" placeholder="Menúes y cantidades" required></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-warning w-100">Registrar Pedido</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>

            <?php break;

            case 'mostrar-pedidos':
            ?>
              <section id="mostrar-pedidos" class="seccion-panel">
                <h4 class="text-white">Pedidos cargados</h4>
                <!-- Acá cargás pedidos -->
              </section>

            <?php break;

            default:
            ?>
              <div class="alert alert-danger">Sección no encontrada</div>
          <?php
              break;
          } ?>

        </div>
      </div>
    </div>



  <?php } ?>


  <!-- jQuery JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- DataTables JS -->
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Configuracion de la datatable x script -->
  <script>
    $(document).ready(function() {
      $('#tabla-resultado').DataTable({
        // Opciones de personalización
        "paging": true, // Activar paginación
        "lengthMenu": [5, 10, 20, 50], // Opciones de elementos por página
        "searching": true, // Activar la barra de búsqueda
        "responsive": false, // Activa el modo responsive de DataTables
        "scrollX": true, // Habilita el scroll horizontal si es necesario
        "ordering": true, // Activar ordenamiento de columnas
        "order": [
          [0, "asc"]
        ], // Ordenar por la primera columna en orden descendente
        "info": true, // Mostrar información sobre la tabla (ej. "Mostrando 1-10 de 50 entradas")
        "autoWidth": true, // Ajuste automático de ancho de columnas
        "language": { // Personalizar los textos (idioma español)
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "search": "Buscar:",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        }
      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $('#tabla-compras').DataTable({
        "columnDefs": [{
          "targets": "_all",
          "defaultContent": "—"
        }],
        "paging": true,
        "lengthMenu": [5, 10, 20, 50],
        "searching": true,
        "responsive": false,
        "scrollX": true,
        "ordering": true,
        "order": [
          [0, "asc"]
        ],
        "info": true,
        "autoWidth": true,
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "search": "Buscar:",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        }
      });

      // Aplicar animación y scroll luego de que DataTable haya cargado
      setTimeout(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        if (id) {
          const fila = document.getElementById('compra-' + id);
          if (fila) {
            fila.classList.add('resaltado');
            fila.scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
            setTimeout(() => fila.classList.remove('resaltado'), 3000);
          }
        }
      }, 500);

    });
  </script>


</body>

</html>