<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Home</title>
<link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
    <meta charset="UTF-8">
    <meta name="title" content="Home">
    <meta name="description" content="Home"> 
	    <!-- Enlaces-->   
      <link rel="stylesheet" href="../CSS/fonts.css"> 
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
	<link href="../CSS/login.css" rel="stylesheet" type="text/css">
  <link href="../CSS/leer.css" rel="stylesheet" type="text/css">

</head>
<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->  
    <header>
      <nav class="navbar">
        <ul class="menu">
          <li class="logo"><a href="../index.html"><img src="../Recursos/logow.png" alt="Logo" id="logo"></a></li>
          <li class="item"><a href="#">CREAR</a></li>
          <li class="item"><a href="mishistorietas.php">MIS HiSTORIETAS</a></li>
          <li class="item"><a href="leer.php">LEER</a></li>
          <div class="ingreso">
            <li class="item"><img src="../Recursos/Group.png" alt="iconuser" id="us"></li>
            <li class="item button secondary"><a href="#">  <?php echo $_SESSION["nombre"]." ". $_SESSION["apellido"]; ?></a></li>
          </div>
        </ul>
      </nav>
    </header>
    <!--Aquí Termina el NAV  -->
    <article>
      <br><br><br><br>
      <div class="video-container">
        <video id="video" playsinline class="video"></video>
        <canvas id="canvas" class="canvas"></canvas>
      </div>

  
  <div class="contenedor">
    <h2 >Titulo de la historia</h2>


 <!--CARGAR IMG-->
      <?php
      include("StateConnections/conexion.php");

      //Definiciones 
      $N = 0;
      $D = 0;
      $C = 0 ;//+ $variable;

      //

      $user =$_SESSION["nombreusuario"];  // especifica el nombre de usuario
      $titulo = "El camaleón"; // especifica el título de la imagen
      $codigo = "N".$N."-D".$D."-".$C;// especifica el código de la imagen

      $query = "SELECT * FROM tabla_imgs WHERE usuario = '$user' AND titlestory = '$titulo' AND nomenclatura = '$codigo'";
      $resultado = $conexion->query($query);

      if ($resultado->num_rows > 0) {
          $row = $resultado->fetch_assoc();
          $imagenCodificada = $row['Enlace'];
      ?>
        <div style="background-image: url('<?php echo $imagenCodificada; ?>'); background-size: cover; background-position: center;">
            <!-- Contenido del div aquí -->
            <h1>Bienvenido <?php echo  $_SESSION["nombreusuario"]; ?></h1>
          </div>
      <?php
      } else {
        
          echo "No se encontraron imágenes para el usuario y título especificados.";
      }
      $conexion->close();
      ?>

<!-- <img class="img" src="../Recursos/bg1.jpg">-->

<form>



<button id="enviar">Enviar variable</button>

</div>
</article>
   <!-- Detectar emociones--> 
   <script src="../JS/webcam.js" type="module"></script>
  
  <!-- Definir colores--> 
<script src="../JS/cambioColor.js"></script>

<script>

</script>
</body>


</html>