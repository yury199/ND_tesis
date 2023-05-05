<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>crear</title>
<link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
    <meta charset="UTF-8">
    <meta name="title" content="CRear">
    <meta name="description" content="CRear"> 
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
<br>
<br>
<br>
<br>
<br>
<section>

</section>

    <?php
    include("PageElements/footer.php");
    ?>

</body>
</html>