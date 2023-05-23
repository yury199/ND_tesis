<?php
session_start();
require_once "./conexion.php";

$nuevaContrasena = $_POST['nuevaContrasena'];
$confirmarContrasena = $_POST['confirmarContrasena'];


if ($nuevaContrasena === $confirmarContrasena) {
    $contrasenaEncriptada = sha1($nuevaContrasena);
    $userId = 11;
    $sql = "UPDATE usuarios SET contrasena = '$contrasenaEncriptada' WHERE id = $userId";
    $result = $conexion->query($sql);
    echo '<script>alert("Contraseña Actualizada");</script>';
    header("Location:../home.php");
                        exit();
} else {
    // Las contraseñas no coinciden, muestra un mensaje de error o realiza alguna acción adicional
    echo "Las contraseñas no coinciden. Por favor, verifica nuevamente.";
}


$conexion->close();
?>