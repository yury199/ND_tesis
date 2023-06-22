
function cambiarColor() {
    
    const colores = ['#325BA5', '#0C8558', '#FF4E54'];
    const color = colores[Math.floor(Math.random() * colores.length)];
    localStorage.setItem('color-de-fondo', color);
    document.documentElement.style.setProperty('--color-de-fondo', color);
    
    //fondos
    const imagenes = [
      'url(../Recursos/bg1.jpg)',
      'url(../Recursos/bg2.jpg)',
      'url(../Recursos/bg3.jpg)',
      'url(../Recursos/bg4.jpg)',
      'url(../Recursos/bg5.jpg)'
    ];
    const indiceAleatorio = Math.floor(Math.random() * imagenes.length);
    localStorage.setItem('imagen-fondo', imagenes[indiceAleatorio]);
    document.documentElement.style.setProperty('--imagen-fondo', localStorage.getItem('imagen-fondo'));
    
  }

//Formularios

function mostrarPassword() {
  var x = document.getElementById("password"); 
  // Obtener el elemento por su id
  var elemento = document.getElementById("mi-elemento");
  if (x.type === "password" ) {

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
  if (z.type === "password" ) {

	elemento2.style.opacity = 1;
	z.type = "text";
	} else {
	elemento2.style.opacity = 0.5;
	z.type = "password";
	}
}

//---------


  
  function mostrarCambiarContrasena() {
    var formulario = document.getElementById("cambiarContrasena");
    formulario.style.display = "block";
    var formulario1 = document.getElementById("Contrasena");
    formulario1.style.display = "none";

   
     // Activar el botón
    var btn = document.getElementById("btnG");
    btn.disabled = false;
    btn.style.opacity = "1";
  }
 

