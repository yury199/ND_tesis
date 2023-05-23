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
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link href="../CSS/mostrarHistorieta.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../CSS/fonts.css">
  <script src="../JS/nav_menu.js"></script>
</head>

<body onload="cambiarColor()">

  <body>
    <header>

      <?php
      include("PageElements/nav_On.php");
      ?>

    </header>


    <section class="mostrarHistorieta">

      <div class="contenedorEmociones">
        <div class="con_his_vi">
          <video class="proyeccion" id="video" width="200" height="160" autoplay muted></video>
        </div>
        <img src="../Recursos/grabacion.png" alt="">
      </div>

      <div class="contenedorMostrar">
        <div class="barraSuperior">
          <h2>Titulo de la historia</h2>
          <div class="enlaces_h">
            <a href="#" onclick="reiniciarHistorieta()">
              <svg xmlns="http://www.w3.org/2000/svg" class="botn_item" width="48" height="43" fill="none">
                <path fill="#0C8558"
                  d="m37.35 12.632-13.787 10.96 6.488.858a9.922 9.922 0 0 1-3.486 5.024 9.451 9.451 0 0 1-5.696 1.928c-5.301 0-9.614-4.442-9.614-9.901 0-5.46 4.313-9.902 9.614-9.902a9.325 9.325 0 0 1 6.168 2.304l7.23-8.897C30.768 1.991 26.403.241 21.843.023A20.438 20.438 0 0 0 9.024 3.802C5.266 6.47 2.462 10.334 1.04 14.8a22.11 22.11 0 0 0 .108 13.732c1.493 4.442 4.358 8.258 8.157 10.863a20.423 20.423 0 0 0 12.877 3.563c4.555-.294 8.892-2.117 12.345-5.19 3.453-3.074 5.833-7.229 6.776-11.828l6.697.887-10.65-14.195Z" />
              </svg>
              Reiniciar</a>
            <a href="#" onclick="cambiarImagen()">
              <svg xmlns="http://www.w3.org/2000/svg" class="botn_item" width="48" height="40" fill="none">
                <path fill="#0C8558" d="M0 40V0l48 19.893L0 40Z" />
              </svg>
              Siguiente</a>
          </div>
        </div>
        <div id="contenedor_historia">
          <img id="imagenH" src="../Historietas/inicio.jpg" data-src="<?php echo $imagenes[0]; ?>"
            alt="Imagen de la historia" loading="lazy">
          <p id="des_his">Nomenclatura de la historia 1</p>
        </div>
      </div>

      <div class="contenedorEmociones" style="opacity:0;">

      </div>

    </section>


    <script src="../JS/cambioColor.js"></script>
    <script src="../JS/jquery-3.4.1.min.js"></script>
    <script defer src="../JS/face-api.min.js"></script>
    <script defer src="../JS/script.js"></script>


    <script>

      function reiniciarHistorieta() {
        // Realizar una solicitud AJAX al servidor para reiniciar las variables
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
            // La solicitud se completó con éxito, puedes realizar cualquier acción adicional aquí si es necesario
            // Por ejemplo, puedes actualizar la página para reflejar los cambios reiniciando la historia
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