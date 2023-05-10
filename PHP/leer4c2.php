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
    <title>Editar Perfil</title>
    <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">  
        <meta charset="UTF-8">
        <meta name="title" content="Editar">
        <meta name="description" content="Editar"> 
          <!-- Enlaces-->    
      <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
      <link href="../CSS/body.css" rel="stylesheet" type="text/css">
      <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
      <link href="../CSS/leer.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../CSS/fonts.css">
        <!-- Definir colores--> 
      <script src="../JS/cambioColor.js"></script>
      
      
      
    </head>
    <body onload="mostrar();">
        <!-- Aquí comienza el NAV -->  
        <header>
    
      <?php
      include("PageElements/nav_On.php");
      ?>

      </header>
      <!--Aquí Termina el NAV  -->
      <article>

<br><br><br><br><br><br>

<div class="w"><video id="video" width="320" height="360" autoplay muted></video></div>
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
 
}else{    
/* console.log("Buscando..."); */
}
};
xhttp.open("GET", "nomenclatura.php", true);
xhttp.send();
}
console.log(variable);
</script>


<script src="../JS/cambioColor.js"></script>
<script defer src="../JS/face-api.min.js"></script>
<script defer src="../JS/script.js"></script>
<script src="../JS/jquery-3.4.1.min.js"></script>

</body>


</html>