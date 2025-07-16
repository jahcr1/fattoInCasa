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
      <a class="navbar-brand" href="index.php" onclick="return confirm('¿Estás seguro de que querés ir a la página principal?');">Fatto In Casa</a>

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
          <a href="./componentes/mostrar_contenido_panel.php?seccion=mostrar-menu" class="nav-link">Mostrar y Modificar Menúes</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=tomar-pedidos" class="nav-link">Cargar Servicio de Catering</a>
          <a href="./componentes/mostrar_contenido_panel.php?seccion=mostrar-pedidos" class="nav-link">Ver y Modificar Servicios de Catering</a>
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
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Cargar nuevo plato</h5>
                  <form action="./componentes/cargar_plato.php" method="POST" enctype="multipart/form-data">

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
                <!--  MOSTRAR MENUES DISPONIBLES -->
                  <div class="card bg-dark border-0 shadow p-4 mb-4">
                    <h5 class="titulo-seccion">Menúes Disponibles</h5>
                    
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                      <?php 
                      include('componentes/conexion.php');

                      $consultar_menu = mysqli_query($conexion, "SELECT * FROM platos WHERE estado = 'Disponible'");
                      while ($menu_disponible = mysqli_fetch_assoc($consultar_menu)) { 
                        $img_data = base64_encode($menu_disponible['ci_imagen_plato']);
                        $img_type = $menu_disponible['formato_imagen'];
                        $img_src = !empty($img_data) ? "data:$img_type;base64,$img_data" : null;
                      ?>

                      <div class="col">
                        <div class="card h-100 shadow-sm">
                          <?php if ($img_src): ?>
                            <img src="<?= $img_src ?>" class="card-img-top img-fluid img-menu" alt="Imagen del plato">
                          <?php else: ?>
                            <div class="text-center p-5 text-muted">Sin imagen disponible</div>
                          <?php endif; ?>

                          <div class="card-body d-flex flex-column body-menu">
                            <h5 class="card-title text-center"><?= htmlspecialchars($menu_disponible['nombre']) ?></h5>
                            <p class="text-muted mb-1"><strong>Ingredientes:</strong> <?= htmlspecialchars($menu_disponible['ingredientes']) ?></p>
                            <p class="mb-2"><strong>Descripción:</strong> <?= htmlspecialchars($menu_disponible['descripcion']) ?></p>
                            <p class="mb-2"><strong>Disponibilidad del plato:</strong> <?= htmlspecialchars($menu_disponible['estado']) ?></p>
                            

                          </div>
                        </div>
                      </div>

                      <?php } ?>
                    </div>

                  </div>

                <!--  MODIFICAR MENUES -->
                  <div class="card bg-dark border-0 shadow p-4 mb-4">
                    <h5 class="titulo-seccion">Modificar un Menú </h5>

                    <!-- FORMULARIO DE FILTRO -->
                    <div class="row g-3 mb-4 ps-4">
                      <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xsm-12">
                          <form action="componentes/modificar_menu.php" method="POST">
                            <label class="form-label text-white">Elija un plato a modificar según su estado:</label>
                            <select class="form-select form-select-sm" name="estado" required>
                              <option value="" disabled selected>Elegir una opción</option>
                              <option value="Disponible">Disponible</option>
                              <option value="No disponible">No disponible</option>
                            </select>
                            <button type="submit" class="btn btn-warning text-dark mt-2 btn-sm">Buscar Menúes</button>
                          </form>
                      </div>
                    </div>
                    
                    <!--  MENUES FILTRADOS  -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 menu-filtrado">
                      <?php 
                      
                      $platos = [];

                      if (isset($_SESSION['platos'])) {
                        $platos = $_SESSION['platos'];
                        unset($_SESSION['platos']); // limpiamos para que no se mantenga
                      }

                      if (empty($platos)): ?>
                        <div class="col-12">
                          <div class="alert alert-warning text-center ms-4">Buscá cualquier plato con el estado seleccionado.</div>
                        </div>
                      <?php else:
                        foreach ($platos as $plato): 
                          $img_data = base64_encode($plato['ci_imagen_plato']);
                          $img_type = $plato['formato_imagen'];
                          $img_src = !empty($img_data) ? "data:$img_type;base64,$img_data" : null;
                      ?>
                        <div class="col">
                          <form class="card h-100 shadow-sm p-3 d-flex flex-column" method="POST" action="componentes/modificar_menu.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_plato" value="<?= $plato['id'] ?>">

                            <?php if ($img_src): ?>
                              <img src="<?= $img_src ?>" class="card-img-top img-fluid img-menu mb-3" alt="Imagen del plato">
                            <?php else: ?>
                              <div class="text-center p-5 text-muted">Sin imagen disponible</div>
                            <?php endif; ?>

                            <div class="card-body flex-grow-1">
                              <div class="mb-2">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($plato['nombre']) ?>" required>
                              </div>

                              <div class="mb-2">
                                <label class="form-label">Ingredientes</label>
                                <textarea name="ingredientes" class="form-control" required><?= htmlspecialchars($plato['ingredientes']) ?></textarea>
                              </div>

                              <div class="mb-2">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control"><?= htmlspecialchars($plato['descripcion']) ?></textarea>
                              </div>

                              <div class="mb-3">
                                <label class="form-label">Nueva Imagen (opcional)</label>
                                <input type="file" name="nueva_imagen" accept="image/*" class="form-control form-control-sm">
                              </div>

                              <div class="mb-2">
                                <label class="form-label d-block">Estado</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="estado" value="Disponible" id="disponible<?= $plato['id'] ?>" <?= $plato['estado'] === 'Disponible' ? 'checked' : '' ?>>
                                  <label class="form-check-label" for="disponible<?= $plato['id'] ?>">Disponible</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="estado" value="No disponible" id="noDisponible<?= $plato['id'] ?>" <?= $plato['estado'] === 'No disponible' ? 'checked' : '' ?>>
                                  <label class="form-check-label text-danger" for="noDisponible<?= $plato['id'] ?>">No disponible</label>
                                </div>
                              </div>
                            </div>

                            <div class="mt-auto">
                              <button type="submit" class="btn btn-warning w-100">Modificar Menú</button>
                            </div>
                          </form>
                        </div>
                      <?php endforeach; endif; ?>

                    </div>
                  </div>

              </section>

            <?php break;

            case 'tomar-pedidos':
            ?>
              <section id="tomar-pedidos" class="seccion-panel">
                <!-- FORMULARIO DE PEDIDO -->
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Registrar Pedido - Servicio</h5>
                  <form action="./componentes/cargar_pedido.php" method="POST">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label text-white">Nombre del Cliente</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Apellido del Cliente</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Correo del Cliente</label>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Teléfono de Contacto</label>
                        <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Localidad del Evento</label>
                        <input type="text" name="localidad" class="form-control" placeholder="Localidad" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Dirección del Evento</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Fecha del Evento</label>
                        <input type="date" name="fecha" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Horario del Evento</label>
                        <input type="time" name="horario" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Tipo de Evento</label>
                        <select name="tipo_servicio" class="form-select" required>
                          <option value="">Tipo de Servicio</option>
                          <option value="Familiar">Familiar</option>
                          <option value="Evento">Evento</option>
                          <option value="Empresarial">Empresarial</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label text-white">Detalles del Menú y cantidades</label>
                        <textarea name="detalle_menues" class="form-control" rows="2" placeholder="Menúes y cantidades" required></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-warning">Registrar Pedido</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>

            <?php break;

            case 'mostrar-pedidos':
            ?>
              <section id="mostrar-pedidos" class="seccion-panel">

                <!-- SUBSECCION: Pedidos Pendientes -->
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Servicios de Catering Pendientes</h5>
                  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php
                    include('componentes/conexion.php');

                    $pendientes = mysqli_query($conexion, "SELECT * FROM pedidos WHERE estado = 'pendiente' ORDER BY fecha ASC");
                    if (mysqli_num_rows($pendientes) > 0):
                      while ($pedido = mysqli_fetch_assoc($pendientes)):
                    ?>
                        <div class="col">
                          <div class="card h-100 shadow-sm bg-light p-3">
                            <div class="card-body">
                              <h6 class="fw-bold text-dark mb-2">Cliente: <?= htmlspecialchars($pedido['nombre']) ?> <?= htmlspecialchars($pedido['apellido']) ?></h6>
                              <p class="mb-1"><strong>Email de contacto:</strong> <?= htmlspecialchars($pedido['email']) ?></p>
                              <p class="mb-1"><strong>Teléfono de contacto:</strong> <?= htmlspecialchars($pedido['telefono']) ?></p>
                              <p class="mb-1"><strong>Localidad del evento:</strong> <?= htmlspecialchars($pedido['localidad']) ?></p>
                              <p class="mb-1"><strong>Dirección del evento:</strong> <?= htmlspecialchars($pedido['direccion']) ?></p>
                              <p class="mb-1"><strong>Tipo de Evento:</strong> <?= htmlspecialchars($pedido['tipo_servicio']) ?></p>
                              <p class="mb-1"><strong>Fecha del evento:</strong> <?= htmlspecialchars($pedido['fecha']) ?> | <strong>Hora:</strong> <?= htmlspecialchars($pedido['horario']) ?></p>
                              <p class="mb-2"><strong>Detalles del menú, etc:</strong> <?= htmlspecialchars($pedido['detalle_menues']) ?></p>
                              <p class="fw-bold text-warning">Estado: <?= htmlspecialchars($pedido['estado']) ?></p>

                              <!-- Botón para cambiar estado -->
                              <form method="POST" action="componentes/cambiar_estado_pedido.php" onsubmit="return confirm('¿Seguro que deseas cambiar el estado del pedido?');">
                                <input type="hidden" name="id_pedido" value="<?= $pedido['id'] ?>">
                                <select name="nuevo_estado" class="form-select form-select-sm mb-2" required>
                                  <option value="pendiente" <?= $pedido['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                  <option value="confirmado" <?= $pedido['estado'] === 'confirmado' ? 'selected' : '' ?>>Confirmado</option>
                                  <option value="rechazado" <?= $pedido['estado'] === 'rechazado' ? 'selected' : '' ?>>Rechazado</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-warning w-100">Actualizar Estado</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    <?php
                      endwhile;
                    else:
                      echo "<div class='alert alert-warning text-center'>No hay pedidos pendientes.</div>";
                    endif;
                    ?>
                  </div>
                </div>

                <!-- SUBSECCION: Registro de Pedidos por Estado -->
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Registro de Servicios de Catering</h5>
                  <div class="mb-4">
                    <form action="componentes/filtrar_pedidos.php" method="POST" class="row g-3">
                      <div class="col-md-6">
                        <select class="form-select" name="estado" required>
                          <option value="" disabled selected>Seleccione estado</option>
                          <option value="pendiente">Pendiente</option>
                          <option value="confirmado">Confirmado</option>
                          <option value="rechazado">Rechazado</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-warning w-100">Filtrar Pedidos</button>
                      </div>
                    </form>
                  </div>

                  <!-- MOSTRAR PEDIDOS FILTRADOS -->
                  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php
                    $pedidos_filtrados = [];

                    if (isset($_SESSION['pedidos_filtrados'])) {
                      $pedidos_filtrados = $_SESSION['pedidos_filtrados'];
                      unset($_SESSION['pedidos_filtrados']);
                    }

                    if (!empty($pedidos_filtrados)):
                      foreach ($pedidos_filtrados as $pedido):
                    ?>
                        <div class="col">
                          <div class="card h-100 shadow-sm bg-light p-3">
                            <div class="card-body">
                              <h6 class="fw-bold text-dark mb-2">Cliente: <?= htmlspecialchars($pedido['nombre']) ?> <?= htmlspecialchars($pedido['apellido']) ?></h6>
                              <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($pedido['email']) ?></p>
                              <p class="mb-1"><strong>Teléfono:</strong> <?= htmlspecialchars($pedido['telefono']) ?></p>
                              <p class="mb-1"><strong>Localidad:</strong> <?= htmlspecialchars($pedido['localidad']) ?></p>
                              <p class="mb-1"><strong>Dirección:</strong> <?= htmlspecialchars($pedido['direccion']) ?></p>
                              <p class="mb-1"><strong>Evento:</strong> <?= htmlspecialchars($pedido['tipo_servicio']) ?></p>
                              <p class="mb-1"><strong>Fecha:</strong> <?= htmlspecialchars($pedido['fecha']) ?> | <strong>Hora:</strong> <?= htmlspecialchars($pedido['horario']) ?></p>
                              <p class="mb-2"><strong>Menú:</strong> <?= htmlspecialchars($pedido['detalle_menues']) ?></p>
                              <p class="fw-bold text-warning">Estado: <?= htmlspecialchars($pedido['estado']) ?></p>
                            </div>
                          </div>
                        </div>
                    <?php endforeach; else: ?>
                      <div class="col-12">
                        <div class="alert alert-info text-center">Seleccione un estado para ver pedidos.</div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- SUBSECCION: Modificar un Servicio de Catering -->
                <div class="card bg-dark border-0 shadow p-4 mb-4">
                  <h5 class="titulo-seccion">Modificar un Servicio de Catering</h5>
                  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php
                    include('componentes/conexion.php');
                    $pedidos = mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY fecha ASC");

                    if (mysqli_num_rows($pedidos) > 0):
                      while ($pedido = mysqli_fetch_assoc($pedidos)):
                    ?>
                        <div class="col">
                          <div class="card h-100 shadow-sm bg-light p-3">
                            <form method="POST" action="componentes/modificar_pedido.php" class="d-flex flex-column justify-content-between h-100">
                              <input type="hidden" name="id_pedido" value="<?= $pedido['id'] ?>">

                              <div class="card-body">
                                <h6 class="fw-bold text-dark mb-2">ID: <?= htmlspecialchars($pedido['id']) ?></h6>

                                <div class="mb-2">
                                  <label class="form-label small">Nombre del cliente</label>
                                  <input type="text" class="form-control form-control-sm" name="nombre" value="<?= htmlspecialchars($pedido['nombre']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Apellido del cliente</label>
                                  <input type="text" class="form-control form-control-sm" name="apellido" value="<?= htmlspecialchars($pedido['apellido']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Email de contacto</label>
                                  <input type="email" class="form-control form-control-sm" name="email" value="<?= htmlspecialchars($pedido['email']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Teléfono de contacto</label>
                                  <input type="text" class="form-control form-control-sm" name="telefono" value="<?= htmlspecialchars($pedido['telefono']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Localidad del Evento</label>
                                  <input type="text" class="form-control form-control-sm" name="localidad" value="<?= htmlspecialchars($pedido['localidad']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Dirección del Evento</label>
                                  <input type="text" class="form-control form-control-sm" name="direccion" value="<?= htmlspecialchars($pedido['direccion']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Fecha Evento</label>
                                  <input type="date" class="form-control form-control-sm" name="fecha" value="<?= htmlspecialchars($pedido['fecha']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Horario del Evento</label>
                                  <input type="time" class="form-control form-control-sm" name="horario" value="<?= htmlspecialchars($pedido['horario']) ?>" required>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Tipo de Servicio de Catering</label>
                                  <select name="tipo_servicio" class="form-select form-select-sm" required>
                                    <option value="Familiar" <?= $pedido['tipo_servicio'] === 'Familiar' ? 'selected' : '' ?>>Familiar</option>
                                    <option value="Evento" <?= $pedido['tipo_servicio'] === 'Evento' ? 'selected' : '' ?>>Evento</option>
                                    <option value="Empresarial" <?= $pedido['tipo_servicio'] === 'Empresarial' ? 'selected' : '' ?>>Empresarial</option>
                                  </select>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Detalles del Menú, precio, etc</label>
                                  <textarea name="detalle_menues" class="form-control form-control-sm" rows="2" required><?= htmlspecialchars($pedido['detalle_menues']) ?></textarea>
                                </div>

                                <div class="mb-2">
                                  <label class="form-label small">Estado del Servicio de Catering</label>
                                  <select name="estado" class="form-select form-select-sm" required>
                                    <option value="pendiente" <?= $pedido['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                    <option value="confirmado" <?= $pedido['estado'] === 'confirmado' ? 'selected' : '' ?>>Confirmado</option>
                                    <option value="rechazado" <?= $pedido['estado'] === 'rechazado' ? 'selected' : '' ?>>Rechazado</option>
                                  </select>
                                </div>
                              </div>

                              <div class="card-footer bg-transparent border-0 p-0">
                                <button type="submit" class="btn btn-warning w-100">Guardar Cambios</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    <?php
                      endwhile;
                    else:
                      echo "<div class='alert alert-info text-center'>No hay pedidos para mostrar.</div>";
                    endif;
                    ?>
                  </div>
                </div>


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

  <!-- Script de confirmacion de cambio de estado de un plato -->
  <script>
    function confirmarCambioEstado(form) {
      const estadoSeleccionado = form.querySelector('input[name="estado"]:checked').value;
      return confirm('¿Estás seguro de cambiar el estado de este plato a "${estadoSeleccionado}"?');
    }
  </script>


</body>

</html>