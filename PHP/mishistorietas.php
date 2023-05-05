<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

include ("StateConnections/conexion.php");

  //ejecutando la consulta
  $query = "SELECT nombre FROM user";
  $result = mysqli_query($conexion, $query);
  
  //Obteniendo el resultado
  $row = mysqli_fetch_assoc($result);



  //ejecutando la consulta
$querys = "SELECT Enlace FROM tabla_imgs";
$results = mysqli_query($conexion, $querys);

//Obteniendo el resultado
$rows = mysqli_fetch_assoc($results);



?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Mis historietas</title>
<link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
    <meta charset="UTF-8">
    <meta name="title" content="Historieta">
    <meta name="description" content="Historieta"> 
	    <!-- Enlaces-->    
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link href="../CSS/mis_historietas.css" rel="stylesheet" type="text/css">
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

	<section class="custom-section">
       <div>
        <div class="contenedor-title">
          <h2 class="item">Mis historietas</h2>
          
          <svg xmlns="http://www.w3.org/2000/svg" class="item" width="90" height="99" fill="none">
            <path fill="#585858" d="M82.831 78.308c-1.03-.05-2.101.058-3.082-.189-1.872-.472-3.211-1.698-3.899-3.516-.737-1.95-1.392-3.93-2.102-5.954l11.501-4.04c.302.86.61 1.71.9 2.566.427 1.26.94 2.503 1.237 3.794.649 2.813-.556 5.327-3.092 6.724-.076.041-.133.113-.2.17l-1.263.444v.001Z"/>
            <path fill="#2E2E2E" d="m79.82 63.81-1.522-4.33c1.675-.54 4.76.564 5.927 2.784L79.82 63.81Z"/>
            <path fill="#585858" d="M73.083 66.182c-.553-1.988.743-4.723 2.809-5.903l1.537 4.377-4.346 1.526Z"/>
            <path fill="#585858" d="M1.018 25.985c.055-.571.022-1.166.18-1.705.489-1.666 1.8-2.377 3.409-2.76l10.495 29.877c-1.691.49-3.189 1.267-4.187 2.762L1.018 25.985Z"/>
            <path fill="#2E2E2E" d="M29.908 56.541c-3.89 1.36-7.803 2.662-11.663 4.102-2.16.805-3.983.703-5.474-1.201l-.442-1.257c-.1-1.629.397-2.972 1.871-3.835.247-.145.521-.253.793-.348 7.797-2.742 15.594-5.481 23.392-8.217.185-.065.376-.111.594-.175l.786 2.237-24.147 8.482.819 2.331 12.655-4.445.818 2.327h-.002Z"/>
            <path fill="#585858" d="m40.459 42.443-22.995 8.078-10.48-29.837 22.994-8.077L40.46 42.443ZM20.162 21.19c-2.206.775-4.416 1.546-6.62 2.327-1.128.4-1.398.934-1.015 2.038a860.083 860.083 0 0 0 2.186 6.222c.371 1.045.968 1.322 2.03.95 4.373-1.53 8.746-3.067 13.117-4.607 1.115-.392 1.376-.94.989-2.05-.717-2.055-1.439-4.108-2.164-6.16-.41-1.16-.905-1.393-2.09-.98-2.146.749-4.289 1.506-6.432 2.26Z"/>
            <path fill="#2E2E2E" d="M32.122 55.723c-.22-.737-.442-1.473-.677-2.264l9.148-3.213.778 2.214-9.272 3.257.021.007h.002ZM15.186 25.548 26.62 21.53l1.588 4.52-11.435 4.017-1.588-4.52Z"/>
            <path fill="#1C1C1C" d="M45.385 72.678c-.91.32-1.906.502-3.01.522-4.338.076-7.492-1.455-9.375-4.553-1.569-2.58-2.018-5.848-2.38-8.473-.194-1.411-.378-2.744-.69-3.634l2.159-.758c.388 1.106.586 2.549.798 4.077.723 5.248 1.542 11.198 9.453 11.058 5.232-.092 7.519-5.066 10.165-10.824 2.824-6.148 6.026-13.117 13.867-13.417 6.741-.258 9.21 5.263 11 10.46l-2.165.744c-1.991-5.788-4.062-9.104-8.751-8.923-6.433.246-9.075 5.996-11.872 12.084-2.27 4.94-4.606 10.022-9.197 11.636h-.002Z"/>
          </svg>
          
        </div>

        <div class="contenerdor-targetones">

        <?php while($rows = $results->fetch_array(MYSQLI_ASSOC)) { ?>          
          <div class="targetas">

          <!-- BUSCAR IMG-->
        
          <div class="mi-div" style="background-image: url('<?php echo $rows["Enlace"] ?>')">
            <p>Contenido del div</p>
          </div>
         


          </div>
        </div>

       </div>
       <?php } ?>
  
    </section>

    <?php
    include("PageElements/footer.php");
    ?>

</body>
</html>