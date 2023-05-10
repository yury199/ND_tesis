<?php
session_start();

// Obtener el índice de la imagen actual
$indice = $_GET['indice'];

// Guardar el índice en una variable de sesión
$_SESSION['indice_imagen'] = $indice;

// Devolver una respuesta
echo "OK";
?>
