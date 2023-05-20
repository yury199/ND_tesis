<?php
session_start();
// Include config file
require_once "../StateConnections/conexion.php";

// Variables
$padreNodo = $_SESSION['nodeId'] ?? 0;

$_SESSION['aviso_nodo'] = 'Crea y diviértete';

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

    // Obtener el texto del formulario
    $texto = isset($_POST['texto']) ? $_POST['texto'] : '';

    // Guardar el nombre de la imagen y el texto en la base de datos
    $nombre_imagen = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico;

    // Verificar si existe una id_historia para el usuario "Luisa123"
    $query = "SELECT id_historieta FROM users WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        if ($padreNodo == 0) {
            $aviso_nodo = "Seleccione un nodo por favor";
            $_SESSION['aviso_nodo'] = $aviso_nodo;
            header("Location:../crear.php");
            exit();
        } else {
            // Verificar si existe una id_historia con el padreNodo especificado
            $query = "SELECT id_historieta FROM users WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND parent = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "i", $padreNodo);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($resultado->num_rows > 0) {
                $aviso_nodo = "Por favor seleccione los nodos de los finales para agregar";
                $_SESSION['aviso_nodo'] = $aviso_nodo;
                header("Location:../crear.php");
                exit();
            } else {
                // Obtener el valor más alto
                $maxIdQuery = "SELECT MAX(id_historieta) FROM users";
                $maxIdResult = $conexion->query($maxIdQuery);
                $row = mysqli_fetch_array($maxIdResult);
                $maxId = $row[0];
                $nodo = $maxId + 1;

                // Insertar nueva fila en la base de datos
                $insertQuery = "INSERT INTO users (id_historieta, parent, imgUrl, usuario, titlestory, genero, descripcion, emocion, climax)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conexion, $insertQuery);

                if ($stmt) {
                    // Asignar los valores a variables antes de pasarlas como argumentos
                    $valor1 = $nodo;
                    $valor2 = $padreNodo;
                    $valor3 = $nombre_imagen;
                    $valor4 = 'Luisa123';
                    $valor5 = 'El camaleón';
                    $valor6 = 'aventuras';
                    $valor7 = $texto;
                    $valor8 = 'N/A';
                    $valor9 = '0';

                    mysqli_stmt_bind_param($stmt, "iisssssss", $valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, $valor9);
                    mysqli_stmt_execute($stmt);

                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        // La fila se insertó correctamente
                        $aviso_nodo = "Se agregó nodo";
                        $_SESSION['aviso_nodo'] = $aviso_nodo;
                        header("Location:../crear.php");
                        exit();
                    } else {
                        // No se pudo insertar la fila
                        echo "No se pudo insertar la fila en la base de datos";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    // No se pudo preparar la declaración
                    echo "Error al preparar la declaración SQL";
                }
            }
        }
    } else {
        // No existe una id_historia, crear una nueva
        $insertQuery = "INSERT INTO users (id_historieta, imgUrl, usuario, titlestory, genero, descripcion, emocion, climax)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $insertQuery);

        if ($stmt) {
            // Asignar los valores a variables antes de pasarlas como argumentos
            $valor1 = '1';
            $valor2 = $nombre_imagen;
            $valor3 = 'Luisa123';
            $valor4 = 'El camaleón';
            $valor5 = 'aventuras';
            $valor6 = $texto;
            $valor7 = 'N/A';
            $valor8 = '0';

            mysqli_stmt_bind_param($stmt, "isssssss", $valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                // La fila se insertó correctamente
                $aviso_nodo = "Se agregó el primer nodo de la historia";
                $_SESSION['aviso_nodo'] = $aviso_nodo;
                header("Location:../crear.php");
                exit();
            } else {
                // No se pudo insertar la fila
                echo "No se pudo insertar la fila en la base de datos";
            }

            mysqli_stmt_close($stmt);
        } else {
            // No se pudo preparar la declaración
            echo "Error al preparar la declaración SQL";
        }
    }
} else {
    // No se envió una imagen
    echo "No se ha enviado una imagen";
}

mysqli_close($conexion);
?>
