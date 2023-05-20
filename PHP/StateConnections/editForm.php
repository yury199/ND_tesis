<?php
include ("./StateConnections/conexion.php");


// Obtener el ID del usuario actualmente conectado (aquí se asume que ya tienes esta información)
$userId = 11; // Reemplaza con la lógica para obtener el ID del usuario actual

// Obtener los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = $userId";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Mostrar el formulario para editar el perfil
    echo '<h2>Editar Perfil</h2>';
    echo '<form method="POST" action="./creationStates/update.php">';
    echo 'Nombre de usuario: <input type="text" name="nombreusuario" value="' . $row['nombreusuario'] . '"><br>';
    echo 'Nombre: <input type="text" name="nombre" value="' . $row['nombre'] . '"><br>';
    // La contraseña se muestra vacía en el campo de entrada para evitar mostrar la contraseña actual
    echo 'Contraseña: <input type="password" name="contrasena" value=""><br>';
    echo 'Correo: <input type="text" name="correo" value="' . $row['correo'] . '"><br>';
    echo '<input type="submit" value="Guardar">';
    echo '</form>';
} else {
    echo 'Usuario no encontrado.';
}

$conexion->close();
?>