<?php

include "StateConnections/controlador_login.php";
include("StateConnections/conexion.php");
//registar usuario----


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrarse</title>
  <meta charset="UTF-8">
  <meta name="title" content="Registrarse">
  <meta name="description" content="Registrarse en esta página">
  <!-- Enlaces-->
  <link rel="stylesheet" href="../CSS/fonts.css">
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/style.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
</head>

<body onload="cambiarColor()">
  <!-- Aquí comienza el NAV -->
  <header>
    <?php include("PageElements/nav_Off.php"); ?>
  </header>
  <!--Aquí Termina el NAV  -->
  <section class="index_main">

    <div class="contenedor">
      <h1 class="titulo">REGISTRARSE</h1>


      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


        <div class="entrada">
          <label for="">Nombre</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre"
            value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>" required>
        </div>

        <div class="entrada">
          <label for="">Correo</label>
          <input type="text" name="correo" id="correo" placeholder="correo"
            value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>" required>
        </div>

        <div class="entrada">
          <label for="">Usuario</label>
          <input type="text" name="usuario" id="usuario" placeholder="Usuario"
            value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>" required>
        </div>

        <div class="entrada contrasena">
          <label for="">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Contraseña"
            value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
          <div class="mostrar-password" id="mi-elemento" onclick="mostrarPassword()">
            <svg width="50" height="50" viewBox="0 -4 32 32">
              <path
                d="m16 0c-8.836 0-16 11.844-16 11.844s7.164 12.156 16 12.156 16-12.156 16-12.156-7.164-11.844-16-11.844zm0 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8c0 4.418-3.582 8-8 8z" />
              <path d="m20 12.016c0 2.209-1.791 4-4 4s-4-1.791-4-4 1.791-4 4-4 4 1.791 4 4z" />
            </svg>
          </div>
        </div>

        <div class="entrada contrasena">
          <label for="">Confirmar contraseña</label>
          <input type="password" name="password2" id="password_btn" placeholder="Confirmar Contraseña"
            value="<?php echo isset($_POST['password2']) ? $_POST['password2'] : ''; ?>" required>
          <div class="mostrar-password" id="mi-elemento2" onclick="mostrarPassword2()">
            <svg width="50" height="50" viewBox="0 -4 32 32">
              <path
                d="m16 0c-8.836 0-16 11.844-16 11.844s7.164 12.156 16 12.156 16-12.156 16-12.156-7.164-11.844-16-11.844zm0 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8c0 4.418-3.582 8-8 8z" />
              <path d="m20 12.016c0 2.209-1.791 4-4 4s-4-1.791-4-4 1.791-4 4-4 4 1.791 4 4z" />
            </svg>
          </div>
        </div>

        <div class="terminos">
        <input type="checkbox" class="checkbox-custom" id="terminos" name="terminos" required> 
        <label for="terminos">He leído y acepto <span onclick="redirectToPage()"> los términos, condiciones y políticas de uso de “Narrativas Digitales”</span> </label>
        
        </div>
        <?php
        include "StateConnections/conexion.php";
        include "StateConnections/controlador_registre.php";
        ?>

        <div class="form_boton">
          <input name="registrar" class="btn" type="submit" value="Registrarse">
        </div>


        <!--Mensaje de error -->


        <div class="registrarse">
          <p> ¿Ya tienes una cuenta?
            <a href="login.php">Iniciar Sesión</a>
          </p>
        </div>


  </section>
  <script>
    function mostrarPassword() {
      var x = document.getElementById("password");
      // Obtener el elemento por su id
      var elemento = document.getElementById("mi-elemento");
      if (x.type === "password") {

        elemento.style.opacity = 1;
        x.type = "text";
      } else {
        elemento.style.opacity = 0.5;
        x.type = "password";
      }
    }

    function mostrarPassword2() {
      var z = document.getElementById("password_btn");
      // Obtener el elemento por su id
      var elemento2 = document.getElementById("mi-elemento2");
      if (z.type === "password") {

        elemento2.style.opacity = 1;
        z.type = "text";
      } else {
        elemento2.style.opacity = 0.5;
        z.type = "password";
      }
    }

    function redirectToPage() {
      window.location.href = 'terminosycondiciones.php'; 
    }

  </script>

  <?php include("PageElements/footer.php"); ?>
</body>

</html>