<?php
session_start();
// Reiniciar las variables de sesión
$_SESSION['P'] = 0;
$_SESSION['E'] = "N/A";
$_SESSION['C'] = 0;
echo ("es el codigo del buscador");

if(isset($_POST['titulo']) && isset($_POST['autor'])) {
    // Obtener los valores de los campos
    $_SESSION['titulohistoria'] = $_POST['titulo'];
    $_SESSION['autor']= $_POST['autor'];

    echo "Título: " . $titulo . "<br>";
    echo "Autor: " . $autor;
}





?>