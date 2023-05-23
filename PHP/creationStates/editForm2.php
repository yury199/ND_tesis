<?php
session_start();
include("../StateConnections/conexion.php");

$padreNodo = $_SESSION['nodeId'] ?? 0;
$usuario = $_SESSION["nombreusuario"];
$titulo = $_SESSION["title"];

// Verificar
$sql_select = "SELECT * FROM users WHERE usuario = '$usuario' AND titlestory = '$titulo'";
$resultado_select = mysqli_query($conexion, $sql_select);

if (mysqli_num_rows($resultado_select) > 0) {

    // Verificar si existe una id_historia
    $query = "SELECT id_historieta FROM users WHERE usuario = '$usuario' AND titlestory = '$titulo'";
    $resultado_query = $conexion->query($query);

    if ($resultado_query->num_rows > 0) {

        if ($padreNodo == 0) {
            echo '<h2>Selecciona un nodo</h2>';

        } else {
            // Obtener los datos actuales del usuario
            $sql = "SELECT * FROM users WHERE usuario = '$usuario' AND titlestory = '$titulo' AND id_historieta = '$padreNodo'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $_SESSION['imgAnterior'] = $row['imgUrl'];
                $_SESSION['padreencomun'] = $row['parent'];



                // Obtener las emociones almacenadas en la base de datos
                $emocionesDB = explode(',', $row['emocion']);
                // Definir todas las opciones de emociones disponibles
                $opcionesEmociones = array('feliz', 'neutral', 'triste', 'sorprendido', 'enojado', 'asqueado', 'asustado');

                // Verificar el valor de climax para mostrar el checkbox
                if ($row['climax'] == 1) {
                    // Mostrar checkbox para las emociones
                    echo '<form id="formEditar" method="POST" action="./creationStates/update2.php" class="formulario">';
                    echo '<div>';
                    echo '    <label>Ilustración:</label>';
                    echo '    <input type="file" name="imagenE" id="file-4" class="inputfile inputfile-1" accept=".jpg" required />';
                    echo '    <label for="file-4">';
                    echo '        <span id="seleccionadoE" class="iborrainputfile">Seleccionar archivo</span>';
                    echo '        <svg class="iborrainputfile" viewBox="0 0 28 21">';
                    echo '            <path fill="#7E9FDC" d="M27.91 14.328c-.076.4-.12.81-.232 1.2-.804 2.808-2.634 4.597-5.48 5.21-3.504.755-6.898-1.234-8.139-4.65-1.359-3.742.9-8.113 4.744-9.144 2.642-.709 4.987-.12 6.97 1.761 1.207 1.146 1.881 2.586 2.084 4.241.012.098.035.194.052.291v1.091Zm-7.588-1.78v.34c0 1.036.002 2.071-.002 3.106 0 .245.054.455.294.565.354.161.69-.094.692-.535.006-1.045.002-2.089.002-3.133v-.339c.385.352.708.67 1.058.956.13.106.33.202.48.18.147-.021.32-.173.395-.313.11-.205-.01-.404-.172-.557-.61-.57-1.22-1.142-1.834-1.707-.273-.25-.515-.25-.792.004-.61.558-1.215 1.12-1.816 1.688a.731.731 0 0 0-.199.314c-.06.212.017.396.206.517.227.146.436.088.62-.082.34-.313.674-.633 1.068-1.004Z" />';
                    echo '            <path fill="#7E9FDC" d="M2.158 10.912V2.171h17.457v3.506c-.731.244-1.458.441-2.148.729-1.14.476-2.087 1.233-2.89 2.174-.258.302-.538.59-.836.852-.64.565-1.3 1.109-1.954 1.658-.383.322-.602.324-.989.017-1.15-.918-2.302-1.835-3.451-2.754-.82-.654-1.563-.636-2.347.06L2.467 10.65c-.087.076-.176.15-.31.262Zm6.596-4.546a2.244 2.244 0 0 0 4.486-.01 2.246 2.246 0 0 0-2.235-2.238 2.241 2.241 0 0 0-2.25 2.248Z" />';
                    echo '            <path fill="#7E9FDC" d="M13.308 16.973H0V0h21.727v5.715l-1.1-.064V1.838c0-.527-.15-.68-.684-.68H1.809c-.507 0-.652.147-.652.648v13.307c0 .537.16.69.707.69 3.59 0 7.181.003 10.771-.005.236 0 .333.072.387.293.071.288.18.565.286.882Z" />';
                    echo '            <path fill="#7E9FDC" d="M2.15 14.798c0-.828-.003-1.645.005-2.46 0-.067.067-.145.123-.195 1.15-1.02 2.3-2.038 3.453-3.053.331-.291.574-.298.922-.021 1.16.923 2.315 1.848 3.471 2.775.815.652 1.531.647 2.33-.024.172-.145.347-.288.552-.423-.286 1.116-.405 2.24-.258 3.401H2.149ZM12.253 6.357a1.272 1.272 0 0 1-1.274 1.258A1.264 1.264 0 0 1 9.74 6.351a1.25 1.25 0 0 1 1.272-1.25c.69.007 1.243.566 1.24 1.256Z" />';
                    echo '        </svg>';
                    echo '    </label>';
                    echo '</div>';

                    echo '    <label>Descripción:</label>';
                    echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '"/>';
                    echo '    <label>Emociones:</label>';
                    // Generar los checkboxes para las emociones
                    // Generar los checkboxes para las emociones
                    $contadorEmociones = 0;
                    foreach ($opcionesEmociones as $opcion) {
                        $checked = in_array($opcion, $emocionesDB) ? 'checked' : '';
                        if ($checked == 'checked') {
                            $contadorEmociones++;
                        }
                        echo '<input type="checkbox" name="emociones[]" value="' . $opcion . '" ' . $checked . '> ' . ucfirst($opcion);
                    }

                    echo '<button type="button" onclick="editarDato()">Guardar</button>';
                    echo '</form>';

                    // Validar número de emociones seleccionadas
                    echo '<script>
                    var checkboxes = document.querySelectorAll(\'input[name="emociones[]"]\');
                    var checkedEmotions = ' . $contadorEmociones . ';
                    var maxEmotions = 6;

                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener("change", function() {
                            if (this.checked) {
                                if (checkedEmotions >= maxEmotions) {
                                    this.checked = false;
                                } else {
                                    checkedEmotions++;
                                }
                            } else {
                                checkedEmotions--;
                            }
                        });
                    });
                </script>';
                } else {
                    // No mostrar checkbox para las emociones
                    echo '<form id="formEditar"  class="formulario">';
                    echo '<div>';
                    echo '    <label>Ilustración:</label>';
                    echo '    <input type="file" name="imagenE" id="file-4" class="inputfile inputfile-1" accept=".jpg" required />';
                    echo '    <label for="file-4">';
                    echo '        <span id="seleccionadoE" class="iborrainputfile">Seleccionar archivo</span>';
                    echo '        <svg class="iborrainputfile" viewBox="0 0 28 21">';
                    echo '            <path fill="#7E9FDC" d="M27.91 14.328c-.076.4-.12.81-.232 1.2-.804 2.808-2.634 4.597-5.48 5.21-3.504.755-6.898-1.234-8.139-4.65-1.359-3.742.9-8.113 4.744-9.144 2.642-.709 4.987-.12 6.97 1.761 1.207 1.146 1.881 2.586 2.084 4.241.012.098.035.194.052.291v1.091Zm-7.588-1.78v.34c0 1.036.002 2.071-.002 3.106 0 .245.054.455.294.565.354.161.69-.094.692-.535.006-1.045.002-2.089.002-3.133v-.339c.385.352.708.67 1.058.956.13.106.33.202.48.18.147-.021.32-.173.395-.313.11-.205-.01-.404-.172-.557-.61-.57-1.22-1.142-1.834-1.707-.273-.25-.515-.25-.792.004-.61.558-1.215 1.12-1.816 1.688a.731.731 0 0 0-.199.314c-.06.212.017.396.206.517.227.146.436.088.62-.082.34-.313.674-.633 1.068-1.004Z" />';
                    echo '            <path fill="#7E9FDC" d="M2.158 10.912V2.171h17.457v3.506c-.731.244-1.458.441-2.148.729-1.14.476-2.087 1.233-2.89 2.174-.258.302-.538.59-.836.852-.64.565-1.3 1.109-1.954 1.658-.383.322-.602.324-.989.017-1.15-.918-2.302-1.835-3.451-2.754-.82-.654-1.563-.636-2.347.06L2.467 10.65c-.087.076-.176.15-.31.262Zm6.596-4.546a2.244 2.244 0 0 0 4.486-.01 2.246 2.246 0 0 0-2.235-2.238 2.241 2.241 0 0 0-2.25 2.248Z" />';
                    echo '            <path fill="#7E9FDC" d="M13.308 16.973H0V0h21.727v5.715l-1.1-.064V1.838c0-.527-.15-.68-.684-.68H1.809c-.507 0-.652.147-.652.648v13.307c0 .537.16.69.707.69 3.59 0 7.181.003 10.771-.005.236 0 .333.072.387.293.071.288.18.565.286.882Z" />';
                    echo '            <path fill="#7E9FDC" d="M2.15 14.798c0-.828-.003-1.645.005-2.46 0-.067.067-.145.123-.195 1.15-1.02 2.3-2.038 3.453-3.053.331-.291.574-.298.922-.021 1.16.923 2.315 1.848 3.471 2.775.815.652 1.531.647 2.33-.024.172-.145.347-.288.552-.423-.286 1.116-.405 2.24-.258 3.401H2.149ZM12.253 6.357a1.272 1.272 0 0 1-1.274 1.258A1.264 1.264 0 0 1 9.74 6.351a1.25 1.25 0 0 1 1.272-1.25c.69.007 1.243.566 1.24 1.256Z" />';
                    echo '        </svg>';
                    echo '    </label>';
                    echo '</div>';

                    echo '    <label>Descripción:</label>';
                    echo '    <input type="text" id="texto" name="texto" value="' . $row['Descripcion'] . '"/>';
                    echo '    <button type="button" onclick="editarDato()" >Guardar</button>';
                    echo '</form>';
                }
            } else {
                echo '<h2>Selecciona un nodo</h2>';
            }
        }
    } else {
        echo '<h2>Selecciona un nodo</h2>';
    }
} else {
    echo '<h2>Agrega una viñeta simple primero</h2>';
}

$conexion->close();
?>