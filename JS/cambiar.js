// Crea una variable global para almacenar el índice de la imagen actual
var indiceImagen = 0;

// Crea una función para cambiar la imagen
function cambiarImagen() {
  // Incrementa el índice de la imagen actual
  indiceImagen++;

  // Si el índice es mayor o igual a la cantidad de imágenes, reinicia el índice a cero
  if (indiceImagen >= <?php echo count($imagenes); ?>) {
    indiceImagen = 0;
  }

  // Obtiene la imagen y la nomenclatura desde el DOM
  var imagen = document.getElementById("imagen");
  var nomenclatura = document.getElementById("nomenclatura");

  // Cambia la URL de la imagen y la nomenclatura
  imagen.src = "<?php echo $imagenes[0]; ?>";
  nomenclatura.innerHTML = "Nomenclatura de la historia " + (indiceImagen + 1);
}
