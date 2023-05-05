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
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
	<link href="../CSS/login.css" rel="stylesheet" type="text/css">
  <link href="../CSS/leer.css" rel="stylesheet" type="text/css">
  <script src="../JS/jquery-3.4.1.min.js"></script>

</head>
<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->  
    <nav class="navbar">
      <ul class="menu">
        <li class="logo"><a href="../index.html"><img src="../Recursos/logow.png" alt="Logo" id="logo"></a></li>
        <li class="item"><a href="#">CREAR</a></li>
        <li class="item"><a href="#">MIS HiSTORIETAS</a></li>
        <li class="item"><a href="#">LEER</a></li>
        <div class="ingreso">
          <li class="item"><img src="../Recursos/Group.png" alt="iconuser" id="us"></li>
          <li class="item button"><a href="#"><?php echo $_SESSION["nombre"]; ?></a></li>
        </div>
      </ul>
    </nav>
    <!--Aquí Termina el NAV  -->
    <article>
      <br><br><br><br>
      <div class="video-container">
        <video id="video" playsinline class="video"></video>
        <canvas id="canvas" class="canvas"></canvas>
      </div>

  
  <div class="contenedor">
    <h2 >Titulo de la historia</h2>


    

<div id="mostrar"></div>

<button onclick="incrementVariable()">Incrementar</button>

<p id="resultado"></p>

</div>
</article>
<script>
  var variable = 0;

  function incrementVariable() {
  variable=variable+1;
  alert(variable);

  

  // AJAX
  $.ajax({
    url: 'suma.php',
    type: 'POST',
    dataType: 'json',
    data: { variable: variable },
    success: function(response) {
      variable = response.variable;
      alert(variable);
      $('#resultado').html(variable);
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}

</script>


<!-- <script>
	function mostrar()
    { 
      var parametros = 
      {
        "niv" : 1,
        "des" : 0,
        "Co" : 1
      };

      $.ajax({
        data: parametros,
        url: 'nomenclatura_leer.php',
        type: 'POST',
        
        beforesend: function()
        {
          $('#mostrar').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar').html(mensaje);
        }
      });
    } 


</script>-->

   <!-- Detectar emociones--> 
<!--    <script src="../JS/webcam.js" type="module"></script>
   -->
  <!-- Definir colores--> 
<script src="../JS/cambioColor.js"></script>

<script>

</script>
</body>


</html>