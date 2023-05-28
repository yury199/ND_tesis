
  
  <?php
session_start();

if (empty($_SESSION["id"])) {
    header("location: login.php");
    exit;
}

include "../StateConnections/conexion.php";


// Ubicación de la carpeta
$carpeta = '../../Historietas';
$subcarpeta = $_SESSION["nombreusuario"];
$subsubcarpeta = $_POST['titulo'];

// Validar que el titulo no exista en la base de datos
$sqltitle = "SELECT usuario FROM historietas WHERE titlestory='$subsubcarpeta'";
$resultadotitle = $conexion->query($sqltitle);
if ($resultadotitle->num_rows > 0) {
    echo '<script>alert("Ya existe ese título, inspírate en otro.");</script>';
    echo '<script>window.location.href="../creacion.php";</script>';
    exit();
} else {
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

        // Crear la ruta de la carpeta y subcarpetas
        $ruta_carpeta = $carpeta . '/';
        $ruta_subcarpeta = $ruta_carpeta . $subcarpeta . '/';
        $ruta_subsubcarpeta = $ruta_subcarpeta . $subsubcarpeta . '/';

        // Verificar si la carpeta y subcarpetas existen, si no, crearlas
        if (!file_exists($ruta_subsubcarpeta)) {
            mkdir($ruta_subsubcarpeta, 0777, true);
        }

        // Generar un nombre único para el archivo
        $nombreUnico = generarNombreUnico($nombre);

        // Mover el archivo a la subcarpeta con el nombre único
        move_uploaded_file($archivo, $ruta_subsubcarpeta . $nombreUnico);

        // Ruta completa de destino del archivo
        $nombre_imagen = '../Historietas/' . $subcarpeta . '/' . $subsubcarpeta . '/' . $nombreUnico;


        //----datos
        $usuario = $_SESSION["nombreusuario"];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['texto'];
        $genero = $_POST['genero'];


        $_SESSION['title'] = $titulo;
        $_SESSION["categoria"] = $genero;
        // Insertar nueva fila en la base de datos
        $insertQuery = "INSERT INTO historietas (imgUrl, usuario, titlestory, genero,Descripcion)
                VALUES (?, ?, ?, ?,?)";
        $stmt = $conexion->prepare($insertQuery);

        if ($stmt) {
            // Asignar los valores a variables antes de pasarlas como argumentos
            $valor1 = $nombre_imagen;
            $valor2 = $usuario;
            $valor3 = $titulo;
            $valor4 = $genero;
            $valor5 = $descripcion;

            $stmt->bind_param("sssss", $valor1, $valor2, $valor3, $valor4, $valor5);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("Location:../crear.php");
                exit();

            } else {
                header("Location:../creacion.php");
                exit();

            }
        }

    }

}

$conexion->close();

?>
