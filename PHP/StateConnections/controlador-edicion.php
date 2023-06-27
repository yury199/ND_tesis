<?php
include("conexion.php");


// Obtener el ID del usuario actualmente conectado (aquí se asume que ya tienes esta información)
$userId = $_SESSION["id"]; // Reemplaza con la lógica para obtener el ID del usuario actual

// Obtener los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = $userId";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  $contrasenaSHA1 = $row['contrasena'];
  // Convertir la contraseña a formato legible
  $contrasenaNormal = sha1($contrasenaSHA1);

  // Mostrar el formulario para editar el perfil
  echo '<h1 class="titulo">EDITAR PERFIL</h1>';

  echo '<form method="POST" class="form" action="./StateConnections/update.php">';
  echo '<div class="entrada">';
  echo '<label for="">Usuario</label>';
  echo '<input type="text" name="nombreusuario" value="' . $row['nombreusuario'] . '" disabled><br>';
  echo '</div>';
  echo '<div class="entrada">';
  echo '<label for="">Correo</label>';
  echo '<input type="text" name="correo" value="' . $row['correo'] . '" disabled><br>';
  echo '</div>';

  echo '<div id="Contrasena" class="entrada contrasena" >';
  echo '<label for="">Contraseña</label>';
  echo '<input type="password" name="contrasena" value="' . $row['contrasena'] . '" disabled><br>';
  echo '<div class="mostrar-password" id="mi-elemento" onclick="mostrarPassword()"> ';
  echo '<svg width="50" height="50" viewBox="0 -4 32 32">';
  echo '<path d="m16 0c-8.836 0-16 11.844-16 11.844s7.164 12.156 16 12.156 16-12.156 16-12.156-7.164-11.844-16-11.844zm0 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8c0 4.418-3.582 8-8 8z" />';
  echo '<path d="m20 12.016c0 2.209-1.791 4-4 4s-4-1.791-4-4 1.791-4 4-4 4 1.791 4 4z"/>';
  echo ' </svg>';
  echo '</div>';
  echo '</div>';

  // Formulario para cambiar la contraseña
  echo '<div id="cambiarContrasena" class="entrada contrasena"style="display: none;">';
  echo '<label for="">Nueva contraseña</label>';
  echo '<input type="password" name="nuevaContrasena" value=""><br>';
  echo '<label for="">Confirmar contraseña</label>';
  echo '<input type="password" name="confirmarContrasena" value=""><br>';
  echo '</div>';

  // Enlace para cambiar contraseña
  echo '<a href="#" class="cambCnt" id="cambiar" onclick="mostrarCambiarContrasena()">Cambiar contraseña</a>';



  echo ' <div class="form_boton">';
  echo '<input id="btnG" type="submit" value="Guardar cambios" disabled style="opacity: 0.5;" >';
  echo '</div>';
  echo '</form>';

} else {
  echo 'Usuario no encontrado.';
}

$conexion->close();
?>