<?php
if (isset($_SESSION["id"])) {
  header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Inicio de sesión</title>
  <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="title" content="Ingresar">
  <meta name="description" content="Inicio de sesion">
  <!-- Enlaces-->
  <link rel="stylesheet" href="../CSS/fonts.css">
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
  <!-- Definir colores-->
  <script src="../JS/cambioColor.js"></script>


</head>

<body onload="cambiarColor()">

  <header>
    <?php include("PageElements/nav_Off.php"); ?>
  </header>


  <section class="formulario">

    <div class="contenedor">
      <h1 class="titulo">INGRESAR</h1>

      <div class="containere">

        <form method="post" class="form" action="">
          <?php
          include "StateConnections/conexion.php";
          include "StateConnections/controlador_login.php";
          ?>
          <div class="entrada">
            <label for="">Usuario</label>
            <input id="usuario" type="text" name="usuario" class="input" required>
          </div>
          <div class="entrada contrasena">
            <label for="">Contraseña</label>
            <input id="password" type="password" name="password" class="input" required>


            <div class="mostrar-password" id="mi-elemento" onclick="mostrarPassword()">
              <svg width="50" height="50" viewBox="0 -4 32 32">
                <path
                  d="m16 0c-8.836 0-16 11.844-16 11.844s7.164 12.156 16 12.156 16-12.156 16-12.156-7.164-11.844-16-11.844zm0 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8c0 4.418-3.582 8-8 8z" />
                <path d="m20 12.016c0 2.209-1.791 4-4 4s-4-1.791-4-4 1.791-4 4-4 4 1.791 4 4z" />
              </svg>
            </div>
          </div>
          <div class="form_boton">
            <input name="btningresar" class="btn" type="submit" value="Iniciar sesión">

          </div>
        </form>

        <div class="registrarse">
          <p> ¿Aun no tienes cuenta?
            <a href="registrate.php">Registrate</a>
          </p>
        </div>


      </div>
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
  </script>

  <?php include("PageElements/footer.php"); ?>
</body>

</html>