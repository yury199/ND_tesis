<?php
session_start();

if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

    include 'variable.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
            updateGlobalVariable($action);
        }
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
<body onload="cambiarColor(); mostrar();">

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

    <br><br><br><br><br><br>
  <div class="contenedor">
    <h2 >Titulo de la historia</h2>


    

    <div id="mostrar" style="background-image: url('../IMG/carga.jpg'); width: 100px; background-size: cover;"><br><br><br><br><br>
  </div>

  <p>Variable global: <?php echo $_SESSION['global_variable']; ?></p>
    <form method="POST">
        <button type="submit" name="action" value="increment">Incrementar</button>
        <button type="submit" name="action" value="decrement">Restar</button>
        <button type="submit" name="action" value="reset">Poner en 0</button>
    </form>

<p id="resultado"></p>

</div>
</article>
<script>
  var variable = 0;

  function mostrar(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
    var url_imagen = this.responseText;
    document.getElementById("mostrar").style.backgroundImage = "url(" + url_imagen + ")";
    console.log("encontrado");   
   }else{    
    console.log("Buscando...");
   }
  };
  xhttp.open("GET", "nomenclatura.php", true);
  xhttp.send();
  }

</script>



   <!-- Detectar emociones--> 
<!--    <script src="../JS/webcam.js" type="module"></script>
   -->
  <!-- Definir colores--> 
<script src="../JS/cambioColor.js"></script>

<script>

</script>
</body>


</html>