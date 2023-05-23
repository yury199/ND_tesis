function agregarDato() {
  var spanElement = document.getElementById("seleccionadoA");
  var imagen = document.getElementById("file-1").value;
  // Verificar si se ha seleccionado una imagen
  if (imagen !== "") {
    // Se ha seleccionado una imagen, continuar con el envío del formulario mediante AJAX
    // Obtener el formulario
    var formulario = document.getElementById("formAgregar");
    // Obtener los datos del formulario
    var datosFormulario = new FormData(formulario);

    // Envío de los datos mediante Ajax
    $.ajax({
      url: "./creationStates/create.php",
      type: "POST",
      data: datosFormulario,
      processData: false,
      contentType: false,
      dataType: "text",
      success: function (response) {
        document.getElementById("respuesta").style.display = "block";
        $("#respuesta").text(response);
        updateOrganigram();
        setTimeout(function () {
          imagen.value = null;
          spanElement.textContent = "Seleccionar archivo";
          formulario.reset();
        }, 300);
      },
      error: function (xhr, status, error) {
        console.error(error); // Mostrar el error en la consola
      },
    });
  } else {
    // No se ha seleccionado una imagen, mostrar un mensaje de error o tomar la acción adecuada
    alert("Por favor, selecciona una imagen.");
  }
}

//__Dividir Emociones--//
function AgregarDDatos() {
  var spanElement = document.getElementById("seleccionado");
  var spanElement2 = document.getElementById("seleccionado2");
  var imagen1 = document.getElementById("file-2").value;
  var imagen2 = document.getElementById("file-3").value;
  var emocion1 = document.getElementsByName("emocion1[]");
  var emocion2 = document.getElementsByName("emocion2[]");
  var emocion1Seleccionada = false;
  var emocion2Seleccionada = false;

  if (imagen1 !== "" && imagen2 !== "") {
    for (var i = 0; i < emocion1.length; i++) {
      if (emocion1[i].checked) {
        emocion1Seleccionada = true;
        break;
      }
    }

    for (var i = 0; i < emocion2.length; i++) {
      if (emocion2[i].checked) {
        emocion2Seleccionada = true;
        break;
      }
    }

    if (!emocion1Seleccionada || !emocion2Seleccionada) {
      document.getElementById("respuesta").style.display = "block";
      document.getElementById("respuesta").innerText =
        "Porfavor seleccione almenos una emocion en cada viñeta";
      return false;
    } else {
      var formularioD = document.getElementById("formDividir");
      var datosFormularioD = new FormData(formularioD);
      $.ajax({
        url: "./creationStates/createDecisions.php",
        type: "POST",
        data: datosFormularioD,
        processData: false,
        contentType: false,
        dataType: "text",
        success: function (response) {
          document.getElementById("respuesta").style.display = "block";
          $("#respuesta").text(response);
          updateOrganigram();
          setTimeout(function () {
            imagen1.value = null;
            imagen2.value = null;
            spanElement.textContent = "Seleccionar archivo";
            spanElement2.textContent = "Seleccionar archivo";
            formularioD.reset();
          }, 300);
        },
        error: function (xhr, status, error) {
          console.error(error); // Mostrar el error en la consola
        },
      });
    }

    return true;
  } else {
    document.getElementById("respuesta").style.display = "block";
    document.getElementById("respuesta").innerText ="Porfavor seleccione las imagenes";
  }
}

//_ESTADOS DE EDICIÓN____

$(document).ready(function () {
  $("#btnEditar").click(function (e) {
    e.preventDefault(); // Evita que el enlace recargue la página

    // Realiza una solicitud AJAX para obtener el formulario de edición
    $.ajax({
      url: "./creationStates/editForm2.php",
      method: "GET",
      success: function (response) {
        // Muestra el formulario de edición dentro del elemento 'formularioEditar'
        document.getElementById("respuesta").style.display = "block";

        $("#formularioEdicion").html(response);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});


function editarDato() {

    

      var formulario = document.getElementById("formEditar");
      var datosFormulario = new FormData(formulario);

      $.ajax({
        url: "./creationStates/update2.php",
        type: "POST",
        data: datosFormulario,
        processData: false,
        contentType: false,
        dataType: "text",
        success: function (response) {
          document.getElementById("respuesta").style.display = "block";
          $("#respuesta").text(response);
          updateOrganigram();
          setTimeout(function () {
            formulario.reset();
            $("#formularioEdicion").slideUp().fadeOut();

          }, 300);
        },
        error: function (xhr, status, error) {
          console.error(error); // Mostrar el error en la consola
        },
      });
   
  }

  
//----


function eliminarDato() {
  // Realizar la solicitud AJAX
  $.ajax({
    url: "./creationStates/delete.php",
    type: "POST",
    dataType: "text",
    success: function (response) {
      // Manejar la respuesta del servidor
      $("#respuesta").text(response);
      updateOrganigram();
    },
    error: function (xhr, status, error) {
      console.error(error); // Mostrar el error en la consola
    },
  });
}
