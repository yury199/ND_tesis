<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='../JS/jquery-3.4.1.min.js'></script>
  <link rel="stylesheet" href="../CSS/jquery.orgchart.css"/>
  <link rel="stylesheet" href="../CSS/crear.css"/>

</head>
<body>
	<div id="botones">
		<button type="button" id="btnAgregar">Añadir</button>
		
		<button type="button" id="btnDividir">Dividir historia</button> 
		<a href="#" id="btnEditar">Editar Viñeta</a>
		<!-- <button type="button" id="btnEliminar">Eliminar</button> -->
		<a href="./creationStates/delete.php">eliminaaar</a>
		
		
	  </div>
	
	  
	  <form id="formAgregar" action="./creationStates/create.php" method="post" enctype="multipart/form-data" style="display:none;">
		<!-- campos del formulario para añadir -->
		<label>Descripción:</label>
		<input type="text" id="texto" name="texto">
		<label>Imagen:</label>
		<input type="file" id="imagen" name="imagen" accept="image/*" required>
		<div id="preview"></div>
		<button type="submit">Añadir</button>
	  </form>
	  
	  <div id="formEditar" style="display:none;">
	  </div>
		

	  <form id="formEliminar" style="display:none;">
		<!-- campos del formulario para Eliminar -->
		<label>Esta ceguro que quiere eliminar</label>
		<input type="submit" value="Eliminar">
	  </form>

	  <p><?php echo empty($_SESSION["aviso_nodo"]) ? "Crea y diviertete" : $_SESSION["aviso_nodo"]; ?></p>


	

	  <form id="formDividir" action="./creationStates/createDecisions.php" method="post" enctype="multipart/form-data"  onsubmit="return validarFormulario()"  style="display:none;">
    <!-- campos del formulario -->
	<br>
    <div>
        <label for="imagen1">Imagen 1:</label>
        <input type="file" name="imagen1" id="imagen1" required>
		<div id="preview1"></div>
    </div>
    <div>
        <label for="descripcion1">Descripción 1:</label>
        <input type="text" name="descripcion1" id="descripcion1">
    </div>
    <div>
        <p>Emoción 1:</p>
        <input type="checkbox" name="emocion1[]" value="feliz" onchange="actualizarEmociones('emocion1', 'emocion2')"> Feliz
        <input type="checkbox" name="emocion1[]" value="neutral" onchange="actualizarEmociones('emocion1', 'emocion2')"> Neutral
        <input type="checkbox" name="emocion1[]" value="triste" onchange="actualizarEmociones('emocion1', 'emocion2')"> Triste
        <input type="checkbox" name="emocion1[]" value="sorprendido" onchange="actualizarEmociones('emocion1', 'emocion2')"> Sorprendido
        <input type="checkbox" name="emocion1[]" value="enojado" onchange="actualizarEmociones('emocion1', 'emocion2')"> Enojado
        <input type="checkbox" name="emocion1[]" value="asqueado" onchange="actualizarEmociones('emocion1', 'emocion2')"> Asqueado
        <input type="checkbox" name="emocion1[]" value="soprendido" onchange="actualizarEmociones('emocion1', 'emocion2')"> Sorprendido
      
    </div>

    <div>
        <label for="imagen2">Imagen 2:</label>
        <input type="file" name="imagen2" id="imagen2" required>
		<div id="preview2"></div>
    </div>
    <div>
        <label for="descripcion2">Descripción 2:</label>
        <input type="text" name="descripcion2" id="descripcion2">
    </div>
    <div>
        <p>Emoción 2:</p>
        <input type="checkbox" name="emocion2[]" value="feliz" onchange="actualizarEmociones('emocion2', 'emocion1')"> Feliz
        <input type="checkbox" name="emocion2[]" value="neutral" onchange="actualizarEmociones('emocion2', 'emocion1')"> Neutral
        <input type="checkbox" name="emocion2[]" value="triste" onchange="actualizarEmociones('emocion2', 'emocion1')"> Triste
        <input type="checkbox" name="emocion2[]" value="sorprendido" onchange="actualizarEmociones('emocion2', 'emocion1')"> Sorprendido
        <input type="checkbox" name="emocion2[]" value="enojado" onchange="actualizarEmociones('emocion2', 'emocion1')"> Enojado
        <input type="checkbox" name="emocion2[]" value="asqueado" onchange="actualizarEmociones('emocion2', 'emocion1')"> Asqueado
        <input type="checkbox" name="emocion2[]" value="soprendido" onchange="actualizarEmociones('emocion2', 'emocion1')"> Sorprendido
      
    </div>
	<span id="emocion-error" style="display: none; color: red;">Debes seleccionar al menos una emoción en cada conjunto.</span>


    <div>
        <button type="submit">Dividir Historia</button>
    </div>
</form>

	



<div  style="display: none">

<ul id="mainContainer" class="clearfix"></ul>	
  	
</div>

<div id="main">
	
</div>


<button type="button" onclick="s1()">Cancelar</button>

<button type="button" onclick="s1()">Crear historia</button>
		
  
<script src="../JS/jquery.orgchart.js"></script>
<script type='text/javascript'>

	//___mostrar formularios____

$(document).ready(function() {

    $("#btnAgregar").click(function() {
    // Mostrar el formulario de añadir
    $("#formAgregar").show();
    $("#formEditar").hide();
	$("#formEliminar").hide();
	$("#formDividir").hide();
  });

    // Evento de clic para el botón "Editar"
	$("#btnEditar").click(function() {
    // Mostrar el formulario de edición
    $("#formAgregar").hide();
	$("#formDividir").hide();
	$("#formEliminar").hide();
    $("#formEditar").show();

  });

    // Evento de clic para el botón "Dividir historia"
	$("#btnDividir").click(function() {
    // Mostrar el formulario de edición
    $("#formAgregar").hide();
	$("#formEditar").hide();
	$("#formEliminar").hide();
    $("#formDividir").show();

  });

    // Evento de clic para el botón "Dividir historia"
	$("#btnEliminar").click(function() {
    // Mostrar el formulario de edición
    $("#formAgregar").hide();
	$("#formEditar").hide();
	$("#formDividir").hide();
    $("#formEliminar").show();

  });

}); 
//__Previsualizar IMG_
document.getElementById('imagen').addEventListener('change', function(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  
  reader.onload = function(e) {
    var img = document.createElement('img');
    img.src = e.target.result;
    img.style.maxWidth = '200px'; // Ajusta el tamaño máximo de la imagen para previsualización
    document.getElementById('preview').appendChild(img);
  };
  
  reader.readAsDataURL(file);
});
//____
document.getElementById('imagen1').addEventListener('change', function(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  
  reader.onload = function(e) {
    var img = document.createElement('img');
    img.src = e.target.result;
    img.style.maxWidth = '200px'; // Ajusta el tamaño máximo de la imagen para previsualización
    document.getElementById('preview1').appendChild(img);
  };
  
  reader.readAsDataURL(file);
});
//____
document.getElementById('imagen2').addEventListener('change', function(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  
  reader.onload = function(e) {
    var img = document.createElement('img');
    img.src = e.target.result;
    img.style.maxWidth = '200px'; // Ajusta el tamaño máximo de la imagen para previsualización
    document.getElementById('preview2').appendChild(img);
  };
  
  reader.readAsDataURL(file);
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

	function validarFormulario() {
    var emocion1 = document.getElementsByName("emocion1[]");
    var emocion2 = document.getElementsByName("emocion2[]");
    var emocion1Seleccionada = false;
    var emocion2Seleccionada = false;

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
      document.getElementById("emocion-error").style.display = "block";
      return false;
    }

    return true;
  }


	
//_ESTADOS DE EDICIÓN____

$(document).ready(function() {
  $("#btnEditar").click(function(e) {
    e.preventDefault(); // Evita que el enlace recargue la página

    // Realiza una solicitud AJAX para obtener el formulario de edición
    $.ajax({
      url: "./creationStates/editForm.php",
      method: "GET",
      success: function(response) {
        // Muestra el formulario de edición dentro del elemento 'formularioEditar'
        $("#formEditar").html(response);
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
});




//_________Organigrama___________


$(function(){
var members;
$.ajax({
 url:'./creationStates/load.php',
 async:false,
 success:function(data){
	 members=$.parseJSON(data)
 }
 
});

//memberId,parentId,otherInfo
	 for(var i = 0; i < members.length; i++){
		 
		 var member = members[i];
		 
		 
		 if (i == 0) {
			$("#mainContainer").append("<li id=" + member.memberId + ">" + member.otherInfo + "<img src='" + member.imgUrl + " 'style='max-width: 50px; max-height: 50px;' ></li>");

		} else {
			if ($('#pr_' + member.parentId).length <= 0) {
				$('#'+member.parentId).append("<ul id='pr_"+member.parentId+"'><li id="+member.memberId+">"+member.otherInfo+"<img src='" + member.imgUrl + "'style='max-width: 50px; max-height: 50px;'></li></ul>")
			} else {
				$('#pr_'+member.parentId).append("<li id="+member.memberId+">"+member.otherInfo+"<img src='" + member.imgUrl + "'style='max-width: 50px; max-height: 50px;'></li>")
			}
		}

	 }
	
 $("#mainContainer").orgChart({container: $("#main"),interactive: true, fade: true, speed: 'slow'});
}); 

</script>  
</body>




</html>








