<?php
session_start();

include("../StateConnections/conexion.php");

// Obtener el valor de la variable emocion enviada desde el archivo JS
 $emocion = $_POST['emocion']; 
 $titulo =  $_SESSION['titulohistoria'];
 $autor = $_SESSION['autor'];


      
      // Obtener los valores , o establecerlos,si aún no se han establecido
        $P = isset($_SESSION['P']) ? $_SESSION['P'] : 0;
        $E = isset($_SESSION['E']) ? $_SESSION['E'] : "N/A";
        $C = isset($_SESSION['C']) ? $_SESSION['C'] : 0;

        $codigo='padre:'.$P.'Emocion:'.$E.'Climax:'.$C;
      
     //Buscar la img
      $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P'";
      $resultado = $conexion->query($query);

      // Se encontró una coincidencia para la nomenclatura
      if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $imagenCodificada = $row['imgUrl'];
        $texto_parrafo = $row['Descripcion'];
       

        $C = $row['climax'];
        

        if ($C==0) {
          $P = $row['id_historieta'];
          $_SESSION['P'] = $P;

          $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P' AND climax='1'";
          $resultado = $conexion->query($query);
      
          if ($resultado->num_rows > 0) {
            $activar_aviso = true;
          }else{
            $activar_aviso = false;
          }
          
          

          $response = array('ruta_imagen' => $imagenCodificada, "texto_parrafo" =>  $texto_parrafo, "activar_aviso" => $activar_aviso);
          echo json_encode($response);
          exit();

        }else{
  

          $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P' AND emocion LIKE '%$emocion%'";
          $resultado = $conexion->query($query);

  
          if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $imagenCodificada = $row['imgUrl'];
            $texto_parrafo = $row['Descripcion'];
  
            $P = $row['id_historieta'];
            $_SESSION['P'] = $P;
  
            $E=$emocion;
            $_SESSION['E'] = $E;
  
  
            $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P' AND climax='1'";
            $resultado = $conexion->query($query);
        
            if ($resultado->num_rows > 0) {
              $activar_aviso = true;
            }else{
              $activar_aviso = false;
            }
            
            
  
            $response = array('ruta_imagen' => $imagenCodificada, "texto_parrafo" =>  $texto_parrafo, "activar_aviso" => $activar_aviso);
            echo json_encode($response);
            exit();

          }else{
            $response = array('ruta_imagen' => '../Historietas/final.jpg', "texto_parrafo" =>  '',"activar_aviso" => '');
            echo json_encode($response);
            exit();
          }

        }
      

      }else{
          //Buscar la img
      $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND  parent IS NULL AND emocion LIKE '%$E%'";
      $resultado = $conexion->query($query);

      // Se encontró una coincidencia para la nomenclatura
      if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $imagenCodificada = $row['imgUrl'];
        $texto_parrafo = $row['Descripcion'];
       

        $C = $row['climax'];
        $P = $row['id_historieta'];
        $_SESSION['P'] = $P;

        if ($C==0) {

          $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P' AND climax='1'";
          $resultado = $conexion->query($query);
      
          if ($resultado->num_rows > 0) {
            $activar_aviso = true;
          }else{
            $activar_aviso = false;
          }
          

          $response = array('ruta_imagen' => $imagenCodificada, "texto_parrafo" =>  $texto_parrafo, "activar_aviso" => $activar_aviso);
          echo json_encode($response);
          exit();

        }else{

          
          $query = "SELECT * FROM users WHERE usuario = '$autor' AND titlestory = '$titulo' AND parent = '$P' AND climax='1'";
          $resultado = $conexion->query($query);
      
          if ($resultado->num_rows > 0) {
            $activar_aviso = true;
          }else{
            $activar_aviso = false;
          }
          
          

          $response = array('ruta_imagen' => $imagenCodificada, "texto_parrafo" =>  $texto_parrafo, "activar_aviso" => $activar_aviso);
          echo json_encode($response);
          exit();
        }

      }else{
        $response = array('ruta_imagen' => '../Historietas/final.jpg', "texto_parrafo" =>  '',"activar_aviso" => '');
        echo json_encode($response);
        exit();
      }

    }


?>