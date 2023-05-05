<?php
session_start();

include("StateConnections/conexion.php");

$variable =0+$_POST['variable'];

$response = array(
  'variable' => $variable
);
echo $variable;
echo json_encode($response);



//Definiciones 
$N = 0+1;
$D = 0;
$C = $variable;

//
$user =$_SESSION["nombreusuario"];  // especifica el nombre de usuario
$titulo = "El camaleón"; // especifica el título de la imagen
$codigo = "N".$N."-D".$D."-".$C;// especifica el código de la imagen
echo $codigo;


$query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
$resultado = $conexion->query($query);
echo $query;
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $imagenCodificada = $row['Enlace'];
?>

  <div style="background-image: url('<?php echo $imagenCodificada; ?>'); background-size: cover; background-position: center;">
            <!-- Contenido del div aquí -->
            <h1>Bienvenido <?php echo  $_SESSION["nombreusuario"]; ?></h1>
          </div>
 
<?php
} else {
    echo "No se encontraron imágenes para el usuario y título especificados.";
}
$conexion->close();


?>