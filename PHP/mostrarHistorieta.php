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
      <body >
    

      <section class="mostrarHistorieta">
      <div class="contenedorMostrar">
      <div class="contenedorEmociones">
        <div class="con_his_vi">
      <video class="proyeccion" id="video" width="200" height="160" autoplay muted></video></div>
      <img src="../Recursos/grabacion.png" alt="">
      </div>

      <h2 >Titulo de la historia</h2>
      <div id="contenedor_historia">
      <img id="imagen" src="../IMG/carga.jpg" data-src="<?php echo $imagenes[0]; ?>" alt="Imagen de la historia" loading="lazy">

      <p id="des_his">Nomenclatura de la historia 1</p>
      </div>
      <div class="BotonesNarrativos"> 
        <button onclick="cambiarImagen()">Siguiente</button>
        <button onclick="reiniciarHistorieta()">Reiniciar</button>
      </div>
      </div>
      </section>


<script src="../JS/cambioColor.js"></script>
<script src="../JS/jquery-3.4.1.min.js"></script>
<script defer src="../JS/face-api.min.js"></script>
<script defer src="../JS/script.js"></script>
    <?php
    include("PageElements/footer.php");
    ?>

</body>


</html>