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
    <h1>Términos y condiciones</h1>
    <p class="just" > “Narrativas Digitales” es una plataforma que permite a sus usuarios crear y leer historietas digitales cuya trama está estructurada como un árbol de decisión, haciendo uso de una tecnología de reconocimiento facial para cambiar el rumbo de la narrativa dependiendo de la expresión del lector. Para los usuarios que deseen usar la plataforma para la creación de historietas, es necesario leer y aceptar los siguientes términos y políticas:</p>
    
    <h3 >Política de Privacidad</h3>
    <p class="just" >Al crear una cuenta para poder hacer historietas, se reconoce al usuario como mayor de 18 años, y en caso de ser un menor de edad quien vaya a usar la aplicación, se reconoce a quien creó la cuenta como representante o tutor de dicho menor.
Para crear una cuenta se nos provee con información personal como un correo electrónico y un nombre de usuario. Dicha información será recolectada y guardada en una base de datos, y será usada únicamente con el propósito de dar al usuario la opción de guardar, publicar y subsecuentemente editar historietas a su nombre, a las cuales tendrá acceso por medio de la información compartida. Esta información no será accesible al público y no será transferida a ningún tipo de terceros. No es necesario crear una cuenta para aquellos usuarios que sólo van a leer historietas.
Para leer las historietas se debe hacer uso de una cámara web que va a capturar las expresiones faciales del lector. Las imágenes capturadas por la cámara no serán recolectadas ni guardadas, por lo tanto su uso se limita a ser el determinante para el rumbo que va a tomar la historieta que se esté leyendo, y desaparecen una vez cumplan dicho propósito.</p>
 
<h3 >Términos de uso</h3>
<p class="just">Al crear una historieta, el usuario nos provee con material original de su propia autoría (imágenes y texto), el cual seguirá siendo propiedad del usuario una vez se haga pública su historieta en la plataforma.<br>
El contenido proveído por el usuario será sujeto a una revisión y monitoreo para determinar que sea apropiado para el público general. Algunas características que hacen del contenido inapropiado incluyen: <br>
* Material difamatorio, vulgar, amenazante, ofensivo, discriminatorio o que incite al odio hacia una persona o un grupo de personas. <br>
* Información y datos personales de cualquier tipo, ya sea en imágenes o texto. <br>
*Publicidad, solicitudes o mensajes comerciales. <br>
* Material excesivamente violento, gratuito y explícito con la intención de ofender o perturbar al lector. <br>
* Material que busque causar gratificación sexual en el lector, lo cual incluye desnudez y representaciones gráficas de actos sexuales.<br>
<br> Cualquier material que sea considerado inapropiado de acuerdo a estos estándares, será removido de la plataforma.</p>

  </div>

 
   
  </section>

  <?php
  include("PageElements/footer.php");
  ?>

  <!--  Andrew debe terminar el diseño -->

</body>

</html>