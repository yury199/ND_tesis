<?php
session_start();
include("../StateConnections/conexion.php");

$padreNodo = $_SESSION['nodeId'] ?? 0;

// Verificar si existe una id_historia
$query = "SELECT id_historieta FROM users WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    if ($padreNodo == 0) {
        echo '<h2>Seleccione un nodo!</h2>';
    } else {
        // Obtener los datos actuales del usuario
        $sql = "SELECT * FROM users WHERE usuario = 'Luisa123' AND titlestory = 'El camaleón' AND id_historieta = '$padreNodo'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['imgAnterior'] = $row['imgUrl'];
            $_SESSION['padreencomun'] = $row['parent'];
            // Obtener las emociones almacenadas en la base de datos
            $emocionesDB = explode(',', $row['emocion']);
            // Definir todas las opciones de emociones disponibles
            $opcionesEmociones = array('feliz', 'neutral', 'triste', 'sorprendido', 'enojado', 'asqueado', 'soprendido');

         


            // Verificar el valor de climax para mostrar el checkbox
            if ($row['climax'] == 1) {
                // Mostrar checkbox para las emociones
                echo '<form id="formEditar" action="./creationStates/update.php" method="post" enctype="multipart/form-data">';
                echo '    <label>Imagen:</label>';
                echo '    <input type="file" id="imagen" name="imagen" accept=".jpg">';
                echo '    <label>Descripción:</label>';
                echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '">';
                echo '    <label>Emociones:</label>';
                // Generar los checkboxes para las emociones
                foreach ($opcionesEmociones as $opcion) {
                    $checked = in_array($opcion, $emocionesDB) ? 'checked' : '';
                    echo '    <input type="checkbox" name="emociones[]" value="' . $opcion . '" ' . $checked . '> ' . ucfirst($opcion);
                }
                echo '    <button type="submit">Guardar</button>';
                echo '</form>';
            } else {
                // No mostrar checkbox para las emociones
                echo '<form id="formEditar" action="./creationStates/update.php" method="post" enctype="multipart/form-data">';
                echo '    <label>Imagen:</label>';
                echo '    <input type="file" id="imagen" name="imagen" accept=".jpg">';
                echo '    <label>Descripción:</label>';
                echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '">';
                echo '    <button type="submit">Guardar</button>';
                echo '</form>';
            }

        } else {
            echo '<h2>selecciona un nodo</h2>';
        }
    }
} else {
    $aviso_nodo = "Añade un nodo primero para poder editar";
    $_SESSION['aviso_nodo'] = $aviso_nodo;
    header("Location:../crear.php");
    exit();
}

$conexion->close();
?>