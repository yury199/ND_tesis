<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
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
    <link href="../CSS/style.css" rel="stylesheet" type="text/css">
    <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
    <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <!-- Definir colores-->
    <script src="../JS/cambioColor.js"></script>


</head>

<body onload="cambiarColor()">
    <!-- Aquí comienza el NAV -->
    <header>

        <?php
        include("PageElements/nav_On.php");
        ?>

    </header>
    <!--Aquí Termina el NAV  -->

    <section class="index_main">
        <div class="contenedor">
            <h1 class="titulo">¡COMIENZA YA!</h1>

            <form method="post" class="form" action="./creationStates/createForm.php" enctype="multipart/form-data">

                <div class="formPrincipal">
                    <div class="bloque_form">
                        <div class="entrada">
                            <label for="titulo">Título de la historieta:</label>
                            <input type="text" id="titulo" name="titulo" maxlength="50"
                                placeholder="Menos de 50 caracteres" required>
                        </div>

                        <div class="entrada">
                            <label for="texto">Sinopsis::</label>
                            <textarea id="myTextarea" name="texto" cols="auto" rows="6"
                                placeholder="Menos de 500 caracteres" maxlength="500" required></textarea>
                            <p> <span id="charCount">500</span> caracteres restantes</p>
                        </div>

                    </div>


                    <div class="bloque_form">
                        <div class="entrada">
                            <label for="genero">Género</label>
                            <select name="genero" id="genero" placeholder="Selecciona un genero" required>
                                <option value="aventuras">Aventuras</option>
                                <option value="fantasía">Fantasía</option>
                                <option value="ciencia ficción">Ciencia ficción</option>
                                <option value="superhéroes">Superhéroes</option>
                                <option value="humor">Humor</option>
                                <option value="misterio">Misterio</option>
                                <option value="históricas">Históricas</option>
                            </select>
                        </div>
                        <div class="inputportada">
                            <label for="imagen">Portada:</label>
                            <div class="cuadrosubida">
                                <div class="cuadro">
                                    <label for="input-imagen" class="imagen-label">
                                        <img id="imagen" style="display: none;">
                                        <div class="imagen-carga" id="c">
                                            <img id="imagenC" src="../Recursos/imgsubida.png" alt="Imagen de carga">
                                            <p id="texto">Seleccione una <br> imagen para subir</p>
                                        </div>
                                    </label>
                                    <input type="file" name="imagen" id="input-imagen" accept=".jpg"
                                        onchange="mostrarImagen(event)" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class='alert-danger' style="display: none;">
                    <img src='../Recursos/x.png' alt='x'>
                    <p class='textoblanco'>Ese titulo ya existe</p>
                </div>
                <div class="form_boton">
                    <input name="btningresar" class="btn" type="submit" value="Crear">
                </div>

            </form>
            <?php
            include "StateConnections/conexion.php";
            ?>

        </div>



    </section>
    <script>
        function mostrarImagen(event) {
            var input = event.target;
            var file = input.files[0];
            var maxSizeInBytes = 5 * 900 * 900;
            var imagen = document.getElementById('imagen');
            var imagenC = document.getElementById('imagenC');
            var texto = document.getElementById('texto');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagen.src = e.target.result;
                    imagen.style.display = 'block';

                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagen.src = "";
                imagen.style.display = 'none';
                imagenC.style.display = 'block';
                texto.style.display = 'block';
            }

            if (file && file.size > maxSizeInBytes) {
                input.value = '';
                alert('El archivo seleccionado supera el límite de tamaño permitido (5MB). Por favor, elija otro archivo.');
            }
        }

        // Obtener el elemento del textarea y el contador de caracteres
        const textarea = document.getElementById('myTextarea');
        const charCount = document.getElementById('charCount');

        // Agregar un event listener para detectar cambios en el textarea
        textarea.addEventListener('input', function () {
            // Obtener la cantidad de caracteres escritos
            const writtenChars = this.value.length;

            // Calcular la cantidad de caracteres restantes
            const remainingChars = 500 - writtenChars;

            // Actualizar el contador de caracteres restantes
            charCount.textContent = remainingChars;

            // Limitar la longitud del texto en el textarea
            if (writtenChars > 500) {
                this.value = this.value.slice(0, 500);
            }
        });







    </script>

    <?php
    include("PageElements/footer.php");
    ?>

</body>

</html>