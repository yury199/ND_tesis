<?php
session_start();
include("../StateConnections/conexion.php");

// Obtener el ID del nodo actual desde la sesión
$Nodo = $_SESSION['nodeId'] ?? 0;
//Datos necesarios
$padre=$_SESSION['padreencomun'];
$emociones = $_POST['emociones'] ?? array();
$descripcion = $_POST['texto'] ?? '';
//Obtener las emociones no selecccionadas
$emocionesNoSeleccionadas = array_diff(['feliz', 'neutral', 'triste', 'sorprendido', 'enojado', 'asqueado', 'soprendido'], $emociones);
$emocionesNoSeleccionadasString = implode(',', $emocionesNoSeleccionadas);



// Ubicación de carpeta
$carpeta = '../../Historietas';
$subcarpeta = 'Luisa123';
$subsubcarpeta = 'El camaleón';

// Función para generar un nombre de archivo único
function generarNombreUnico($nombreArchivo)
{
    $nombreUnico = uniqid() . '_' . $nombreArchivo;
    return $nombreUnico;
}

// Verificar si se envió una imagen
if (!empty($_FILES['imagen']['name'])) {

    // Eliminar la imagen anterior si existe
    if (!empty($_SESSION['imgAnterior'])) {
        $rutaImagenAnterior = "../" . $_SESSION['imgAnterior']; // Reemplaza "../ruta/carpeta/" por la ruta de tu carpeta de imágenes
        if (file_exists($rutaImagenAnterior)) {
            if (unlink($rutaImagenAnterior)) {
                $archivo = $_FILES['imagen']['tmp_name'];
                $nombre = $_FILES['imagen']['name'];
            
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
            
                // Obtener el texto del formulario
                $texto = isset($_POST['texto']) ? $_POST['texto'] : '';
            
                // Guardar el nombre de la imagen y el texto en la base de datos
                $nombre_imagen = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico;

                $sqlActualizacion = "UPDATE users SET Descripcion = '$descripcion', imgUrl = '$nombre_imagen' WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND id_historieta = '$Nodo'";
                $resultadoActualizacion = $conexion->query($sqlActualizacion);
            
            } else {
                echo "Error al eliminar la imagen anterior.";
            }
        }

    }

} else {
    $sqlActualizacion = "UPDATE users SET Descripcion = '$descripcion' WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND id_historieta = '$Nodo'";
    $resultadoActualizacion = $conexion->query($sqlActualizacion);
    // No se envió una imagen, puedes manejarlo según tus necesidades
}

// Verificar si se seleccionaron emociones
if (!empty($emociones)) {
    // Actualizar las emociones en la base de datos
    $emocionesString = implode(',', $emociones);
    $sqlEmociones = "UPDATE users SET emocion = '$emocionesString' WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND id_historieta = '$Nodo'";
    $resultadoEmociones = $conexion->query($sqlEmociones);

    //Actualizar las emociones del otro nodo de decision
    $sqlEmocionesNoSeleccionadas = "UPDATE users SET emocion = '$emocionesNoSeleccionadasString' WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND parent='$padre' AND id_historieta <> '$Nodo'";
    $resultadoEmocionesNoSeleccionadas = $conexion->query($sqlEmocionesNoSeleccionadas);
} 

header("Location:../crear.php");
exit();

$conexion->close();
?>