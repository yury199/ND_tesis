<?php
session_start();
include("./StateConnections/conexion.php");
if (empty($_SESSION["id"])) {
    header("location: login.php");  
  } 
  

$sql = "SELECT * FROM historietas";
$all_historias = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear</title>
    <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="title" content="crear">
    <meta name="description" content="crea tus historietas">
    <!-- Enlaces-->
    <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
    <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
    <link href="../CSS/jquery.orgchart.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/galeria.css" rel="stylesheet" type="text/css" />
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


        <div class="contenedor con_lectura">
            <div class="tituloprincipal">
                <h1>Lee diferentes <br> historietas</h1>
                <svg class="lbro" xmlns="http://www.w3.org/2000/svg" width="90" height="99" fill="none">
                    <path fill="#325BA5" d="M83 78h-3c-2 0-3-2-4-3l-2-6 11-4 1 2 1 4c1 3 0 5-3 7h-1Z" />
                    <path fill="#5B7CB7" d="m80 64-2-5c2 0 5 1 6 3l-4 2ZM73 66c0-2 1-5 3-6l1 5-4 1Z" />
                    <path fill="#325BA5" d="M1 26v-2l4-2 10 29-4 3L1 26Z" />
                    <path fill="#5B7CB7" d="m30 57-12 4c-2 0-4 0-5-2l-1-1 2-4h1l23-8h1l1 2-24 8v3l13-5 1 3Z" />
                    <path fill="#325BA5"
                        d="m40 42-23 9L7 21l23-8 10 29ZM20 21l-6 3c-2 0-2 0-1 2a860 860 0 0 0 4 7 7001 7001 0 0 0 14-7 1572 1572 0 0 0-4-7l-7 2Z" />
                    <path fill="#5B7CB7" d="m32 56-1-3 10-3v2l-9 4ZM15 26l12-4 1 4-11 4-2-4Z" />
                    <path fill="#325BA5"
                        d="M45 73h-3c-4 0-7-1-9-4s-2-6-2-9l-1-3 2-1 1 4c1 5 1 11 9 11 6 0 8-5 11-11 2-6 6-13 13-13 7-1 10 5 11 10l-2 1c-2-6-4-9-9-9-6 0-9 6-11 12-3 5-5 10-10 12Z" />
                </svg>
            </div>
            <div class="buscadores">

                <div class="filter">
                    <select id="genero" onchange="filterByGenre()" class="temp-option">
                        <option value="" disabled selected>GÉNERO </option>
                        <option value="">Todos</option>
                        <option value="aventuras">Aventuras</option>
                        <option value="fantasía">Fantasía</option>
                        <option value="ciencia ficción">Ciencia Ficción</option>
                        <option value="superhéroes">Superhéroes</option>
                        <option value="humor">Humor</option>
                        <option value="misterio">Misterio</option>
                        <option value="históricas">Históricas</option>
                    </select>
                </div>

                <div class="search">
                    <input type="text" name="" id="find" placeholder=" BUSCAR" onkeyup="search()"
                        oninput="resizeInput(this)">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="23" fill="none">
                        <path fill="#325BA5"
                            d="M.499 10.381V9.124l.057-.462A9.748 9.748 0 0 1 2 4.552C3.495 2.159 5.676.768 8.403.183c.4-.087.811-.122 1.217-.183h1.258a.462.462 0 0 0 .104.034c1.294.09 2.508.454 3.665 1.036A9.364 9.364 0 0 1 18.8 5.125a9.66 9.66 0 0 1 1.11 5.614 9.377 9.377 0 0 1-1.36 4.043c-.097.157-.198.31-.304.48.078.07.143.121.2.182 1.472 1.47 2.944 2.942 4.415 4.414.09.09.177.182.257.281.76.928.337 2.389-.805 2.76-.736.24-1.36.046-1.902-.499-1.49-1.496-2.987-2.983-4.48-4.476a1.129 1.129 0 0 1-.133-.2l-.474.303a9.334 9.334 0 0 1-4.439 1.418c-2.086.132-4.02-.36-5.799-1.46C2.67 16.49 1.266 14.299.68 11.552c-.085-.385-.122-.78-.18-1.17Zm15.923-.656c.049-3.385-2.863-6.222-6.2-6.185a6.218 6.218 0 0 0-6.187 6.204c-.023 3.352 2.84 6.197 6.207 6.191 3.367-.006 6.241-2.85 6.18-6.21Z" />
                    </svg>
                </div>

            </div>
            <main>
                <?php
                while ($row = mysqli_fetch_assoc($all_historias)) {
                    ?>
                    <div class="card" data-genero="<?php echo $row["genero"]; ?>">
                        
                    <div class="image_card" style="background-image: url('<?php echo $row["imgUrl"]; ?>');">
                            <div class="titulo">
                                <h4>
                                    <?php echo $row["titlestory"]; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="caption">

                            <h4 class="autor">Autor:
                                <span>
                                    <?php echo $row["usuario"]; ?>
                                </span>
                            </h4>
                            <h4 class="genero">Género:
                                <span>
                                    <?php echo $row["genero"]; ?>
                                </span>
                            </h4>
                        </div>
                        <div class="accition">
                            <a href="#" class="mostrar-historieta" data-autor="<?php echo $row["usuario"]; ?>"
                                data-titulo="<?php echo $row["titlestory"]; ?>"><img src="../Recursos/play.png"
                                    alt="reproducir historieta"> </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </main>
        </div>

    </section>

    <script src="../JS/jquery-3.4.1.min.js"></script>
   
    <script type="text/javascript">
        function search() {
            let filter = document.getElementById('find').value.toUpperCase();
            let items = document.querySelectorAll('.card');

            for (var i = 0; i < items.length; i++) {
                let paragraphs = items[i].getElementsByTagName('h4');

                for (var j = 0; j < paragraphs.length; j++) {
                    let value = paragraphs[j].innerHTML || paragraphs[j].innerText || paragraphs[j].textContent;

                    if (value.toUpperCase().indexOf(filter) > -1) {
                        items[i].style.display = "";
                        break; // Rompe el bucle si se encuentra una coincidencia en cualquier párrafo
                    } else {
                        items[i].style.display = "none";
                    }
                }
            }
        }

        function filterByGenre() {
            let selectedGenre = document.getElementById('genero').value;
            let items = document.querySelectorAll('.card');

            for (var i = 0; i < items.length; i++) {
                let genre = items[i].getAttribute('data-genero');

                if (selectedGenre === "" || selectedGenre === genre) {
                    items[i].style.display = "";
                } else {
                    items[i].style.display = "none";
                }
            }
        }

        $(document).ready(function () {
            $(".mostrar-historieta").click(function (event) {
                event.preventDefault(); // Evita la acción predeterminada del botón

                var autor = $(this).attr('data-autor');
                var titulo = $(this).attr('data-titulo');

                $.ajax({
                    type: "POST",
                    url: "./readStates/reiniciar.php",
                    data: {
                        autor: autor,
                        titulo: titulo
                    },
                    success: function (response) {
                        // Aquí puedes manejar la respuesta del servidor
                        window.location.href = "mostrarHistorieta.php";
                    },
                    error: function (xhr, status, error) {
                        // Aquí puedes manejar los errores
                        console.error(error);
                    }
                });
            });
        });

        //------estilos dinamicos
        function resizeInput(input) {
            input.style.width = (input.value.length + 1) * 8 + 'px';
        }




    </script>
    <?php
    include("PageElements/footer.php");
    ?>
</body>

</html>