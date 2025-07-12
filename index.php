<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fatto In Casa | Sitio Oficial </title>

  <!-- FAMILIAS TIPOGRAFICAS DE GOOGLE FONTS -->

  <!-- ICONOS DE BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- ICONOS DE FONTAWESOME -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

  <!-- Swiper.js desde CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- AOS CSS desde CDN-->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


  <!-- CSS DE BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- CSS PROPIO-->
  <link rel="stylesheet" href="./CSS/styles.css">

</head>

<body>
  <!-- NAVBAR PERSONALIZADO -->
  <nav class="navbar navbar-dark bg-dark py-3">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      
      <!-- Bloque de enlaces -->
      <div class="d-flex flex-wrap gap-3 nav-links">
        <a href="#section-hero" class="custom-link">Inicio</a>
        <a href="#section-menu" class="custom-link">Menúes</a>
        <a href="#section-services" class="custom-link">Nuestros servicios</a>
        <a href="#section-contact" class="custom-link">Contáctanos</a>
      </div>

      <!-- Bloque de logo + nombre -->
      <div class="branding-container d-flex align-items-center mt-3 mt-md-0 fade-in-right">
        <span class="brand-name text-white fw-bold fs-5 me-3">Fatto In Casa</span>
        <img src="./imagenes/logo/logo1.png" alt="Logo" class="logo-img">
      </div>

    </div>
  </nav>

  <!-- SECCIÓN HERO INFORMATIVA -->
  <section class="py-5 bg-light" id="section-hero">
    <div class="container">
      <div class="row align-items-center">
        <!-- Texto -->
        <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
          <h2 class="fw-bold">Bienvenido a Fatto In Casa</h2>
          <p class="text-muted">Ofrecemos un servicio de catering casero, fresco y de calidad, pensado para todo tipo de eventos: sociales, corporativos o familiares.</p>
          <a href="#section-slider" class="btn btn-primary mt-3">Contactáte con Nosotros</a>
        </div>
        <!-- Imagen -->
        <div class="col-md-6 text-center" data-aos="fade-left">
          <img src="./imagenes/tarjetas/tarjeta1.jpg" alt="Servicio de catering" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN DE 3 TARJETAS -->
  <section class="py-5" id="section-cards">
    <div class="container">
      <div class="row text-center mb-4">
        <div class="col">
          <h3 class="fw-bold">¿Por qué elegirnos?</h3>
        </div>
      </div>
      <div class="row g-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-utensils fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Comida Casera</h5>
              <p class="card-text">Preparaciones auténticas con ingredientes frescos y recetas familiares.</p>
            </div>
          </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-people-group fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Eventos Personalizados</h5>
              <p class="card-text">Adaptamos nuestros menús a tu tipo de evento y a tus preferencias.</p>
            </div>
          </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-truck fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Entrega a Tiempo</h5>
              <p class="card-text">Servicio puntual y confiable. Nos ocupamos de cada detalle logístico.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN SLIDER SWIPER -->
  <section class="py-5 bg-dark text-white" id="section-slider">
    <div class="container">
      <div class="row mb-4 text-center">
        <div class="col">
          <h3 class="fw-bold">Clientes Satisfechos</h3>
          <p>Un vistazo a nuestros eventos y comentarios</p>
        </div>
      </div>

      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="card text-white border-0 position-relative overflow-hidden">
              <div class="slide-img-container">
                <img src="./imagenes/sliders/evento0.jpg" class="img-slide" alt="Evento 1">
              </div>
              <div class="card-img-overlay d-flex align-items-end p-4 bg-gradient-dark">
                <h5 class="card-title">“¡Increíble presentación y sabor!”</h5>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="swiper-slide">
            <div class="card text-white border-0 position-relative overflow-hidden">
              <div class="slide-img-container">
                <img src="./imagenes/sliders/evento1.jpg" class="img-slide" alt="Evento 2">
              </div>
              <div class="card-img-overlay d-flex align-items-end p-4 bg-gradient-dark">
                <h5 class="card-title">“El mejor catering que hemos contratado”</h5>
              </div>
            </div>
          </div>
          <!-- Slide 3 mejorado -->
          <div class="swiper-slide">
            <div class="card text-white border-0 position-relative overflow-hidden">
              <!-- Contenedor de imagen con clases personalizadas -->
              <div class="slide-img-container">
                <img src="./imagenes/sliders/evento2.jpg" class="img-slide" alt="Evento 3">
              </div>
              <!-- Overlay con fondo oscuro -->
              <div class="card-img-overlay d-flex align-items-end p-4 bg-gradient-dark">
                <h5 class="card-title">“Todo llegó a tiempo y fue delicioso”</h5>
              </div>
            </div>
          </div>
          <!-- Slide 4 o los que hagan falta -->
          <div class="swiper-slide">
            <div class="card text-white border-0 position-relative overflow-hidden">
              <div class="slide-img-container">
                <img src="./imagenes/sliders/evento1.jpg" class="img-slide" alt="Evento 2">
              </div>
              <div class="card-img-overlay d-flex align-items-end p-4 bg-gradient-dark">
                <h5 class="card-title">“El mejor catering que hemos contratado2”</h5>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Pagination y navegación opcional -->
      <div class="swiper-pagination mt-3"></div>
    </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-primary text-white text-center py-4">
    <div class="container">
      <p class="mb-0">&copy; 2025 Fatto In Casa - Todos los derechos reservados</p>
    </div>
  </footer>

  <!-- Incluyendo BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>

  <!-- Agrega Swiper.js desde CDN -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <!-- Script para Swiper-->
  <script>
    AOS.init();

    const swiper = new Swiper(".mySwiper", {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      }
    });
  </script>

</body>

</html>