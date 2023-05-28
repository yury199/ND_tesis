<?php
session_start();
// Include config file
require_once "../StateConnections/conexion.php";

// Datos importados para poder eliminar
$usuario = $_SESSION["nombreusuario"];
$titulostory = $_SESSION["title"];

// Eliminar carpeta
$carpeta = '../../Historietas'.'/'.$usuario.'/'.$titulostory;
if (is_dir($carpeta)) {
    // Verificar que la carpeta exista antes de intentar eliminarla
    if (!is_writable($carpeta)) {
        echo "No tienes permisos para eliminar la carpeta.";
    } else {
        // Eliminar la carpeta y su contenido
        $success = deleteDirectory($carpeta);
        if ($success) {
            echo "Carpeta eliminada correctamente.";
        } else {
            echo "No se pudo eliminar la carpeta.";
        }
    }
}

// Eliminar filas de la base de datos
$sql = "DELETE FROM `historietas` WHERE `usuario` = '$usuario' AND `titlestory` = '$titulostory'";
if ($conexion->query($sql)) {
    // Eliminar filas de la base de datos
$sql = "DELETE FROM `users` WHERE `usuario` = '$usuario' AND `titlestory` = '$titulostory'";
if ($conexion->query($sql)) {
    echo "Filas eliminadas correctamente en la base de datos.";

} else {
    echo "Error al eliminar las filas";
}


} else {
    echo "Error al eliminar las filas";
}




// Función para eliminar una carpeta y su contenido recursivamente
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}



$conexion->close();
?>
