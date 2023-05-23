<?php
session_start();
// Include config file
require_once "../StateConnections/conexion.php";

// Variables
$padreNodo = $_SESSION['nodeId'] ?? 0;
$genero = $_SESSION["categoria"];



// Ubicación de la carpeta
$carpeta = '../../Historietas';
$subcarpeta = $_SESSION["nombreusuario"];
$subsubcarpeta = $_SESSION["title"];

// Función para generar un nombre de archivo único
function generarNombreUnico($nombreArchivo)
{
    $nombreUnico = uniqid() . '_' . $nombreArchivo;
    return $nombreUnico;
}
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
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

    // Verificar si existe 
    $query = "SELECT id_historieta FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        if ($padreNodo == 0) {
            $response['message'] = "Seleccione un nodo por favor";

        } else {
            // Verificar si existe una id_historia con el padreNodo especificado
            $query = "SELECT id_historieta FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta' AND parent = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("i", $padreNodo);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $response['message'] = "Por favor seleccione los nodos de los finales para agregar";

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
                $stmt = $conexion->prepare($insertQuery);

                if ($stmt) {
                    // Asignar los valores a variables antes de pasarlas como argumentos
                    $valor1 = $nodo;
                    $valor2 = $padreNodo;
                    $valor3 = $nombre_imagen;
                    $valor4 = $subcarpeta;
                    $valor5 = $subsubcarpeta;
                    $valor6 = $genero;
                    $valor7 = $texto;
                    $valor8 = 'N/A';
                    $valor9 = '0';

                    $stmt->bind_param("iisssssss", $valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, $valor9);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        // La fila se insertó correctamente
                    
                        $response['message'] = "Se agregó nodo";

                    } else {
                        // No se pudo insertar la fila
                    
                        $response['message'] = "No se pudo insertar la fila en la base de datos";

                    }

                    $stmt->close();
                } else {
                    // No se pudo preparar la declaración
                
                    $response['message'] = "Error al preparar la declaración SQL";

                }
            }
        }
    } else {
        // No existe una id_historia, crear una nueva
        $insertQuery = "INSERT INTO users (id_historieta, imgUrl, usuario, titlestory, genero, descripcion, emocion, climax)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($insertQuery);

        if ($stmt) {
            // Asignar los valores a variables antes de pasarlas como argumentos
            $valor1 = '1';
            $valor2 = $nombre_imagen;
            $valor3 = $subcarpeta;
            $valor4 = $subsubcarpeta;
            $valor5 = $genero;
            $valor6 = $texto;
            $valor7 = 'N/A';
            $valor8 = '0';

            $stmt->bind_param("isssssss", $valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // La fila se insertó correctamente
            
                $response['message'] = "Se agregó el primer nodo de la historia";

            } else {
                // No se pudo insertar la fila
            
                $response['message'] = "No se pudo insertar la fila en la base de datos";

            }

            $stmt->close();
        } else {
            // No se pudo preparar la declaración
        
            $response['message'] = "Error al preparar la declaración SQL";

        }
    }
} else {
    // Hubo un error al subir el archivo o no se ha enviado una imagen

    $response['message'] = "Ocurrió un error al subir el archivo o no se ha enviado una imagen";
}
$_SESSION["nodeId"]=0;

$conexion->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>