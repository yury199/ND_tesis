<?php
session_start();
require_once "../StateConnections/conexion.php";

// Obtener el ID del usuario actualmente conectado (aquí se asume que ya tienes esta información)
$userId = 11; // Reemplaza con la lógica para obtener el ID del usuario actual

// Obtener los datos enviados por el formulario
$nombreusuario = $_POST['nombreusuario'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
// Codificar la contraseña utilizando SHA1
$contrasenaCodificada = sha1($contrasena);
$contrasena =sha1($_POST['contrasena']);
$correo = $_POST['correo'];

// Actualizar los datos del usuario en la base de datos
$sql = "UPDATE usuarios SET nombreusuario = '$nombreusuario', nombre = '$nombre', contrasena = '$contrasena', correo = '$correo' WHERE id = $userId";
if ($conexion->query($sql) === TRUE) {
    echo "Perfil actualizado correctamente.";
} else {
    echo "Error al actualizar el perfil: " . $conexion->error;
}

$conexion->close();
?>
