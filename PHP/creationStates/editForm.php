<?php
session_start();
include ("../StateConnections/conexion.php");

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

            // Verificar el valor de climax para mostrar el checkbox
            if ($row['climax'] == 1) {
                // Mostrar checkbox para las emociones
                echo '<form id="formEditar" action="./creationStates/update.php" method="post" enctype="multipart/form-data">';
                echo '    <!-- campos del formulario para editar -->';
                echo '    <label>Descripción:</label>';
                echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '">';
                echo '    <label>Imagen:</label>';
                echo '    <input type="file" id="imagen" name="imagen" accept="image/*">';
                echo '    <div id="preview">';
                echo '        <img id="imagenPreview" src="' . $row['imgUrl'] . '" alt="Imagen actual" style="max-width: 200px;">'; // Establecer el ancho máximo de la imagen
                echo '    </div>';
                echo '    <label>Emociones:</label>';
                echo '    <input type="checkbox" name="emociones[]" value="feliz"> Feliz';
                echo '    <input type="checkbox" name="emociones[]" value="neutral"> Neutral';
                echo '    <input type="checkbox" name="emociones[]" value="triste"> Triste';
                echo '    <input type="checkbox" name="emociones[]" value="sorprendido"> Sorprendido';
                echo '    <input type="checkbox" name="emociones[]" value="enojado"> Enojado';
                echo '    <input type="checkbox" name="emociones[]" value="asqueado"> Asqueado';
                echo '    <input type="checkbox" name="emociones[]" value="sorprendido"> Sorprendido';
                echo '    <button type="submit">Guardar</button>';
                echo '</form>';
            } else {
                // No mostrar checkbox para las emociones
                echo '<form id="formEditar" action="./creationStates/update.php" method="post" enctype="multipart/form-data">';
                echo '    <!-- campos del formulario para editar -->';
                echo '    <label>Descripción:</label>';
                echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '">';
                echo '    <label>Imagen:</label>';
                echo '    <input type="file" id="imagen" name="imagen" accept="image/*">';
                echo '    <div id="preview">';
                echo '        <img id="imagenPreview" src="' . $row['imgUrl'] . '" alt="Imagen actual" style="max-width: 200px;">'; // Establecer el ancho máximo de la imagen
                echo '    </div>';
                echo '    <button type="submit">Guardar</button>';
                echo '</form>';
            }

            echo '<script>';
            echo 'document.getElementById("imagen").addEventListener("change", function(e) {';
            echo '    var preview = document.getElementById("imagenPreview");';
            echo '    var file = e.target.files[0];';
            echo '    var reader = new FileReader();';
            echo '    reader.onload = function(event) {';
            echo '        preview.src = event.target.result;';
            echo '    };';
            echo '    reader.readAsDataURL(file);';
            echo '});';
            echo '</script>';
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
