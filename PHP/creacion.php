<?php
session_start();
/* 
if (empty($_SESSION["id"])) {
  header("location: login.php");  
}  */

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mis historietas</title>
    <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="title" content="Historieta">
    <meta name="description" content="Historieta">
    <!-- Enlaces-->
    <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
    <link href="../CSS/body.css" rel="stylesheet" type="text/css">
    <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
    <link href="../CSS/mis_historietas.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <!-- Definir colores-->
    <script src="../JS/cambioColor.js"></script>


</head>

<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->
    <header>

        <?php
        /* include("PageElements/nav_On.php"); */
        ?>

    </header>
    <!--Aquí Termina el NAV  -->

    <section>
        <br><br><br>
        <div class="contenedor">
            <h1 class="titulo">INGRESAR</h1>

            <form method="post" class="form" action="./creationStates/createForm.php" enctype="multipart/form-data">
                <div>
                    <label for="titulo">titulo</label>
                    <input type="text" id="titulo" name="name" required  maxlength="100" size="10">
                </div>
                <div class="entrada">
                    <label for="genero">Género</label>
                    <select name="genero" id="genero">
                        <option value="aventuras">Aventuras</option>
                        <option value="fantasía">Fantasía</option>
                        <option value="ciencia ficción">Ciencia ficción</option>
                        <option value="superhéroes">Superhéroes</option>
                        <option value="humor">Humor</option>
                        <option value="misterio">Misterio</option>
                        <option value="históricas">Históricas</option>
                    </select>
                </div>

                <div>
                    <label for="imagen">elige portada</label>
                    <input type="file" id="imagen" name="imagen" accept=".jpg" required>
                </div>

                <div class="form_boton">
                    <input name="btningresar" class="btn" type="submit" value="Iniciar sesión">
                </div>

            </form>
            <?php
            include "StateConnections/conexion.php";
      
            ?>
        </div>



    </section>

    <?php
    /* include("PageElements/footer.php"); */
    ?>

</body>

</html>