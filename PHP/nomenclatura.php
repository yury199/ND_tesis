<?php
session_start();

include("StateConnections/conexion.php");


if(!isset($_SESSION['global_variable']) || empty($_SESSION['global_variable'])) {
  $_SESSION['global_variable'] = 0;
}



$user =$_SESSION["nombreusuario"];  // especifica el nombre de usuario
$titulo = "El camaleón"; // especifica el título de la imagen


$N=0;
$D=0;
$C=$_SESSION['global_variable'];

$codigo = "N".$N."-D".$D."-".$C; 
// especifica el código de la imagen


$query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
$resultado = $conexion->query($query);
    
if ($resultado->num_rows > 0) {
  // Se encontró una coincidencia para la nomenclatura
  $row = $resultado->fetch_assoc();
  $imagenCodificada = $row['Enlace'];
  echo $imagenCodificada;

} else {
  $N += 1;  // Incrementa N en 1
  
  $codigo = "N".$N."-D".$D."-".$C; // Actualiza el código de la imagen con el nuevo valor de N y la variable global reiniciada a cero
  $query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
  $resultado = $conexion->query($query);


  if ($resultado->num_rows > 0) {
    // Se encontró una coincidencia para la nomenclatura actualizada
    $row = $resultado->fetch_assoc();
    $imagenCodificada = $row['Enlace'];
    echo $imagenCodificada;
    

  } else {

    $D = 1;
    $C+=1;
       
    $codigo = "N".$N."-D".$D."-".$C; 
    $query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
    $resultado = $conexion->query($query);
  
  
    if ($resultado->num_rows > 0) {
      // Se encontró una coincidencia para la nomenclatura actualizada
      $row = $resultado->fetch_assoc();
      $imagenCodificada = $row['Enlace'];
      echo $imagenCodificada;
  
    } else{


    }



  }
}




$conexion->close();


// Código para obtener la URL de la imagen de fondo

?>