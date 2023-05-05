<?php
session_start();

include("StateConnections/conexion.php");


if(!isset($_SESSION['global_variable']) || empty($_SESSION['global_variable'])) {
  $_SESSION['global_variable'] = 0;
}



$user =$_SESSION["nombreusuario"];  // especifica el nombre de usuario
$titulo = "El camaleón"; // especifica el título de la imagen
$codigo = "N0-D0-".$_SESSION['global_variable'];
// especifica el código de la imagen



$query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
$resultado = $conexion->query($query);
    
if ($resultado->num_rows > 0) {
  // Se encontró una coincidencia para la nomenclatura
  $row = $resultado->fetch_assoc();
  $imagenCodificada = $row['Enlace'];
  echo $imagenCodificada;

} else {

  // No se encontró ninguna coincidencia para la nomenclatura
  $N += 1;  // Incrementa N en 1
  updateGlobalVariable('reset'); // Reinicia la variable global a cero
  $codigo = "N".$N."-D".$D."-".$_SESSION['global_variable']; // Actualiza el código de la imagen con el nuevo valor de N y la variable global reiniciada a cero
  $query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
  $resultado = $conexion->query($query);
  error_log('Mensaje de depuración: ' . $codigo);


  if ($resultado->num_rows > 0) {
    // Se encontró una coincidencia para la nomenclatura actualizada
    $row = $resultado->fetch_assoc();
    $imagenCodificada = $row['Enlace'];
    echo $imagenCodificada;

  } else {
    // Todavía no se encontró ninguna coincidencia para la nueva nomenclatura
    echo "Imagen no encontrada.";
  }
}



$conexion->close();


// Código para obtener la URL de la imagen de fondo

?>