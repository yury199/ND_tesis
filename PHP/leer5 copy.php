<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mostrar imágenes con botón</title>
  </head>
  
  <body>
    <?php
    include("imgen.php");
    ?>
  <div id="historia">
  <img id="imagen" src="<?php echo $imagenes[0]; ?>" alt="Imagen de la historia">
  <div id="nomenclatura">Nomenclatura de la historia 1</div>
  <button onclick="cambiarImagen()">Cambiar imagen</button>
  </div>




  </body>
</html>
