<?php
session_start();

include("StateConnections/conexion.php");

// Obtener el valor de la variable emocion enviada desde el archivo JS
$emocion = $_POST['emocion'];

/* $user = $_SESSION["nombreusuario"];  // especifica el nombre de usuario*/
$titulo = "El camaleón"; // especifica el título de la imagen */

      
      // Obtener los valores actuales de N, D y C, o establecerlos en 1 si aún no se han establecido
        $N = isset($_SESSION['N']) ? $_SESSION['N'] : 0;
        $D = isset($_SESSION['D']) ? $_SESSION['D'] : "N/A";
        $C = isset($_SESSION['C']) ? $_SESSION['C'] : 0;

      // Construir la nomenclatura
      $codigo = "N$N-D$D-$C";
      $repeticiones=0;
      
      echo $emocion;
      $query = "SELECT * FROM tabla_imgs WHERE usuario = 'Luisa123' AND titlestory = '$titulo' AND nivel = $N AND num_recorrido = $C AND emocion LIKE '%$D%'";
      $resultado = $conexion->query($query);

      if ($resultado->num_rows > 0) {
        
        // Se encontró una coincidencia para la nomenclatura
        $row = $resultado->fetch_assoc();
        $imagenCodificada = $row['Enlace'];


          // Actualizar los valores de N
          $N++;
          $_SESSION['N'] = $N;

        // Enviar la ruta de la imagen al archivo JS y terminar el ciclo
        $response = array('ruta_imagen' => $imagenCodificada);
        echo json_encode($response);
        exit();   

      }else{
        $N--;
        $C++;
        $_SESSION['C'] = $C;

      $query = "SELECT * FROM tabla_imgs WHERE usuario = 'Luisa123' AND titlestory = '$titulo' AND nivel = $N AND num_recorrido = $C AND emocion LIKE '%$D%'";
      $resultado = $conexion->query($query);

      if ($resultado->num_rows > 0) {
        
        // Se encontró una coincidencia para la nomenclatura
        $row = $resultado->fetch_assoc();
        $imagenCodificada = $row['Enlace'];

        // Enviar la ruta de la imagen al archivo JS y terminar el ciclo
        $response = array('ruta_imagen' => $imagenCodificada);
        echo json_encode($response);
        exit();

      }else{
        $N++;
        


        $query = "SELECT * FROM tabla_imgs WHERE usuario = 'Luisa123' AND titlestory = '$titulo' AND nivel = $N AND num_recorrido = '0' AND emocion LIKE '%$emocion%'";
        $resultado = $conexion->query($query);

        if ($resultado->num_rows > 0) {
          
          // Se encontró una coincidencia para la nomenclatura
          $row = $resultado->fetch_assoc();
          $imagenCodificada = $row['Enlace'];

          $D=$emocion;
          $_SESSION['D'] = $D;
          $C=0;
          $_SESSION['C'] = $C;

          // Enviar la ruta de la imagen al archivo JS y terminar el ciclo
          $response = array('ruta_imagen' => $imagenCodificada);
          echo json_encode($response);
          exit();

        }else{
          $response = array('ruta_imagen' => "../IMG/final.jpg");
          echo json_encode($response);
          exit();

        }
        
    }
    }


// Si no se encontró ninguna imagen para las nomenclaturas proporcionadas, enviar una respuesta vacía
$response = array('ruta_imagen' => '');
echo json_encode($response);

?>