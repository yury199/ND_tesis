<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Editar Perfil</title>
  <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="title" content="Editar">
  <meta name="description" content="Editar">
  <!-- Enlaces-->
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/style.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../CSS/fonts.css">
  <!-- Definir colores-->
  <script src="../JS/cambioColor.js"></script>


</head>

<body onload="cambiarColor()">
  <!-- Aquí comienza el NAV -->
  <header>
    <?php
    include("PageElements/nav_Off.php");
    ?>
  </header>
  <!--Aquí Termina el NAV  -->
  <section class="index_main">
    <div class="contenedor">
      <h1>Sobre nosostros</h1>
      <p class="just"> Somos Yury y Andrew, Como parte de nuestro proyecto de tesis, nos hemos propuesto abordar el
        desafío de mejorar la comprensión lectora en niños a través
        de una historieta digital interactiva.</p>

      <p class="just">Nuestro objetivo principal es desarrollar un prototipo funcional que utilice cambios narrativos
        generados por emociones para
        potenciar el aprendizaje de la lectura. Para lograr esto, hemos creando esta plataforma web interactiva que
        permitirá la reproducción de
        historietas digitales y que será capaz de reconocer y reproducir un árbol narrativo genérico.</p>

      <p class="just">Además, estamos implementando un servicio web de biofeedback utilizando la cámara web para
        capturar las emociones de los niños
        mientras interactúan con la historieta. Esto nos permitirá generar cambios narrativos en tiempo real, adaptando
        la experiencia de lectura de
        acuerdo con las respuestas emocionales de los niños.</p>

      <p class="just"> Nos esforzamos por crear un prototipo funcional que combine tecnología, narrativa y educación de manera efectiva,
        con la esperanza de brindar una experiencia enriquecedora para los niños y contribuir al avance de la educación.</p>

      <p class="just">Gracias por su interés en nuestro proyecto. ¡Estamos comprometidos en hacer una diferencia en el aprendizaje de la
        lectura y esperamos poder compartir nuestros avances con ustedes en el futuro!.</p>



    </div>



  </section>

  <?php
  include("PageElements/footer.php");
  ?>

  <!--  Andrew debe terminar el diseño -->

</body>

</html>