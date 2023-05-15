<?php
session_start();

$host="localhost";
$user="root";
$pass="";
$db="login";

$conn = mysqli_connect($host, $user, $pass, $db);
echo $_SESSION["nodeId"];


    // Ejecutar la consulta DELETE
    $query = "DELETE FROM users WHERE id = '$_SESSION["nodeId"]'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        // Enviar una respuesta de éxito a la solicitud AJAX
        echo 'success';
    } else {
        // Enviar una respuesta de error a la solicitud AJAX
        echo 'error';
    }

?>
