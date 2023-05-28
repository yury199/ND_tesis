<?php
session_start();

if(isset($_POST['titulo']) && isset($_POST['autor'])) {
    // Obtener los valores de los campos
    $_SESSION['titulohistoria'] = $_POST['titulo'];
    $_SESSION['autor']= $_POST['autor'];

    echo "Título: " . $titulo . "<br>";
    echo "Autor: " . $autor;
}

?>