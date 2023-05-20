<?php
session_start();
require_once "../StateConnections/conexion.php";

$padreNodo = $_SESSION['nodeId'] ?? 0;
$newDescription = $_POST["texto"];

// Ubicación de la carpeta
$carpeta = '../../Historietas';
$subcarpeta = 'Luisa123';
$subsubcarpeta = 'El camaleón';

// Función para generar un nombre de archivo único
function generarNombreUnico($nombreArchivo) {
    $nombreUnico = uniqid() . '_' . $nombreArchivo;
    return $nombreUnico;
}

// Verificar si se ha enviado una imagen
if (isset($_FILES['imagen'])) {
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

    // Obtener la ruta de la imagen actual del nodo
    $sql_select_imagen = "SELECT imgUrl FROM users WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory = 'El camaleón'";
    $stmt_select_imagen = mysqli_prepare($conexion, $sql_select_imagen);
    mysqli_stmt_bind_param($stmt_select_imagen, "i", $padreNodo);
    mysqli_stmt_execute($stmt_select_imagen);
    $resultado_imagen = mysqli_stmt_get_result($stmt_select_imagen);

    if (mysqli_num_rows($resultado_imagen) > 0) {
        $row_imagen = mysqli_fetch_assoc($resultado_imagen);
        $ruta_imagen_anterior = '../../' . $row_imagen['imgUrl'];

        // Verificar si la imagen anterior existe
        if (file_exists($ruta_imagen_anterior)) {
            // Eliminar la imagen anterior solo si se cambió
            if ($row_imagen['imgUrl'] !== $ruta_subsubcarpeta . $nombreUnico) {
                if (unlink($ruta_imagen_anterior)) {
                    // La imagen anterior ha sido eliminada correctamente
                    echo 'La imagen anterior ha sido eliminada.';
                } else {
                    // No se pudo eliminar la imagen anterior
                    echo 'No se pudo eliminar la imagen anterior.';
                }
            }
        } else {
            // La imagen anterior no existe en la ruta especificada
            echo 'La imagen anterior no existe en la ruta especificada.';
        }
    }

    // Guardar la ruta de la nueva imagen en la base de datos
    $nombre_imagen = 'Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico;

    // Actualizar los datos del nodo
    $sql_update = "UPDATE users SET Descripcion = ?, imgUrl = ? WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory = 'El camaleón'";
    $stmt_update = mysqli_prepare($conexion, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "ssi", $newDescription, $nombre_imagen, $padreNodo);
    mysqli_stmt_execute($stmt_update);

    if (mysqli_stmt_affected_rows($stmt_update) > 0) {
        // La actualización se realizó correctamente
        echo "El nodo se ha actualizado correctamente.";

        // Verificar si se seleccionaron emociones
        if (isset($_POST['emociones'])) {
            $emociones_seleccionadas = $_POST['emociones'];

            // Actualizar las emociones del nodo seleccionado
            $sql_update_emociones = "UPDATE users SET emocion = 0 WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory = 'El camaleón'";
            $stmt_update_emociones = mysqli_prepare($conexion, $sql_update_emociones);
            mysqli_stmt_bind_param($stmt_update_emociones, "i", $padreNodo);
            mysqli_stmt_execute($stmt_update_emociones);

            // Actualizar las emociones seleccionadas
            $sql_update_emociones_seleccionadas = "UPDATE users SET emocion = 1 WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory = 'El camaleón' AND emocion IN (" . implode(',', $emociones_seleccionadas) . ")";
            $stmt_update_emociones_seleccionadas = mysqli_prepare($conexion, $sql_update_emociones_seleccionadas);
            mysqli_stmt_bind_param($stmt_update_emociones_seleccionadas, "i", $padreNodo);
            mysqli_stmt_execute($stmt_update_emociones_seleccionadas);

            echo "Las emociones seleccionadas se han actualizado correctamente.";

            // Obtener los nodos existentes con el mismo parent y climax igual a 1
            $sql_select_nodos_existentes = "SELECT id_historieta FROM users WHERE parent = ? AND climax = 1";
            $stmt_select_nodos_existentes = mysqli_prepare($conexion, $sql_select_nodos_existentes);
            mysqli_stmt_bind_param($stmt_select_nodos_existentes, "i", $padreNodo);
            mysqli_stmt_execute($stmt_select_nodos_existentes);
            $resultado_nodos_existentes = mysqli_stmt_get_result($stmt_select_nodos_existentes);

            if (mysqli_num_rows($resultado_nodos_existentes) > 0) {
                $nodos_existentes = mysqli_fetch_all($resultado_nodos_existentes, MYSQLI_ASSOC);

                // Actualizar las emociones no seleccionadas en los nodos existentes
                $emociones_no_seleccionadas = array_diff(range(1, 5), $emociones_seleccionadas);
                $sql_update_emociones_no_seleccionadas = "UPDATE users SET emocion = 0 WHERE id_historieta IN (" . implode(',', array_column($nodos_existentes, 'id_historieta')) . ") AND emocion IN (" . implode(',', $emociones_no_seleccionadas) . ")";
                $stmt_update_emociones_no_seleccionadas = mysqli_prepare($conexion, $sql_update_emociones_no_seleccionadas);
                mysqli_stmt_execute($stmt_update_emociones_no_seleccionadas);

                echo "Las emociones no seleccionadas se han actualizado correctamente.";
            }
        } else {
            echo "No se seleccionaron emociones.";
        }
    } else {
        // No se pudo realizar la actualización
        echo "No se pudo actualizar el nodo.";
    }

    mysqli_close($conexion);
} else {
    echo "No se ha enviado una imagen.";
}
?>