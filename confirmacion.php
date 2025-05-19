<?php
session_start();

// Recuperar datos enviados desde procesar_formulario.php
$datos = $_SESSION['datos_solicitud'] ?? null;
unset($_SESSION['datos_solicitud']); // limpia la sesión después de usar
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>COLEGIO RAIQUEN YUMBEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos_raiquen.css">
  <script defer src="scripts.js"></script>
</head>

<body>
<div class="barra-de-contacto">
  📍 VALDIVIA 310, YUMBEL 📞 +569XXXXXXXX ✉️ raiquenyumbel@gmail.com
</div>

<header class="header-principal">
  <img class="logo-raiquen" src="https://i.postimg.cc/g2H1SfVY/logo-raiquen.png" alt="logo-raiquen"/>
  <img class="lema-colegio" src="https://i.postimg.cc/gcwVg8Vj/lema-colegio-ahora-si.png" alt="lema-colegio"/>
  <nav id="navegacion">
    <ul class="nav">
      <li><a href="index.html">Inicio</a></li>
      <li><a href="#">Nuestra institución</a>
        <ul>
          <li><a href="historia.html">Historia del Colegio</a></li>
          <li><a href="#">Matriz institucional</a></li>
        </ul>
      </li>
      <li><a href="#">Documentos institucionales</a>
        <ul>
          <li><a href="ProyectoEducativo17652.pdf" target="_blank">Proyecto Educativo</a></li>
          <li><a href="ReglamentodeConvivencia17652.pdf" target="_blank">Reglamento de Convivencia Escolar</a></li>
          <li><a href="ReglamentoDeEvaluacion17652.pdf" target="_blank">Reglamento Interno de Evaluación</a></li>
        </ul>
      </li>
       <li><a href="#">Solicitudes online</a>
        <ul>
            <li><a href="formulario_solicitud.html">Generar solicitud online</a></li>
            <li><a href="consultar_solicitud.php">Consultar el estado de mi solicitud</a></li>
            </ul>
          </li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </nav>
</header>

<section class="banner-principal">
  <img src="https://i.postimg.cc/ZYyN8Zmy/colegio-raiquen-institucional.jpg" alt="Desfile Colegio Raiquén" class="banner-imagen">
</section>

<div class="mensaje-confirmacion">
  <h2>✅ Solicitud enviada correctamente</h2>

  <?php if ($datos): ?>
    <p><strong>Código de seguimiento:</strong> <?= $datos['codigo'] ?></p>
    <p><strong>Solicitante:</strong> <?= $datos['nombre_solicitante'] ?> (<?= $datos['rut_solicitante'] ?>)</p>
    <p><strong>Estudiante:</strong> <?= $datos['nombre_est'] ?> (<?= $datos['rut_estudiante'] ?>)</p>
    <p><strong>Curso:</strong> <?= $datos['curso'] ?></p>
    <p><strong>Tipo de requerimiento:</strong> <?= $datos['tipo'] ?></p>
    <p><strong>Motivo:</strong> <?= $datos['motivo'] ?></p>
    <p><strong>Fecha de ingreso:</strong> <?= $datos['fecha'] ?></p>
    <a href="index.html">Volver al inicio</a>
  <?php else: ?>
    <p>No se encontraron los datos de la solicitud. Por favor, vuelva a intentarlo.</p>
  <?php endif; ?>
</div>

<footer class="cierre">
  <div class="footer-contenido">
    <a href="https://www.facebook.com/raiquen.oficial?locale=es_LA" target="_blank" class="red">
      <img class="logo-facebook" src="https://i.postimg.cc/ZnpFVv9C/facebook-social-media-logo-icon-free-png.webp" alt="logo-facebook">
    </a>
    <p>Raiquen Yumbel</p>
  </div>

  <div class="footer-contenido">
    <a href="https://www.instagram.com/raiquen.oficial/" target="_blank" class="red">
      <img class="logo-instagram" src="https://i.postimg.cc/zBnFkRH3/imagen-2025-04-27-012245347.png" alt="logo-instagram">
    </a>
    <p>raiquen.oficial</p>
  </div>

  <div class="footer-contenido">
    <a href="https://www.cmiescolar.cl/index.php" target="_blank" class="red">
      <img class="cmiescolar-logo" src="https://www.cmiescolar.cl/img/logo_index.png" alt="cmiescolar-logo">
    </a>
    <p>Plataforma CMI Escolar</p>
  </div>

  <div class="footer-legal">
    <div>© 2025 Colegio Raiquen Yumbel. Todos los derechos reservados.</div>
    <div>Sitio web desarrollado por Jordan González González 🚀</div>
  </div>
</footer>

</body>
</html>
