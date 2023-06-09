<?php
session_start();
// Include config file
require_once "../StateConnections/conexion.php";

// Variables
$padreNodo = $_SESSION['nodeId'] ?? 0;

// Ubicación de la carpeta
$carpeta = '../../Historietas';
$subcarpeta = $_SESSION["nombreusuario"];
$subsubcarpeta = $_SESSION["title"];

//verificar
$sql_select = "SELECT * FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta'";
$resultado = mysqli_query($conexion, $sql_select);

if (mysqli_num_rows($resultado) > 0) {

    // Función para generar un nombre de archivo único
    function generarNombreUnico($nombreArchivo)
    {
        $nombreUnico = uniqid() . '_' . $nombreArchivo;
        return $nombreUnico;
    }

    // Verificar si se ha enviado una imagen
    if (isset($_FILES['imagen1']) && isset($_FILES['imagen2'])) {
        $archivo1 = $_FILES['imagen1']['tmp_name'];
        $nombre1 = $_FILES['imagen1']['name'];
        $archivo2 = $_FILES['imagen2']['tmp_name'];
        $nombre2 = $_FILES['imagen2']['name'];

        // Crear la ruta de la carpeta y subcarpeta
        $ruta_carpeta = $carpeta . '/';
        $ruta_subcarpeta = $ruta_carpeta . $subcarpeta . '/';
        $ruta_subsubcarpeta = $ruta_subcarpeta . $subsubcarpeta . '/';

        // Verificar si la carpeta y subcarpeta existen, si no, crearlas
        if (!file_exists($ruta_subsubcarpeta)) {
            mkdir($ruta_subsubcarpeta, 0777, true);
        }

        // Generar un nombre único para los archivos
        $nombreUnico1 = generarNombreUnico($nombre1);
        $nombreUnico2 = generarNombreUnico($nombre2);

        // Mover los archivos a la subcarpeta con el nombre único
        move_uploaded_file($archivo1, $ruta_subsubcarpeta . $nombreUnico1);
        move_uploaded_file($archivo2, $ruta_subsubcarpeta . $nombreUnico2);

        // Obtener los textos del formulario
        $descripcion1 = isset($_POST['descripcion1']) ? $_POST['descripcion1'] : '';
        $descripcion2 = isset($_POST['descripcion2']) ? $_POST['descripcion2'] : '';

        // Obtener las emociones seleccionadas
        $emociones1 = isset($_POST['emocion1']) ? $_POST['emocion1'] : [];
        $emociones2 = isset($_POST['emocion2']) ? $_POST['emocion2'] : [];
        // Convertir las emociones en una cadena separada por comas
        $emociones1Set = implode(",", $emociones1);
        $emociones2Set = implode(",", $emociones2);

        // Guardar los nombres de las imágenes y los textos en la base de datos
        $nombre_imagen1 = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico1;
        $nombre_imagen2 = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico2;

        // Verificar si existe una id_historia para el usuario "$subcarpeta"
        $query = "SELECT id_historieta FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta'";
        $resultado = $conexion->query($query);

        if ($resultado->num_rows > 0) {
            // Verificar si slecciono un nodo
            if ($padreNodo == 0) {


                $response= 'Por favor seleccione un viñeta que esté en una rama final.';

            } else {
                // Verificar si ya existen nodos con la misma información
                $query = "SELECT * FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta' AND parent = '$padreNodo'";
                $resultado = $conexion->query($query);

                if ($resultado->num_rows > 0) {


                    $response= 'Las viñetas se agregan al final de cada rama.';

                } else {
                    // Consulta SQL
                    $sql = "SELECT MAX(id_historieta) AS max_id FROM users WHERE usuario = '$subcarpeta' AND titlestory = '$subsubcarpeta'";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        // Obtener el valor más alto
                        $row = $result->fetch_assoc();
                        $maxId = $row["max_id"];

                        // Incrementar el valor en 1
                        $nodo = $maxId + 1;

                        // Rama 1
                        $stmt1 = $conexion->prepare("INSERT INTO users (id_historieta, usuario, titlestory, parent, Descripcion, imgUrl, emocion,climax) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
                        $stmt1->bind_param("isssssss", $id_nodo, $usuario, $titlestory, $parent, $texto1, $imagen1, $emociones1Set, $climax);
                        $id_nodo = $nodo;
                        $usuario = $subcarpeta;
                        $titlestory = $subsubcarpeta;
                        $parent = $padreNodo;
                        $texto1 = $descripcion1;
                        $imagen1 = $nombre_imagen1;
                        $climax = '1';
                        $stmt1->execute();

                        // Rama 2
                        $stmt2 = $conexion->prepare("INSERT INTO users (id_historieta, usuario, titlestory, parent, Descripcion, imgUrl, emocion,climax) VALUES (?, ?, ?, ?, ?, ?,?, ?)");
                        $stmt2->bind_param("isssssss", $id_nodo2, $usuario, $titlestory, $parent, $texto2, $imagen2, $emociones2Set, $climax);
                        $id_nodo2 = $nodo + 1;
                        $texto2 = $descripcion2;
                        $imagen2 = $nombre_imagen2;
                        $stmt2->execute();

                        $response= 'se ha dividido la historia';
                        $_SESSION["nodeId"] = 0;

                        $stmt1->close();
                        $stmt2->close();
             


                        

                    }
                }
            }
        } else {



            $response= "Ocurrió un error al subir el archivo o no se ha enviado una imagen";

        }

    } else {

        $response= "No se subieron las imagenes";
    }
} else {
    $response= "Debes agregar un viñeta simple primero";

}



$_SESSION["nodeId"] = 0;
$conexion->close();
// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

?>