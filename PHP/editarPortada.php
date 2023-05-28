<?php
// creacion-edicion.php
session_start();
// Recupera los datos enviados por AJAX

$_SESSION["title"]= $_GET['titulo'];

$_SESSION["categoria"]= $_GET['genero'];

?>

<?php
        include("crear.php");
?>

