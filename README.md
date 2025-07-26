 # 🛍️ fattoInCasa - Sitio Web de contacto

Sistema web estilo Landing Page desarrollada en PHP y MySQL que permite la comunicación directa vía redes sociales para una contratación de servicios.
También se puede administrar mediante un **panel privado**. El sitio es responsive, dinámico y seguro, con funcionalidades de Agregar un Evento/Menú, modificarlo y subirlo/bajarlo a la pagina principal, Agregar un servicio de catering full y modificación de ese servicio de catering en tiempo real.

---

## 📸 Capturas de Pantalla

| Página Principal | Panel Admin |
|------------------|-------------|
| ![Inicio](./screenshots/inicio.png) | ![Panel](./screenshots/panel.png) |

---

## ⚙️ Tecnologías y Herramientas

- **PHP 8+** (Lenguaje Backend)
- **MySQL** (Base de Datos)
- **Bootstrap 5** (Framework CSS de diseño)
- **Composer** (dependencias de PHP)
- **Dotenv** (gestión de variables de entorno)
- **Códigos Javascripts** (Manipulación de elementos del DOM mediante JavaScript)
- **AOS** (animaciones mediante JavaScript)
- **Swiper** (sliders)
- **FontAwesome** (iconos)
- **Bootstrap Icons** (iconos)
- **Google Fonts** (fuentes tipográficas)

---

## 📂 Estructura del Proyecto

```
📦 Fatto in Casa/
├── componentes/        # Scripts internos PHP para las API Rest y lógica del backend
├── CSS/                # Estilos CSS3 para el HTML
├── imagenes/           # Imágenes utilizadas en el proyecto
├── vistas/             # Páginas PHP renderizadas (URL amigables)
├── vendor/             # Dependencias Composer (Dotenv, etc)
├── .gitignore          # Archivo con directivas para ignorar a otros archivos al subir al repo remoto
├── .env                # Variables de entorno (Archivo ignorado por seguridad)
├── .htaccess           # Reglas de seguridad y redirecciones con linux scripting
├── index.php           # Página principal
├── panel.php           # Panel administrativo
├── composer.json       # JSON con las dependencias de PHP instaladas para el proyecto
├── composer.lock       # Archivo contenedor de dependencias, servicios y versiones
├── config.php          # Carga las variables de entorno del .env utilizando vLucas/Dotenv
└── README.md           # Este archivo
```

---

## 🔐 Variables de Entorno (`.env`) --> En breve subo el archivo de ejemplo para usarlo como demo

Copia el archivo `.env.ejemplodemo` y renómbralo a `.env`. No subas `.env` a GitHub. Ejemplo de contenido:

```env
DB_HOST=localhost
DB_NAME=restaurant_db_demotest
DB_USER=root
DB_PASS=secret_demotest

MAIL_HOST=smtp.tudominio.com
MAIL_PORT=587
MAIL_USER=contacto@tudominio.com
MAIL_PASS=clavesupersegura
```

---

## 🚀 Funcionalidades Clave

- 🛒 Sistema One Page adaptado tipo catálogod
- 📦 Carga y modificación de eventos vía panel
- 📬 Efectos visuales atractivos con UX moderna
- 🛡️ `.htaccess` para proteger rutas y archivos sensibles
- 📊 Control de stock en tiempo real conectado a la base de datos
- 🔐 Autenticación segura para acceso al panel de administración
- 🧾 Comunicación Automática para contratacion vía redes
- 🔄 Codigo reutilizable y modelo de plantilla Procedural para oferta de Servicios

---

## 🔧 Instalación (Local) y desde consola (shell, bash, terminal, etc)

1. Clonar el repositorio  
   `git clone https://github.com/jahcr1/fattoincasa.git`

2. Ingresar al proyecto y configurar el entorno  
   `cd fattoincasa && cp .env.ejemplodemo .env` (En breve pusheo el archivo .env.ejemplodemo al repo, paciencia!)

3. Instalar dependencias con Composer  
   `composer install`

4. Crear base de datos y cargar el dump `database.sql` (La voy a subir en breve)

5. Levantar el proyecto con Apache o localhost (ej: XAMPP)

6. No te olvides de dejar una estrella porfa, y si querés mejorar algo y/o colaborar con actualizaciones bienvenido sea.

---

## 📝 TODOs o Mejoras Futuras

- [ ] Agregar pasarela de pagos (MercadoPago / Stripe)
- [ ] Subida de imágenes con validación por admins
- [ ] Sistema de usuarios con autenticación para compradores
- [ ] API externa para consulta de servicios de caterings especiales

---

## 🧑‍💻 Autor

**Martín Contreras </jahcr1>**  
Desarrollador Web FullStack / Ingeniería Electrónica  
📧 martin.contreras.dev@gmail.com  
🌐 [MiPortfolio.com](https://www.martincontrerasdev.com/)

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo `LICENSE` para más información.

---



---
