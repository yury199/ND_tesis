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
            echo '<p>Selecciona una viñeta</p>';

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

                    echo '<form id="formEditar" class="formulario" method="POST" action="./creationStates/update.php">';
                   
                    echo '<label class="semititulo">Ilustración:</label>';
                    echo '<div class="ilustra">';
                    echo '<input type="file" name="imagenE" id="file-4" class="inputfile inputfile-1" accept=".jpg" required />';
                    echo '<label for="file-4">';
                    echo '<span id="seleccionadoE" class="iborrainputfile">Seleccionar archivo</span>';
                    echo '<img class="imgSb" src="../Recursos/imgsub.png" alt="img de subida">';
                    echo '</label>';
                    echo '</div>';
                    echo '<label class="semititulo">Descripción:</label>';
                    echo ' <textarea id="texto4" class="descrp" name="texto" cols="auto" rows="3"
                    placeholder="  Menos de 500 caracteres" maxlength="500">' . $row['Descripcion'] . '</textarea>';
                    
                    echo '<label class="semititulo">Emociones:</label>';
                    echo '<div class="check">';
                    // Generar los checkboxes para las emociones
                    $contadorEmociones = 0;
                    foreach ($opcionesEmociones as $opcion) {
                        $checked = in_array($opcion, $emocionesDB) ? 'checked' : '';
                        if ($checked == 'checked') {
                            $contadorEmociones++;
                        }
                        echo '<input type="checkbox" name="emociones[]" value="' . $opcion . '" ' . $checked . '> ' . ucfirst($opcion);
                    }
                    echo '</div>';
                    echo '<div class="botonesconfim">';
                    echo '<a class="btnC"  href="#" onclick="cerrarFormularios()">Cancelar</a>';
                    echo '<a class="btnC"  href="#" onclick="editarDato()">Guardar</a>';
                    echo '</div>';
                 

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
                    echo '<form id="formEditar" class="formulario" method="POST" action="./creationStates/update.php">';

                  
                    echo '<label class="semititulo">Ilustración:</label>';
                    
                    echo '<div class="ilustra">';
                    echo '<input type="file" name="imagenE" id="file-4" class="inputfile inputfile-1" accept=".jpg" required />';
                    echo '<label for="file-4">';
                    echo '<span id="seleccionadoE" class="iborrainputfile">Seleccionar archivo</span>';
                    echo '<img class="imgSb" src="../Recursos/imgsub.png" alt="img de subida">';
                    echo '</label>';
                    echo '</div>';

                    echo '<label class="semititulo">Descripción:</label>';
                    echo ' <textarea id="texto5" class="descrp" name="texto" cols="auto" rows="3" placeholder="  Menos de 500 caracteres" maxlength="500">' . $row['Descripcion'] . '</textarea>';
                   
                   

                    echo '<div class="botonesconfim">';
                    echo '<a class="btnC" href="#" onclick="cerrarFormularios()">Cancelar</a>';
                    echo '<a class="btnC" href="#" onclick="editarDato()">Guardar</a>';
                    echo '</div>';
                    echo '</form>';

                    

                }

            } else {
                echo '<p>Selecciona un nodo</p>';
            }
        }
    } else {
        echo '<p>Selecciona un nodo</p>';
    }
} else {
    echo '<p>Agrega una viñeta simple primero</p>';
}

$conexion->close();
?>

