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
  <link href="../CSS/mostrarHistorieta.css" rel="stylesheet" type="text/css">
</head>

<body onload="cambiarColor()">


  <body>
    <header>

      <?php
      include("PageElements/nav_On.php");
      ?>

    </header>


    <section class="index_main mostrarHistorieta">

      <div class="especio1">

        <div class="contenedorEmociones">
          <div class="con_his_vi">
            <video class="proyeccion" id="video" width="200" height="160" autoplay muted></video>
          </div>
          <img src="../Recursos/grabacion.png" alt="">
        </div>

        <div class="barrita" id="barraemociones">
          <img id="cara" src="../Recursos/Eneutral.png" alt="">
          <p id="emocdecttext">hola</p>
        </div>

      </div>

      <div class=" contenedorMostrar">
        <div class="barraSuperior">
          <h1>
            <?php echo $_SESSION['titulohistoria'] ?>
          </h1>
          <div class="enlaces_h">
            <a href="#" onclick="reiniciarHistorieta()">
              <svg xmlns="http://www.w3.org/2000/svg" class="botn_item" fill="none">
                <path fill="#0C8558"
                  d="m37.35 12.632-13.787 10.96 6.488.858a9.922 9.922 0 0 1-3.486 5.024 9.451 9.451 0 0 1-5.696 1.928c-5.301 0-9.614-4.442-9.614-9.901 0-5.46 4.313-9.902 9.614-9.902a9.325 9.325 0 0 1 6.168 2.304l7.23-8.897C30.768 1.991 26.403.241 21.843.023A20.438 20.438 0 0 0 9.024 3.802C5.266 6.47 2.462 10.334 1.04 14.8a22.11 22.11 0 0 0 .108 13.732c1.493 4.442 4.358 8.258 8.157 10.863a20.423 20.423 0 0 0 12.877 3.563c4.555-.294 8.892-2.117 12.345-5.19 3.453-3.074 5.833-7.229 6.776-11.828l6.697.887-10.65-14.195Z" />
              </svg>
              Reiniciar</a>
            <a href="#" onclick="cambiarImagen()">
              <svg xmlns="http://www.w3.org/2000/svg" class="botn_item" fill="none">
                <path fill="#0C8558" d="M0 40V0l48 19.893L0 40Z" />
              </svg>
              Siguiente</a>
          </div>
        </div>
        <div id="contenedor_historia">
       
          <img id="imagenH" src="../Historietas/inicio.jpg" data-src="<?php echo $imagenes[0]; ?>"
            alt="Imagen de la historia" loading="lazy">
            <p id="des_his"></p>
        </div>

      </div>

      <div class="espacio2">

        <div class="contenedorAviso" id="avisa2" style="display: none;">
          <img src="../Recursos/Aia.png" alt="niño">
          <div class="infoit">
            <img src="../Recursos/Bdividir.png" alt="icono">
            <h6>Decidiendo el rumbo de tu historia...</h6>
          </div>
        </div>


        <div class="contenedorAviso" id="avisa">
          <img src="../Recursos/Aduda.png" alt="niño">
          <div class="infoit">
            <img src="../Recursos/x.png" alt="icono">
            <h6 id="textoA">Ajusta tu posición en la cámara para ser detectado.</h6>
          </div>
        </div>
      </div>

    </section>
    <script src="../JS/jquery-3.4.1.min.js"></script>
    <script defer src="../JS/face-api.min.js"></script>
    <script defer src="../JS/script.js"></script>


    <script>

      function reiniciarHistorieta() {
        // Realizar una solicitud AJAX al servidor para reiniciar las variables
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
            location.reload();
          }
        };
        xhttp.open("GET", "./readStates/reiniciar.php", true);  // Archivo PHP que contiene la lógica para reiniciar las variables
        xhttp.send();
      }


    </script>


    <?php
    include("PageElements/footer.php");
    ?>

  </body>


</html>