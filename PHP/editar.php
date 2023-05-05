<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Editar Perfil</title>
<link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
    <meta charset="UTF-8">
    <meta name="title" content="Editar">
    <meta name="description" content="Editar"> 
	    <!-- Enlaces-->    
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../CSS/fonts.css">
    <!-- Definir colores--> 
	<script src="../JS/cambioColor.js"></script>
	
  
</head>
<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->  
    <header>

<?php
include("PageElements/nav_On.php");
?>

</header>
<!--Aquí Termina el NAV  -->
<section>
    hola
</section>

    <?php
    include("PageElements/footer.php");
    ?>

  <!--  Andrew debe terminar el diseño -->

</body>
</html>