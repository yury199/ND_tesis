<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Crear</title>
  <link rel="shortcut icon" href="../Recursos/Logo.ico" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="title" content="Home">
  <meta name="description" content="Home">
  <!-- Enlaces-->
  <link rel="stylesheet" href="../CSS/fonts.css">
  <link href="../CSS/nav.css" rel="stylesheet" type="text/css">
  <link href="../CSS/body.css" rel="stylesheet" type="text/css">
  <link href="../CSS/footer.css" rel="stylesheet" type="text/css">
  <link href="../CSS/info.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../CSS/jquery.orgchart.css" />

  <link rel="stylesheet" href="../CSS/crear.css" />

  <!-- Definir colores-->
  <script src="../JS/cambioColor.js"></script>
  <script src="../JS/nav_menu.js"></script>

</head>

<body onload="cambiarColor()">
  <section class="crear_pg">

    <div class="contenedor_crear">


      <div class="barra_v">
        <div class="titullo">
          <h1>Crea<span> tu</span><br>historieta</h1>
          <img src="../Recursos/edit.png" alt="img logo mapa edicion">
        </div>
        <div class="info_user">
          <h2>"
            <?php echo $_SESSION["title"]; ?> "
          </h2>
          <p>Categoria:
            <?php echo $_SESSION["categoria"]; ?>
          </p>
        </div>
        <div class="botones">
          <!--  agregar -->
          <a class="botonC" href="#" id="btnAgregar">
            <img src="../Recursos/Bagregar.png" alt="boton"> Añadir</a>
          <form id="formAgregar" class="formulario" style="display:none;">
            <!-- campos del formulario para añadir -->
            <div>
              <label>Ilustración:</label>

              <input type="file" name="imagen" id="file-1" class="inputfile inputfile-1" accept=".jpg" required />
              <label for="file-1">
                <span id="seleccionadoA" class="iborrainputfile">Seleccionar archivo</span>
                <svg class="iborrainputfile" viewBox="0 0 28 21">
                  <path fill="#7E9FDC"
                    d="M27.91 14.328c-.076.4-.12.81-.232 1.2-.804 2.808-2.634 4.597-5.48 5.21-3.504.755-6.898-1.234-8.139-4.65-1.359-3.742.9-8.113 4.744-9.144 2.642-.709 4.987-.12 6.97 1.761 1.207 1.146 1.881 2.586 2.084 4.241.012.098.035.194.052.291v1.091Zm-7.588-1.78v.34c0 1.036.002 2.071-.002 3.106 0 .245.054.455.294.565.354.161.69-.094.692-.535.006-1.045.002-2.089.002-3.133v-.339c.385.352.708.67 1.058.956.13.106.33.202.48.18.147-.021.32-.173.395-.313.11-.205-.01-.404-.172-.557-.61-.57-1.22-1.142-1.834-1.707-.273-.25-.515-.25-.792.004-.61.558-1.215 1.12-1.816 1.688a.731.731 0 0 0-.199.314c-.06.212.017.396.206.517.227.146.436.088.62-.082.34-.313.674-.633 1.068-1.004Z" />
                  <path fill="#7E9FDC"
                    d="M2.158 10.912V2.171h17.457v3.506c-.731.244-1.458.441-2.148.729-1.14.476-2.087 1.233-2.89 2.174-.258.302-.538.59-.836.852-.64.565-1.3 1.109-1.954 1.658-.383.322-.602.324-.989.017-1.15-.918-2.302-1.835-3.451-2.754-.82-.654-1.563-.636-2.347.06L2.467 10.65c-.087.076-.176.15-.31.262Zm6.596-4.546a2.244 2.244 0 0 0 4.486-.01 2.246 2.246 0 0 0-2.235-2.238 2.241 2.241 0 0 0-2.25 2.248Z" />
                  <path fill="#7E9FDC"
                    d="M13.308 16.973H0V0h21.727v5.715l-1.1-.064V1.838c0-.527-.15-.68-.684-.68H1.809c-.507 0-.652.147-.652.648v13.307c0 .537.16.69.707.69 3.59 0 7.181.003 10.771-.005.236 0 .333.072.387.293.071.288.18.565.286.882Z" />
                  <path fill="#7E9FDC"
                    d="M2.15 14.798c0-.828-.003-1.645.005-2.46 0-.067.067-.145.123-.195 1.15-1.02 2.3-2.038 3.453-3.053.331-.291.574-.298.922-.021 1.16.923 2.315 1.848 3.471 2.775.815.652 1.531.647 2.33-.024.172-.145.347-.288.552-.423-.286 1.116-.405 2.24-.258 3.401H2.149ZM12.253 6.357a1.272 1.272 0 0 1-1.274 1.258A1.264 1.264 0 0 1 9.74 6.351a1.25 1.25 0 0 1 1.272-1.25c.69.007 1.243.566 1.24 1.256Z" />
                </svg>
              </label>
            </div>

            <label>Descripción:</label>
            <input type="text" id="texto" name="texto">

            <button type="button" id="btnSubmit" onclick="agregarDato()">Añadir</button>

          </form>
          <!--  Dividir -->

          <a class="botonC" href="#" id="btnDividir">
            <img src="../Recursos/Bdividir.png" alt="boton">dividir</a>
          <form id="formDividir" class="formulario" style="display:none;">
            <!-- campos del formulario -->
            <br>
            <div>
              <div>
                <label>Ilustración:</label>
                <input type="file" name="imagen1" id="file-2" class="inputfile inputfile-1" accept=".jpg" required />
                <label for="file-2">
                  <span id="seleccionado" class="iborrainputfile">Seleccionar archivo</span>
                  <svg class="iborrainputfile" viewBox="0 0 28 21">
                    <path fill="#7E9FDC"
                      d="M27.91 14.328c-.076.4-.12.81-.232 1.2-.804 2.808-2.634 4.597-5.48 5.21-3.504.755-6.898-1.234-8.139-4.65-1.359-3.742.9-8.113 4.744-9.144 2.642-.709 4.987-.12 6.97 1.761 1.207 1.146 1.881 2.586 2.084 4.241.012.098.035.194.052.291v1.091Zm-7.588-1.78v.34c0 1.036.002 2.071-.002 3.106 0 .245.054.455.294.565.354.161.69-.094.692-.535.006-1.045.002-2.089.002-3.133v-.339c.385.352.708.67 1.058.956.13.106.33.202.48.18.147-.021.32-.173.395-.313.11-.205-.01-.404-.172-.557-.61-.57-1.22-1.142-1.834-1.707-.273-.25-.515-.25-.792.004-.61.558-1.215 1.12-1.816 1.688a.731.731 0 0 0-.199.314c-.06.212.017.396.206.517.227.146.436.088.62-.082.34-.313.674-.633 1.068-1.004Z" />
                    <path fill="#7E9FDC"
                      d="M2.158 10.912V2.171h17.457v3.506c-.731.244-1.458.441-2.148.729-1.14.476-2.087 1.233-2.89 2.174-.258.302-.538.59-.836.852-.64.565-1.3 1.109-1.954 1.658-.383.322-.602.324-.989.017-1.15-.918-2.302-1.835-3.451-2.754-.82-.654-1.563-.636-2.347.06L2.467 10.65c-.087.076-.176.15-.31.262Zm6.596-4.546a2.244 2.244 0 0 0 4.486-.01 2.246 2.246 0 0 0-2.235-2.238 2.241 2.241 0 0 0-2.25 2.248Z" />
                    <path fill="#7E9FDC"
                      d="M13.308 16.973H0V0h21.727v5.715l-1.1-.064V1.838c0-.527-.15-.68-.684-.68H1.809c-.507 0-.652.147-.652.648v13.307c0 .537.16.69.707.69 3.59 0 7.181.003 10.771-.005.236 0 .333.072.387.293.071.288.18.565.286.882Z" />
                    <path fill="#7E9FDC"
                      d="M2.15 14.798c0-.828-.003-1.645.005-2.46 0-.067.067-.145.123-.195 1.15-1.02 2.3-2.038 3.453-3.053.331-.291.574-.298.922-.021 1.16.923 2.315 1.848 3.471 2.775.815.652 1.531.647 2.33-.024.172-.145.347-.288.552-.423-.286 1.116-.405 2.24-.258 3.401H2.149ZM12.253 6.357a1.272 1.272 0 0 1-1.274 1.258A1.264 1.264 0 0 1 9.74 6.351a1.25 1.25 0 0 1 1.272-1.25c.69.007 1.243.566 1.24 1.256Z" />
                  </svg>
                </label>
              </div>
              <div>
                <label for="descripcion1">Descripción 1:</label>
                <input type="text" name="descripcion1" id="descripcion1">
              </div>
              <div>
                <p>Emoción 1:</p>
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
                  onchange="actualizarEmociones('emocion1', 'emocion2')"> Sorprendido

              </div>
            </div>
            <div>

              <div>
                <label>Ilustración:</label>
                <input type="file" name="imagen2" id="file-3" class="inputfile inputfile-1" accept=".jpg" required />
                <label for="file-3">
                  <span id="seleccionado2" class="iborrainputfile">Seleccionar archivo</span>
                  <svg class="iborrainputfile" viewBox="0 0 28 21">
                    <path fill="#7E9FDC"
                      d="M27.91 14.328c-.076.4-.12.81-.232 1.2-.804 2.808-2.634 4.597-5.48 5.21-3.504.755-6.898-1.234-8.139-4.65-1.359-3.742.9-8.113 4.744-9.144 2.642-.709 4.987-.12 6.97 1.761 1.207 1.146 1.881 2.586 2.084 4.241.012.098.035.194.052.291v1.091Zm-7.588-1.78v.34c0 1.036.002 2.071-.002 3.106 0 .245.054.455.294.565.354.161.69-.094.692-.535.006-1.045.002-2.089.002-3.133v-.339c.385.352.708.67 1.058.956.13.106.33.202.48.18.147-.021.32-.173.395-.313.11-.205-.01-.404-.172-.557-.61-.57-1.22-1.142-1.834-1.707-.273-.25-.515-.25-.792.004-.61.558-1.215 1.12-1.816 1.688a.731.731 0 0 0-.199.314c-.06.212.017.396.206.517.227.146.436.088.62-.082.34-.313.674-.633 1.068-1.004Z" />
                    <path fill="#7E9FDC"
                      d="M2.158 10.912V2.171h17.457v3.506c-.731.244-1.458.441-2.148.729-1.14.476-2.087 1.233-2.89 2.174-.258.302-.538.59-.836.852-.64.565-1.3 1.109-1.954 1.658-.383.322-.602.324-.989.017-1.15-.918-2.302-1.835-3.451-2.754-.82-.654-1.563-.636-2.347.06L2.467 10.65c-.087.076-.176.15-.31.262Zm6.596-4.546a2.244 2.244 0 0 0 4.486-.01 2.246 2.246 0 0 0-2.235-2.238 2.241 2.241 0 0 0-2.25 2.248Z" />
                    <path fill="#7E9FDC"
                      d="M13.308 16.973H0V0h21.727v5.715l-1.1-.064V1.838c0-.527-.15-.68-.684-.68H1.809c-.507 0-.652.147-.652.648v13.307c0 .537.16.69.707.69 3.59 0 7.181.003 10.771-.005.236 0 .333.072.387.293.071.288.18.565.286.882Z" />
                    <path fill="#7E9FDC"
                      d="M2.15 14.798c0-.828-.003-1.645.005-2.46 0-.067.067-.145.123-.195 1.15-1.02 2.3-2.038 3.453-3.053.331-.291.574-.298.922-.021 1.16.923 2.315 1.848 3.471 2.775.815.652 1.531.647 2.33-.024.172-.145.347-.288.552-.423-.286 1.116-.405 2.24-.258 3.401H2.149ZM12.253 6.357a1.272 1.272 0 0 1-1.274 1.258A1.264 1.264 0 0 1 9.74 6.351a1.25 1.25 0 0 1 1.272-1.25c.69.007 1.243.566 1.24 1.256Z" />
                  </svg>
                </label>
              </div>
              <div>
                <label for="descripcion2">Descripción 2:</label>
                <input type="text" name="descripcion2" id="descripcion2">
              </div>
              <div>
                <p>Emoción 2:</p>
                <input type="checkbox" name="emocion2[]" value="feliz"
                  onchange="actualizarEmociones('emocion2', 'emocion1')">
                Feliz
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
                  onchange="actualizarEmociones('emocion2', 'emocion1')"> Sorprendido
              </div>

            </div>
            <div>
              <button type="button" onclick="AgregarDDatos()">Dividir Historia</button>
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

          <form id="formEliminar" class="formulario" style="display:none;">
            <!-- campos del formulario para Eliminar -->
            <label>Esta Seguro que quiere eliminar</label>
            <a href="#" id="btnCerrar">no</a>
            <button type="button" id="btnSubmit" onclick="eliminarDato()">si</button>
          </form>

          <p id="respuesta" style="display:none;"></p>


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

    <a href="">CANCELAR</a>
    <a href="">PUBLICAR HISTORIA</a>



  </section>
  <script src="../JS/jquery-3.4.1.min.js"></script>
  <script src="../JS/jquery.orgchart.js"></script>
  <script src="script.js"></script>

  <script type='text/javascript'>

    //___mostrar formularios____

    $(document).ready(function () {

      $("#btnAgregar").click(function () {
        // Ocultar los formularios existentes con animaciones de deslizamiento hacia arriba y desvanecimiento gradual
        $("#formularioEdicion, #formEliminar, #formDividir").slideUp().fadeOut();
        // Mostrar el elemento con una animación de deslizamiento hacia abajo y desvanecimiento gradual
        $("#formAgregar").slideDown().fadeIn();

      });

      $("#btnEditar").click(function () {
        $("#formAgregar, #formEliminar, #formDividir").slideUp().fadeOut();
        $("#formularioEdicion").slideDown().fadeIn();
      });

      $("#btnDividir").click(function () {
        $("#formAgregar, #formEliminar, #formularioEdicion").slideUp().fadeOut();
        $("#formDividir").slideDown().fadeIn();

      });

      $("#btnEliminar").click(function () {
        $("#formAgregar, #formDividir, #formularioEdicion").slideUp().fadeOut();
        $("#formEliminar").slideDown().fadeIn();

      });
      $("#btnCerrar").click(function () {
        $("#formAgregar, #formDividir, #formularioEdicion", "#formEliminar").slideUp().fadeOut();
      });

    });

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
  </script>


</body>

</html>