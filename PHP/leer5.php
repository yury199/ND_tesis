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
      <link href="../CSS/leer.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../CSS/fonts.css">
        <!-- Definir colores--> 
      <script src="../JS/cambioColor.js"></script>
      
      
      
    </head>
    <body>
        <!-- Aquí comienza el NAV -->  
        <header>
    
      <?php
      include("PageElements/nav_On.php");
      ?>

      </header>
      <!--Aquí Termina el NAV  -->
      <article>

<br><br><br><br><br><br>

<div class="w"><video id="video" width="320" height="360" autoplay muted></video></div>
<div class="contenedor">
<h2 >Titulo de la historia</h2>

<div id="historia">
  <img id="imagen" src="<?php echo $imagenes[0]; ?>" alt="Imagen de la historia">
  <div id="nomenclatura">Nomenclatura de la historia 1</div>
  <button onclick="cambiarImagen()">Siguiente</button>
</div>

<p id="resultado">hola</p>

</div>
</article>


<script src="../JS/cambioColor.js"></script>
<script defer src="../JS/face-api.min.js"></script>
<script defer src="../JS/script.js"></script>
<script src="../JS/jquery-3.4.1.min.js"></script>

</body>


</html>