<?php
session_start();
if (empty($_SESSION["id"])) {
  header("location: login.php");  
} 

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
  <link href="../CSS/crear.css" rel="stylesheet" type="text/css" />

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

    <div class="contenedor_crear">


      <div class="barra_v" id="barraedit">
        <div class="titullo">
          <h1 class="titulo">Crea<span class="spantitulo"> tu</span><br>historieta</h1>
          <img src="../Recursos/edit.png" alt="img logo mapa edicion">
        </div>
        <div class="info_user">
          <h2>
            <?php echo $_SESSION["title"]; ?>
          </h2>
          <p>Categoria:
            <?php echo $_SESSION["categoria"]; ?>
          </p>
        </div>
        <div class="contenedoraRta">

          <div id="respuestas" class='alert-danger' style="display: none">
            <p id="respuesta" class='textoblanco'></p>
          </div>

        </div>



        <div class="botones">

          <!--  agregar -->
          <a class="botonC" href="#" id="btnAgregar">
            <img src="../Recursos/Bagregar.png" alt="boton"> Añadir</a>
          <form id="formAgregar" class="formulario agregar" style="display:none;">
            <!-- campos del formulario para añadir -->
            <label class="semititulo">Ilustración:</label>
            <div class="ilustra">
              <input type="file" name="imagen" id="file-1" class="inputfile inputfile-1" accept=".jpg" required />
              <label for="file-1">
                <span id="seleccionadoA" class="iborrainputfile">Seleccionar archivo</span>
                <img class="imgSb" src="../Recursos/imgsub.png" alt="img de subida">
              </label>
            </div>

            <label class="semititulo">Descripción:</label>
            <textarea id="texto1" class="descrp" name="texto" cols="auto" rows="3"
              placeholder="  Menos de 500 caracteres" maxlength="500"></textarea>
            <p class="text"> <span class="text" id="charCount1">500</span> caracteres restantes</p>

            <div class="botonesconfim">
              <a class="btnC" href="#" id="btnSubmit" onclick="agregarDato()">Aceptar</a>
              <a class="btnC" href="#" onclick="cerrarFormularios()">Cancelar</a>
            </div>
          </form>
          <!--  Dividir -->

          <a class="botonC" href="#" id="btnDividir">
            <img src="../Recursos/Bdividir.png" alt="boton">dividir</a>

          <form id="formDividir" class="formulariodiv" style="display:none;">
            <div class=campos> <!-- campos del formulario -->
              <div class="formulario ">

                <h2>Decisión 1</h2>
                <label class="semititulo">Ilustración:</label>
                <div class="ilustra">
                  <input type="file" name="imagen1" id="file-2" class="inputfile inputfile-1" accept=".jpg" required />
                  <label for="file-2">
                    <span id="seleccionado" class="iborrainputfile">Seleccionar archivo</span>
                    <img class="imgSb" src="../Recursos/imgsub.png" alt="img de subida">
                  </label>
                </div>

                <label class="semititulo">Descripción:</label>
                <textarea id="texto2" class="descrp" name="descripcion1" cols="auto" rows="3"
                  placeholder="  Menos de 500 caracteres" maxlength="500"></textarea>
                <p class="text"> <span class="text" id="charCount2">500</span> caracteres restantes</p>

                <label class="semititulo">Emociones:</label>

                <div class="check">

                  <input type="checkbox" name="emocion1[]" value="feliz"
                    onchange="actualizarEmociones('emocion1', 'emocion2')">Feliz
                  <input type="checkbox" name="emocion1[]" value="neutral"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Neutral
                  <input type="checkbox" name="emocion1[]" value="triste"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Triste
                  <input type="checkbox" name="emocion1[]" value="sorprendido"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Sorprendido
                  <input type="checkbox" name="emocion1[]" value="enojado"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Enojado
                  <input type="checkbox" name="emocion1[]" value="asqueado"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Asqueado
                  <input type="checkbox" name="emocion1[]" value="soprendido"
                    onchange="actualizarEmociones('emocion1', 'emocion2')"> Asustado

                </div>
              </div>
              <div class="formulario">
                <h2>Decisión 2</h2>
                <label class="semititulo">Ilustración:</label>
                <div class="ilustra">
                  <input type="file" name="imagen2" id="file-3" class="inputfile inputfile-1" accept=".jpg" required />
                  <label for="file-3">
                    <span id="seleccionado2" class="iborrainputfile">Seleccionar archivo</span>
                    <img class="imgSb" src="../Recursos/imgsub.png" alt="img de subida">
                  </label>
                </div>

                <label class="semititulo">Descripción:</label>
                <textarea id="texto3" class="descrp" name="descripcion2" cols="auto" rows="3"
                  placeholder="  Menos de 100 caracteres" maxlength="500"></textarea>
                <p class="text"> <span class="text" id="charCount3">500</span> caracteres restantes</p>

                <label class="semititulo">Emociones:</label>
                <div class="check">
                  <input type="checkbox" name="emocion2[]" value="feliz"
                    onchange="actualizarEmociones('emocion2', 'emocion1')">Feliz
                  <input type="checkbox" name="emocion2[]" value="neutral"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Neutral
                  <input type="checkbox" name="emocion2[]" value="triste"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Triste
                  <input type="checkbox" name="emocion2[]" value="sorprendido"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Sorprendido
                  <input type="checkbox" name="emocion2[]" value="enojado"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Enojado
                  <input type="checkbox" name="emocion2[]" value="asqueado"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Asqueado
                  <input type="checkbox" name="emocion2[]" value="soprendido"
                    onchange="actualizarEmociones('emocion2', 'emocion1')"> Asustado
                </div>

              </div><!--  -->
            </div>
            <div class="botonesconfim">
              <a class="btnD" href="#" onclick="cerrarFormulario()">Cancelar</a>

              <a class="btnD" href="#" onclick="AgregarDDatos()">Dividir Historia</a>

            </div>
          </form>

          <!--  Editar -->
          <a class="botonC" href="#" id="btnEditar">
            <img src="../Recursos/Beditar.png" alt="boton">Editar Viñeta</a>

          <div id="formularioEdicion" style="display:none;">


          </div>

          <!--  Eliminar -->
          <a class="botonC" href="#" id="btnEliminar">
            <img src="../Recursos/Beliminar.png" alt="boton">Eliminar</a>

          <form id="formEliminar" class="formulario agreagr" style="display:none;">
            <!-- campos del formulario para Eliminar -->
            <label>¿Está seguro de eliminar esta/s viñeta/s?</label>
            <div class="botonesconfim">
              <a class="btnC" href="#" onclick="cerrarFormularios()">Cancelar</a>
              <a class="btnC" href="#" id="btnSubmit" onclick="eliminarDato()">Aceptar</a>
            </div>
          </form>


        </div>

      </div>

      <div class="Org_edit" id="miDiv">
        <div style="display: none">
          <ul id="mainContainer" class="clearfix">
          </ul>
        </div>
        <div id="main">
        </div>
      </div>


    </div>
    <div class="botonesconfimT">
      <a class="botonT" href="#" onclick="customAlert()"> <img src="../Recursos/x.png" alt="boton">Cancelar</a>
      <a class="botonT" href="leerHistorietas.php"> <img src="../Recursos/compartir.png" alt="boton">Publicar
        Historieta</a>
    </div>


  </section>

  <div id="overlay"></div>
  <div id="custom-alert">
    <h2>Aviso</h2>
    <p>Estás a punto de eliminar el proceso de tu historieta. Esta acción es irreversible y eliminará tu progreso.<br>
      Confirma si estás seguro o cancela si tienes dudas.</p>
    <div class="aviso">
      <a href="#" onclick="closeCustomAlert()">Cancelar</a>
      <a class="btnC" href="#" id="btnSubmit" onclick="eliminarDatos()">Confirmar</a>
    </div>
  </div>


  <script src="../JS/jquery-3.4.1.min.js"></script>
  <script src="../JS/jquery.orgchart.js"></script>
  <script src="script.js"></script>

  <script type='text/javascript'>


    //___mostrar formularios____

    $(document).ready(function () {

      $("#btnAgregar").click(function () {
        var elemento2 = document.getElementById('miDiv');
        elemento2.style.height = '800px';
        // Ocultar los formularios existentes con animaciones de deslizamiento hacia arriba y desvanecimiento gradual
        $("#formularioEdicion, #formEliminar, #formDividir,#respuestas").slideUp().fadeOut();
        // Mostrar el elemento con una animación de deslizamiento hacia abajo y desvanecimiento gradual
        $("#formAgregar").slideDown().fadeIn();
      });

      $("#btnEditar").click(function () {
        $("#formAgregar, #formEliminar, #formDividir,#respuestas").slideUp().fadeOut();
        $("#formularioEdicion").slideDown().fadeIn();
      });

      $("#btnDividir").click(function () {
        var elemento = document.getElementById('barraedit');
        elemento.style.width = '100%';
        $("#formAgregar, #formEliminar,#respuestas, #formularioEdicion,#btnAgregar,#btnEliminar,#btnEditar").slideUp().fadeOut();
        $("#formDividir").slideDown().fadeIn();
      });

      $("#btnEliminar").click(function () {
        $("#formAgregar, #formDividir, #formularioEdicion,#respuestas").slideUp().fadeOut();
        $("#formEliminar").slideDown().fadeIn();
      });
    });

    function cerrarFormularios() {
      $("#formAgregar, #formularioEdicion, #formEliminar,#respuestas,#respuestas").slideUp().fadeOut();
      var elemento2 = document.getElementById('miDiv');
      elemento2.style.height = '700px';
    }

    function cerrarFormulario() {
      var elemento2 = document.getElementById('miDiv');
      elemento2.style.height = '700px';
      var elemento = document.getElementById('barraedit');
      elemento.style.width = '30%';

      $("#formDividir,#respuestas").slideUp().fadeOut();
      $("#btnAgregar,#btnEliminar,#btnEditar").slideDown().fadeIn();
    }


    document.addEventListener("DOMContentLoaded", function () {
      var inputs = document.querySelectorAll(".inputfile");

      Array.prototype.forEach.call(inputs, function (input) {
        var label = input.nextElementSibling;
        var labelVal = label.innerHTML;

        input.addEventListener("change", function (e) {
          var fileName = "";
          if (this.files && this.files.length > 1) {
            fileName = (this.getAttribute("data-multiple-caption") || "").replace(
              "{count}",
              this.files.length
            );
          } else {
            fileName = e.target.value.split("\\").pop();
          }

          if (fileName) {
            label.querySelector("span").textContent = fileName;
          } else {
            label.textContent = labelVal;
          }
        });
      });
    });



    //__emociones____
    function actualizarEmociones(source, target) {
      var sourceCheckboxes = document.getElementsByName(source + "[]");
      var targetCheckboxes = document.getElementsByName(target + "[]");

      // Desmarcar todas las emociones en el objetivo
      for (var i = 0; i < targetCheckboxes.length; i++) {
        targetCheckboxes[i].checked = false;
      }

      // Marcar las emociones faltantes en el objetivo
      for (var i = 0; i < sourceCheckboxes.length; i++) {
        if (!sourceCheckboxes[i].checked) {
          for (var j = 0; j < targetCheckboxes.length; j++) {
            if (targetCheckboxes[j].value === sourceCheckboxes[i].value) {
              targetCheckboxes[j].checked = true;
            }
          }
        }
      }
    }


    //_________Organigrama___________


    function updateOrganigram() {
      var members;
      $.ajax({
        url: './creationStates/load.php',
        async: false,
        success: function (data) {
          members = $.parseJSON(data);
        }
      });

      // Clear existing organigram
      $("#mainContainer").empty();

      // Rebuild the organigram
      for (var i = 0; i < members.length; i++) {
        var member = members[i];

        if (i == 0) {
          $("#mainContainer").append("<li id=" + member.memberId + ">" + "<img src='" + member.imgUrl + " ' ></li>");
        } else {
          if ($('#pr_' + member.parentId).length <= 0) {
            $('#' + member.parentId).append("<ul id='pr_" + member.parentId + "'><li id=" + member.memberId + ">" + "<img src='" + member.imgUrl + "'></li></ul>");
          } else {
            $('#pr_' + member.parentId).append("<li id=" + member.memberId + ">" + "<img src='" + member.imgUrl + "'></li>");
          }
        }
      }

      // Reinitialize the organigram
      $("#mainContainer").orgChart({ container: $("#main"), interactive: true, fade: true, speed: 'slow' });
    }

    // Call the function to initially load the organigram
    $(function () {
      updateOrganigram();
    });

    //hola
    var draggableDiv = document.getElementById('miDiv');
    var isDragging = false;
    var initialX, initialY, currentX, currentY;

    draggableDiv.addEventListener('mousedown', startDragging);
    draggableDiv.addEventListener('mousemove', drag);
    draggableDiv.addEventListener('mouseup', stopDragging);
    draggableDiv.addEventListener('mouseleave', stopDragging);

    function startDragging(e) {
      isDragging = true;
      initialX = e.clientX;
      initialY = e.clientY;
      draggableDiv.classList.add('dragging');
    }

    function drag(e) {
      if (!isDragging) return;
      e.preventDefault();
      currentX = initialX - e.clientX;
      currentY = initialY - e.clientY;
      initialX = e.clientX;
      initialY = e.clientY;
      draggableDiv.scrollLeft += currentX;
      draggableDiv.scrollTop += currentY;
    }

    function stopDragging() {
      isDragging = false;
      draggableDiv.classList.remove('dragging');
    }
    //-----------------------------
    function customAlert() {
      var overlay = document.getElementById('overlay');
      var customAlert = document.getElementById('custom-alert');
      overlay.style.display = 'block';
      customAlert.style.display = 'block';
    }

    function closeCustomAlert() {
      var overlay = document.getElementById('overlay');
      var customAlert = document.getElementById('custom-alert');
      overlay.style.display = 'none';
      customAlert.style.display = 'none';
    }



    //::::::::::::::::::::::
// Primera área de texto
const textarea1 = document.getElementById('texto1');
const charCount1 = document.getElementById('charCount1');

textarea1.addEventListener('input', function () {
  const writtenChars = this.value.length;
  const remainingChars = 500 - writtenChars;
  charCount1.textContent = remainingChars;

  if (writtenChars > 500) {
    this.value = this.value.slice(0, 500);
  }
});

// Segunda área de texto
const textarea2 = document.getElementById('texto2');
const charCount2 = document.getElementById('charCount2');

textarea2.addEventListener('input', function () {
  const writtenChars = this.value.length;
  const remainingChars = 500 - writtenChars;
  charCount2.textContent = remainingChars;

  if (writtenChars > 500) {
    this.value = this.value.slice(0, 500);
  }
});

// Tercera área de texto
const textarea3 = document.getElementById('texto3');
const charCount3 = document.getElementById('charCount3');

textarea3.addEventListener('input', function () {
  const writtenChars = this.value.length;
  const remainingChars = 500 - writtenChars;
  charCount3.textContent = remainingChars;

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