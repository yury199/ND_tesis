<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Home</title>
<link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
    <meta charset="UTF-8">
    <meta name="title" content="Home">
    <meta name="description" content="Home"> 
	    <!-- Enlaces--> 
      <link rel="stylesheet" href="../CSS/fonts.css">   
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
	<link href="../CSS/style.css" rel="stylesheet" type="text/css">
  <link href="../CSS/info.css" rel="stylesheet" type="text/css">
</head>
<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->  
<header>

    <?php
    include("PageElements/nav_On.php");
    ?>
  
</header>
    <!--Aquí Termina el NAV  -->
    <section class="index_main">
        
        <section class="encabezado">
         
          <div class="contenedor principal">
            <div class="encabezado__titulo">
              <h1 class="titulo">Crea<span class="spantitulo"> tu</span><br>historieta</h1>
              <svg xmlns="http://www.w3.org/2000/svg" class="encabezado__item" width="86" height="102" fill="none"><g clip-path="url(#a)">
              <path fill="#3D9D79" d="M52.328 31.51c-.097-.16-.229-.3-.341-.444-.318-.396-.552-.732-.662-1.214-.55-2.417-1.12-4.827-1.693-7.237-.024-.104-.143-.255-.225-.262-.967-.073-1.936-.123-2.948-.18.022.455.041.895.067 1.335.046.782.1 1.568.14 2.35.029.55-.313.896-.875.867-1.094-.055-2.189-.128-3.283-.191-.093-.005-.186 0-.318 0 .022.435.04.866.065 1.295.03.519.082 1.038.09 1.557.005.255.111.334.332.39 2.476.59 4.95 1.19 7.422 1.798.207.05.402.194.58.328.19.145.354.328.525.5.467.534 1.721.072 1.127-.892h-.003Z"/>
              <path fill="#0C8558" d="M44.79 25.265c-.063-1.133-.115-2.221-.193-3.31-.008-.134-.138-.277-.242-.383-3.614-3.681-7.232-7.358-10.85-11.035-.242-.247-.452-.502-.361-.889.119-.51.662-.754 1.1-.48.133.082.247.196.358.308A8616.03 8616.03 0 0 1 45.428 20.49a.779.779 0 0 0 .573.255c.612.02 1.224.069 1.786.101-5-5.08-10.015-10.178-14.995-15.24l-7.362 7.486c4.957 5.038 9.972 10.138 15.017 15.27-.041-.727-.073-1.44-.134-2.152-.009-.103-.134-.206-.22-.294-3.616-3.68-7.235-7.357-10.85-11.036-.095-.097-.195-.194-.273-.306a.766.766 0 0 1 .087-.987.728.728 0 0 1 .947-.077c.11.079.205.18.3.277 3.619 3.677 7.237 7.354 10.848 11.038.167.17.331.248.569.257.854.04 1.708.104 2.56.159.156.008.312.013.509.021v.003Z"/><path fill="#6DB69B" d="M21.008 8.66c2.486-2.529 4.963-5.047 7.458-7.582C27.716.332 26.79-.031 25.72 0c-1.004.03-1.86.429-2.572 1.148-.696.704-1.397 1.4-2.08 2.118-1.488 1.561-1.503 3.921-.06 5.392v.003Z"/><path fill="#3D9D79" d="m22.182 9.833.415.453c2.491-2.532 4.97-5.047 7.454-7.574l-.445-.43c-2.463 2.506-4.942 5.024-7.424 7.55ZM31.678 4.34l-.452-.465c-2.487 2.53-4.966 5.05-7.463 7.587.147.135.324.293.48.431l7.435-7.556v.002Z"/><path fill="#0C8558" d="M68.53 61.756c-.99-.677-3.05-1.42-10.828-1.8-3.935-.192-8.849-.256-14.104-.188-.017-2.672-.063-5.819-.119-7.76-.03-1.1-.277-3.1.1-5.18.413-2.483 1.916-4.654 3.756-6.33 1.241-1.15 2.513-2.381 3.469-3.797.43-.632.834-1.304 1.178-2.008.195-.4-.359-.735-.616-.372a15.415 15.415 0 0 1-1.393 1.676c-1.103 1.166-2.454 2.098-3.784 2.971-2.537 1.634-4.717 4.011-5.729 6.96-.835 2.24-.884 4.544-.897 6.081-.022 2.613-.122 5.228-.096 7.84-6.172.159-12.032.478-16.565.902-7.99.75-9.306 1.553-10.035 2.382-1.301 1.478-2.03 4.163-2.23 8.208-.133 2.716.025 5.071.031 5.17l4.315-.306c-.26-3.791.073-8.53.968-9.951 1.901-.748 11.045-1.678 23.421-2.002V76.28h4.325V64.167c12.784-.17 21.02.49 22.44 1.251 2.177 1.522 2.755 7.62 2.467 11.476l4.312.338c.093-1.214.75-11.961-4.385-15.476Z"/><path fill="#6DB69B" d="M26.066 98.336a2.71 2.71 0 0 1-2.055 2.199c-1.888.436-5.33 1.076-10.077 1.346-4.747.271-8.071.033-10.022-.18a2.705 2.705 0 0 1-2.327-2.065A56.608 56.608 0 0 1 .078 89.517a56.776 56.776 0 0 1 .4-10.31 2.711 2.711 0 0 1 2.011-2.282c1.817-.46 5.093-1.1 9.996-1.38 5.013-.283 8.378 0 10.207.256a2.709 2.709 0 0 1 2.226 1.946c.514 1.79 1.234 5.107 1.52 10.275.28 5.104-.06 8.462-.372 10.314Z"/>
              <path fill="#9ECEBC" d="M54.908 98.103a2.7 2.7 0 0 1-2.249 1.995c-1.918.253-5.406.563-10.157.38-4.752-.182-8.039-.734-9.961-1.135a2.723 2.723 0 0 1-2.128-2.276 56.754 56.754 0 0 1-.57-10.217 56.849 56.849 0 0 1 1.348-10.227 2.703 2.703 0 0 1 2.215-2.083c1.85-.283 5.173-.609 10.08-.42 4.907.19 8.34.797 10.138 1.225a2.717 2.717 0 0 1 2.035 2.15c.346 1.829.759 5.2.566 10.373-.192 5.172-.839 8.42-1.321 10.233l.004.002Z"/>
              <path fill="#6DB69B" d="M85.366 98.24a2.706 2.706 0 0 1-2.102 2.152c-1.896.392-5.354.959-10.103 1.122-4.637.161-8.069-.145-10.015-.402a2.715 2.715 0 0 1-2.284-2.116 56.706 56.706 0 0 1-1.289-10.15 56.846 56.846 0 0 1 .62-10.299 2.71 2.71 0 0 1 2.062-2.238c1.825-.42 5.116-.988 10.023-1.157 5.018-.174 8.376.185 10.2.48a2.71 2.71 0 0 1 2.181 1.994c.476 1.801 1.127 5.133 1.3 10.306.17 5.11-.242 8.46-.593 10.303v.004Z"/></g>
              <defs><clipPath id="a"><path fill="#fff" d="M0 0h86v102H0z"/></clipPath></defs>
            </svg>
          </div>
          <p class="texto">¿Quieres volver a ver cómo quedaron las historietas que has publicado?¿Te gustaría hacer cambios o correcciones a una de ellas? Mantente al día con tus creaciones en este apartado..</p>
          <a href="PHP/login.php" class="botonGeneral">COMENZAR</a>
        </div>
        <div class="encabezado__imagen">
            <img src="../Recursos/niño2.png" alt="niño con una idea">
          </div>
      </section>
      <section class="info">
        <div class="contenedor infoF">
          <div class="contenedor_info">
            <div class="info_img">
              <img src="../Recursos/crear.png" alt="idea">
            </div>
            <div class="espacio"></div>
       
            <h3 class="titulo">CREAR</h3>
            <p class="texto">Desarrolla tu propia historieta interactiva usando imágenes y asignándoles emociones.</p>
          
          </div>
          <div class="contenedor_info">
            <div class="info_img">
              <img src="../Recursos/leer.png" alt="leer">
            </div>
            <div class="espacio"></div>
            <h3 class="titulo">LEER</h3>
            <p class="texto">Escoge y lee historietas creadas por otros usuarios, o lee las 2 historietas predeterminadas.</p>
          </div>

        <div class="contenedor_info">
          <div class="info_img">
            <img src="../Recursos/editar.png" alt="leer">
          </div>
          <div class="espacio"></div>
          <h3 class="titulo">MIS HISTORIETAS</h3>
          <p class="texto">Revisa y edita las historietas que has creado. </p>
        </div>
      </div>
      </section>

    </section>

    <?php
    include("PageElements/footer.php");
    ?>
</body>
</html>