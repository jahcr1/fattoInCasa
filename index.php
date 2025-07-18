<?php
session_start();
include './componentes/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fatto In Casa | Sitio Oficial </title>

  <!-- FAMILIAS TIPOGRAFICAS DE GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@400;700&family=Dancing+Script:wght@400..700&family=Kapakana:wght@300..400&family=Love+Light&family=MonteCarlo&family=Mr+De+Haviland&family=Ruthie&family=Tangerine:wght@400;700&family=Updock&family=WindSong:wght@400;500&display=swap" rel="stylesheet">

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

<body id="index-body">
  <!-- NAVBAR PERSONALIZADO -->
  <nav class="navbar navbar-light bg-light py-3 index-nav">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">

      <!-- Bloque de enlaces -->
      <div class="d-flex flex-wrap gap-3 nav-links">
        <a href="index.php#section-hero" class="custom-link">Inicio</a>
        <a href="index.php#section-menu" class="custom-link">Menúes</a>
        <a href="index.php#section-services" class="custom-link">Nuestros servicios</a>
        <a href="index.php#section-cards" class="custom-link">Contáctanos</a>
      </div>

      <!-- Bloque del nombre de la marca -->
      <div class="branding-container d-flex align-items-center mt-3 mt-md-0 fade-in-right">
        <span class="brand-name fw-bold fs-4">Fatto In Casa</span>
      </div>

    </div>
  </nav>

  <!-- SECCIÓN INFO HERO INFORMATIVA -->
  <section class="py-5 bg-light" id="section-hero">
    <div class="container">
      <div class="row align-items-center">
        <!-- Texto -->
        <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
          <h2 class="fw-bold">Bienvenido a Fatto In Casa</h2>
          <p class="text-muted">Ofrecemos un servicio de catering casero, fresco y de calidad, pensado para todo tipo de eventos: sociales, corporativos o familiares.</p>
          <a href="#section-slider" class="btn btn-warning mt-3">Contactáte con Nosotros</a>
        </div>
        <!-- Imagen -->
        <div class="col-md-6 text-center" data-aos="fade-left">
          <img src="./imagenes/tarjetas/tarjeta1.jpg" alt="Servicio de catering" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN MENUES NUESTROS PLATOS -->
  <section class="py-5 bg-light-gray" id="section-menu">
    <div class="container">
      <div class="row mb-5">
        <div class="col text-end">
          <h1 class="titulo-index" data-aos="fade-right">Nuestros Platos</h1>
          <p class="text-white">Conocé nuestras especialidades caseras, ideales para cualquier ocasión.</p>
        </div>
      </div>

      <!-- Tarjetas dinámicas (ejemplo estático para diseño) -->
      <!-- Tarjeta 1 -->
      <div class="row align-items-center mb-5 flex-md-row" data-aos="fade-up">
        <div class="col-md-6 mb-3 mb-md-0">
          <img src="./imagenes/platos/carne1.jpg" class="img-fluid rounded shadow" alt="Plato 1">
        </div>
        <div class="col-md-6">
          <h4 class="fw-bold text-white">Lasagna Casera</h4>
          <p class="text-white"><strong>Ingredientes:</strong> Pasta fresca, carne, salsa blanca y roja.</p>
          <p class="text-white">Una receta tradicional italiana con capas generosas y sabor reconfortante.</p>
          <a href="#section-contact" class="btn btn-outline-warning mt-2">Hacer Pedido</a>
        </div>
      </div>

      <!-- Tarjeta 2 (invertida) -->
      <div class="row align-items-center mb-5 flex-md-row-reverse" data-aos="fade-up">
        <div class="col-md-6 mb-3 mb-md-0">
          <img src="./imagenes/platos/empanada1.jpg" class="img-fluid rounded shadow" alt="Plato 2">
        </div>
        <div class="col-md-6">
          <h4 class="fw-bold text-white">Empanadas Artesanales</h4>
          <p class="text-white"><strong>Ingredientes:</strong> Carne, cebolla, huevo, especias.</p>
          <p class="text-white">Hechas a mano con rellenos tradicionales y cocción justa para un bocado perfecto.</p>
          <a href="#section-contact" class="btn btn-outline-warning mt-2">Hacer Pedido</a>
        </div>
      </div>

      <!-- Repetir con loop en backend -->



    </div>
  </section>

  <!-- SECCIÓN NUESTROS SERVICIOS -->
  <section class="py-5 bg-light" id="section-services">
    <div class="container">
      <!-- Contacto directo -->
      <div class="row text-start justify-content-center redes-container" data-aos="fade-up">
        <div class="row mb-4 ">
          <div class="col">
            <h1 class="titulo-index text-center text-dark titulo-servicio">¿Querés contratar nuestros servicios de Catering?</h1>
            <p class="text-dark mt-4 parrafo-index">Contactanos directamente por nuestras redes sociales y contános que tipo de evento querés contratar..</p>
            <a href="https://wa.me/<?php echo $_ENV['WSP_CEL']; ?>/" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i> WhatsApp</a>
            <a href="https://www.instagram.com/fatto.in.casa_lc" target="_blank" class="btn btn-outline-danger"><i class="bi bi-instagram"></i> Instagram</a>
            <p class="text-muted fw-lighter fst-italic mt-3 ">Hacé Click y te lleva directo a un chat de manera automática</p>
            <p class="text-dark parrafo-index" style="margin-top: 80px;">Si no hacenos una llamada y ponete en contacto con nosotros: </p>
            <p class="text-muted ps-4"><i class="bi bi-telephone-fill"> </i>(0351) 3111-352</p>
            <p class="text-muted ps-4"><i class="bi bi-whatsapp"> </i> +54 9 (0351) 3111-352</p>
            <p class="text-muted ps-4"><i class="bi bi-instagram"></i> www.instagram.com/fatto.in.casa_lc</p>
            <p class="text-muted ps-4"><i class="bi bi-geo-alt-fill ubic"></i> Córdoba Capital, Argentina</p>
          </div>
        </div>
      </div>
      
      <div class="row text-center servicios-container">
        <div class="col">
          <h1 class="titulo-index text-dark" data-aos="fade-up">Nuestros Servicios</h1>
          <p class="text-dark parrafo-index">Ofrecemos los mejores platos gastrónimicos para tus eventos.</p>
        </div>
      </div>

      <!-- Accordion con imágenes de fondo -->
      <div class="accordion" id="accordionServicios">
        <!-- Servicio 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#catering" aria-expanded="true" aria-controls="catering">
              Servicio de Catering para Eventos Familiares 
            </button>
          </h2>
          <div id="catering" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionServicios">
            <div class="accordion-body bg-img-catering text-white fst-italic">
              <p>Nos especializamos en brindar un servicio de catering tradicional con presentación profesional, para eventos familiares o reuniones chicas.</p>
              <p>Desde viandas hasta menúes patrios, nos adaptamos a cada menú importante para tu reunion.</p>
            </div>
          </div>
        </div>

        <!-- Servicio 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#eventos2" aria-expanded="false" aria-controls="eventos">
              Servicio de Catering para Eventos Sociales
            </button>
          </h2>
          <div id="eventos2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionServicios">
            <div class="accordion-body bg-img-eventos2 text-white fst-italic">
              <p>Ajustamos la diferente gama de platos para tus eventos de Mediana a Gran escala.</p>
              <p>Ideal para celebraciones de cumpleaños grandes o eventos sociales con prioridades distintas.</p>
            </div>
          </div>
        </div>

        <!-- Servicio 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#eventos3" aria-expanded="false" aria-controls="eventos">
              Servicio de Catering Empresarial
            </button>
          </h2>
          <div id="eventos3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionServicios">
            <div class="accordion-body bg-img-eventos3 fst-italic">
              <p class="text-black fw-semibold">También coordinamos eventos completos con ambientación, logística y atención personalizada.</p>
              <p class="text-black text-shadow fw-semibold">Ideal para celebraciones íntimas o encuentros empresariales y con menúes gourmet.</p>
            </div>
          </div>
        </div>

      </div>

      
    </div>
  </section>

  <!-- SECCIÓN DE 3 TARJETAS -->
  <section class="py-5 bg-light" id="section-cards">
    <div class="container">
      <div class="row text-center mb-4">
        <div class="col">
          <h1 class="titulo-index text-dark">¿Por qué elegirnos?</h1>
        </div>
      </div>
      <div class="row g-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-utensils fa-2x text-warning mb-3"></i>
              <h5 class="card-title">Comida Casera</h5>
              <p class="card-text">Preparaciones auténticas con ingredientes frescos y recetas familiares.</p>
            </div>
          </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-people-group fa-2x text-warning mb-3"></i>
              <h5 class="card-title">Eventos Personalizados</h5>
              <p class="card-text">Adaptamos nuestros menús a tu tipo de evento y a tus preferencias.</p>
            </div>
          </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="fa-solid fa-truck fa-2x text-warning mb-3"></i>
              <h5 class="card-title">Entrega a Tiempo</h5>
              <p class="card-text">Servicio puntual y confiable. Nos ocupamos de cada detalle logístico.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN SLIDER SWIPER -->
  <section class="py-5 bg-light-gray text-white" id="section-slider">
    <div class="container">
      <div class="row mb-4 text-center">
        <div class="col">
          <h2 class="titulo-index">Clientes Satisfechos</h2>
          <p class="parrafo-index">Un vistazo a nuestros eventos y comentarios</p>
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
                <figure>
                  <blockquote class="blockquote">
                    <p>Increible presentación y sabor, los platos muy producidos.</p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                    Javier Saviola jugador de <cite title="River Plate">Club Atlético River Plate</cite>
                  </figcaption>
                </figure>
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
                <figure class="text-center">
                  <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                  </figcaption>
                </figure>
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
                <figure class="text-center">
                  <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                  </figcaption>
                </figure>
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
                <figure class="text-end">
                  <blockquote class="blockquote">
                    <p>La mejor comida que probé, el mejor servicio que contraté.</p>
                  </blockquote>
                  <figcaption class="blockquote-footer">
                    Martina Stoessel <cite title="TINITINITINI">- TINI</cite>
                  </figcaption>
                </figure>
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
  <footer class="bg-light text-dark text-center py-4">
    <div class="container">
      <p class="mb-0">&copy; 2025 Fatto In Casa & jahcr1 - Todos los derechos reservados</p>
    </div>
  </footer>

  <!-- BOTÓN VOLVER ARRIBA -->
  <button id="btn-scroll-top" title="Subir">
    <i class="fas fa-arrow-up"></i>
  </button>

  

  <!-- Incluyendo BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>

  <!-- Agrega Swiper.js desde CDN -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <!-- Script para Swiper y AOS -->
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

  <!-- SCRIPT PARA EL BOTON DE VOLVER ARRIBA  -->
  <script>
    // Mostrar u ocultar el botón al hacer scroll
    window.addEventListener("scroll", function() {
      const btn = document.getElementById("btn-scroll-top");
      if (window.scrollY > 200) {
        btn.style.display = "flex";
      } else {
        btn.style.display = "none";
      }
    });

    // Acción al hacer clic: subir al inicio con smooth scroll
    document.getElementById("btn-scroll-top").addEventListener("click", function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>

  <!-- SCRIPT PARA OCULTAR Y REAPARECER EL NAV DINAMICO  -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const navbar = document.querySelector(".index-nav");
      if (!navbar) return;

      let lastScrollTop = 0;
      const scrollThreshold = 10;

      function handleScroll() {
        const currentScroll = window.scrollY;

        if (Math.abs(currentScroll - lastScrollTop) > scrollThreshold) {
          if (currentScroll > lastScrollTop && currentScroll > 100) {
            // Scrolleando hacia abajo
            navbar.classList.add("hidden");
          } else {
            // Scrolleando hacia arriba
            navbar.classList.remove("hidden");
          }
          lastScrollTop = currentScroll;
        }
      }

      window.addEventListener("scroll", handleScroll, { passive: true });
    });
  </script>


</body>

</html>