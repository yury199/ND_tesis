<?php
session_start();
require_once "../StateConnections/conexion.php";

$nodeid = $_SESSION["nodeId"];

// Verificar si el registro existe en la base de datos
$sql_select = "SELECT * FROM users WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory='El camaleón' ";
$stmt_select = mysqli_prepare($conexion, $sql_select);
mysqli_stmt_bind_param($stmt_select, "i", $nodeid);
mysqli_stmt_execute($stmt_select);
$resultado = mysqli_stmt_get_result($stmt_select);

if (mysqli_num_rows($resultado) > 0) {
    // Obtener la información del registro
    $row = mysqli_fetch_assoc($resultado);
    $rutaImagen = '../' . $row['imgUrl']; // Reemplaza 'imgUrl' con el nombre de la columna que almacena la ruta de la imagen en tu tabla de base de datos
    $climax = $row['climax'];
    $parent = $row['parent'];

    // Verificar si la imagen existe en la ruta especificada y eliminarla
    if (file_exists($rutaImagen)) {
        if (unlink($rutaImagen)) {
            echo 'La imagen ha sido eliminada correctamente.';
        } else {
            echo 'No se pudo eliminar la imagen.';
        }
    } else {
        echo 'La imagen no existe en la ruta especificada.';
    }

    // Eliminar las imágenes con parent igual a nodeId y contarlas
    $sql_select_images = "SELECT imgUrl FROM users WHERE parent = ? AND usuario = 'Luisa123' AND titlestory='El camaleón'";
    $stmt_select_images = mysqli_prepare($conexion, $sql_select_images);
    mysqli_stmt_bind_param($stmt_select_images, "i", $nodeid);
    mysqli_stmt_execute($stmt_select_images);
    $resultado_images = mysqli_stmt_get_result($stmt_select_images);

    $num_images_deleted = 0;

    while ($row_image = mysqli_fetch_assoc($resultado_images)) {
        $rutaImagen = '../' . $row_image['imgUrl'];
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
            $num_images_deleted++;
        }
    }

    // Verificar el valor de climax
    if ($climax == 1) {
        // Buscar un nodo con el mismo parent y actualizar su fila
        $sql_update_node = "UPDATE users SET climax = 0, emocion = 'N/A' WHERE parent = ? AND climax = 1 AND usuario = 'Luisa123' AND titlestory='El camaleón'";
        $stmt_update_node = mysqli_prepare($conexion, $sql_update_node);
        mysqli_stmt_bind_param($stmt_update_node, "i", $parent);
        mysqli_stmt_execute($stmt_update_node);
        mysqli_stmt_close($stmt_update_node);
    }

    // Eliminar el registro principal
    $sql_delete_record = "DELETE FROM users WHERE id_historieta = ? AND usuario = 'Luisa123' AND titlestory='El camaleón'";
    $stmt_delete_record = mysqli_prepare($conexion, $sql_delete_record);
    mysqli_stmt_bind_param($stmt_delete_record, "i", $nodeid);
    mysqli_stmt_execute($stmt_delete_record);
    $num_records_deleted = mysqli_stmt_affected_rows($stmt_delete_record);
    mysqli_stmt_close($stmt_delete_record);

    // Eliminar los registros secundarios
    $sql_delete_children = "DELETE FROM users WHERE parent = ? AND usuario = 'Luisa123' AND titlestory='El camaleón'";
    $stmt_delete_children = mysqli_prepare($conexion, $sql_delete_children);
    mysqli_stmt_bind_param($stmt_delete_children, "i", $nodeid);
    mysqli_stmt_execute($stmt_delete_children);
    $num_children_deleted = mysqli_stmt_affected_rows($stmt_delete_children);
    mysqli_stmt_close($stmt_delete_children);

    if ($num_records_deleted > 0) {
        // Se eliminaron las imágenes y los registros correctamente
        echo "Se eliminaron " . $num_images_deleted . " imágenes, " . $num_records_deleted . " registros principales y " . $num_children_deleted . " registros secundarios correctamente.";
        header("Location:../crear.php");
        exit();
    } else {
        // No se pudieron eliminar las imágenes y los registros
        echo "No se pudieron eliminar las imágenes y los registros de la base de datos";
    }
} else {
    // El registro no existe en la base de datos
    $aviso_nodo = "Añade un nodo primero para poder eliminar";
    $_SESSION['aviso_nodo'] = $aviso_nodo;
    header("Location:../crear.php");
    exit();
}

mysqli_stmt_close($stmt_select);
mysqli_close($conexion);

?>