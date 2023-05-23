<?php
session_start();
include("../StateConnections/conexion.php");

// Obtener el ID del nodo actual desde la sesión
$Nodo = $_SESSION['nodeId'] ?? 0;
//Datos necesarios
$padre = $_SESSION['padreencomun'];
$emociones = $_POST['emociones'] ?? array();
$descripcion = $_POST['texto'];
  // Obtener el texto del formulario
  $texto = isset($_POST['texto']) ? $_POST['texto'] : '';


//Obtener las emociones no selecccionadas
$emocionesNoSeleccionadas = array_diff(['feliz','neutral','triste','sorprendido','enojado','asqueado','asustado'], $emociones);
$emocionesNoSeleccionadasString = implode(',', $emocionesNoSeleccionadas);

// Ubicación de carpeta
$carpeta = '../../Historietas';
$subcarpeta = $_SESSION["nombreusuario"];
$subsubcarpeta = $_SESSION["title"];

// Función para generar un nombre de archivo único
function generarNombreUnico($nombreArchivo)
{
    $nombreUnico = uniqid() . '_' . $nombreArchivo;
    return $nombreUnico;
}

// Verificar si se envió una imagen
if (!empty($_FILES['imagenE']['name'])) {

    // Eliminar la imagen anterior si existe
    if (!empty($_SESSION['imgAnterior'])) {
        $rutaImagenAnterior = "../" . $_SESSION['imgAnterior']; // Reemplaza "../ruta/carpeta/" por la ruta de tu carpeta de imágenes
        if (file_exists($rutaImagenAnterior)) {
            if (unlink($rutaImagenAnterior)) {
                $archivo = $_FILES['imagenE']['tmp_name'];
                $nombre = $_FILES['imagenE']['name'];

                // Crear la ruta de la carpeta y subcarpeta
                $ruta_carpeta = $carpeta . '/';
                $ruta_subcarpeta = $ruta_carpeta . $subcarpeta . '/';
                $ruta_subsubcarpeta = $ruta_subcarpeta . $subsubcarpeta . '/';

                // Verificar si la carpeta y subcarpeta existen, si no, crearlas
                if (!file_exists($ruta_subsubcarpeta)) {
                    mkdir($ruta_subsubcarpeta, 0777, true);
                }

                // Generar un nombre único para el archivo
                $nombreUnico = generarNombreUnico($nombre);

                // Mover el archivo a la subcarpeta con el nombre único
                move_uploaded_file($archivo, $ruta_subsubcarpeta . $nombreUnico);



                // Guardar el nombre de la imagen y el texto en la base de datos
                $nombre_imagen = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico;

                $sqlActualizacion = "UPDATE users SET Descripcion = '$descripcion', imgUrl = '$nombre_imagen' WHERE usuario = '$subcarpeta ' AND titlestory = '$subsubcarpeta' AND id_historieta = '$Nodo'";
                $resultadoActualizacion = $conexion->query($sqlActualizacion);

            } else {
                $response = "Error al eliminar la imagen anterior.";
            }


        }


        $response = $descripcion;
    }

} else {

    /*     $sqlActualizacion = "UPDATE users SET Descripcion = '$descripcion' WHERE usuario = '$subcarpeta ' AND titlestory = '$subsubcarpeta' AND id_historieta = '$Nodo'";
        $resultadoActualizacion = $conexion->query($sqlActualizacion);
        $response="viñeta actualizada"; */
    // No existe una id_historia, crear una nueva
    $updateQuery = "UPDATE users SET descripcion = ? WHERE id_historieta = ? AND usuario = ? AND titlestory = ? ";
$stmt = $conexion->prepare($updateQuery);

if ($stmt) {
    // Asignar los valores a variables antes de pasarlas como argumentos
    $valor1 = $texto; // El nuevo valor de la descripción
    $valor2 = $Nodo; // El ID de la historieta (ajusta esto según tu caso)
    $valor3 = $subcarpeta;
    $valor4 = $subsubcarpeta;

    $stmt->bind_param("siss", $valor1, $valor2, $valor3, $valor4);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Se actualizó la descripción correctamente
        $response['message'] = "Se actualizó la descripción";
    } else {
        // No se encontró ningún registro que cumpla los criterios de actualización
        $response['message'] = "No se encontró ningún registro que cumpla los criterios de actualización";
    }
} else {
    // Error en la preparación de la consulta SQL
    $response['message'] = "Error en la preparación de la consulta SQL";
}





}

// Verificar si se seleccionaron emociones
if (!empty($emociones)) {
    // Actualizar las emociones en la base de datos
    $emocionesString = implode(',', $emociones);
    $sqlEmociones = "UPDATE users SET emocion = '$emocionesString' WHERE usuario = '$subcarpeta ' AND titlestory = '$subsubcarpeta' AND id_historieta = '$Nodo'";
    $resultadoEmociones = $conexion->query($sqlEmociones);

    //Actualizar las emociones del otro nodo de decision
    $sqlEmocionesNoSeleccionadas = "UPDATE users SET emocion = '$emocionesNoSeleccionadasString' WHERE usuario = '$subcarpeta ' AND titlestory = '$subsubcarpeta' AND parent='$padre' AND id_historieta <> '$Nodo'";
    $resultadoEmocionesNoSeleccionadas = $conexion->query($sqlEmocionesNoSeleccionadas);
    
    $response = "emociones actualizadas";

}

$_SESSION["nodeId"] = 0;

$conexion->close();
// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>