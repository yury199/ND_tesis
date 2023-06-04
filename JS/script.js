const video = document.getElementById("video");
const textHistoria = document.getElementsByClassName("des_his");

// Obtener el elemento del div avisos
const mensajeDiv = document.getElementById("avisa");
//Obtener emociones:
const ddiv = document.getElementById("barraemociones");
const textoE = document.getElementById("emocdecttext");
var expresionC = document.getElementById("cara");

//---el arreglo
let emociones;
var emociondetectada = "nada";

// Obtén una referencia al elemento del cargador

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri("../API/models"),
  faceapi.nets.faceLandmark68Net.loadFromUri("../API/models"),
  faceapi.nets.faceRecognitionNet.loadFromUri("../API/models"),
  faceapi.nets.faceExpressionNet.loadFromUri("../API/models"),
]).then(startVideo);

function startVideo() {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
      video.play();
    })
    .catch(function (error) {
      console.error('Error al acceder a la cámara:', error);
    });
}

video.addEventListener("loadedmetadata", () => {
  const canvas = faceapi.createCanvasFromMedia(video);
  document.body.append(canvas);
  const displaySize = { width: video.videoWidth, height: video.videoHeight };
  faceapi.matchDimensions(canvas, displaySize);
  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
      .withFaceLandmarks()
      .withFaceExpressions();

    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
    faceapi.draw.drawDetections(canvas, resizedDetections);
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

    emocionesV = detections.map((face) => face.expressions);
    if (emocionesV.length === 0) {
      mensajeDiv.style.opacity = 1;
      ddiv.style.opacity = 0;

    } else {
      ddiv.style.opacity = 1;
      mensajeDiv.style.opacity = 0;
      emociones = [
        {
          emocion: "feliz",
          valor: detections[0].expressions.happy,
        },
        {
          emocion: "neutral",
          valor: detections[0].expressions.neutral,
        },
        {
          emocion: "sorprendido",
          valor: detections[0].expressions.surprised,
        },
        {
          emocion: "enojado",
          valor: detections[0].expressions.angry,
        },
        {
          emocion: "triste",
          valor: detections[0].expressions.sad,
        },
        {
          emocion: "asqueado",
          valor: detections[0].expressions.disgusted,
        },
        {
          emocion: "asustado",
          valor: detections[0].expressions.fearful,
        },
      ];

      let emocionesOrdenadas = emociones.sort((c1, c2) =>
        c1.valor < c2.valor ? 1 : c1.valor > c2.valor ? -1 : 0
      );
      emociondetectada = emocionesOrdenadas[0].emocion;
      textoE.textContent = emociondetectada;
      // Cambiar la imagen según la emoción detectada
      cambiarcarita(emociondetectada);
    }
  }, 100);
});

function cambiarcarita(emocion) {
  let rutaImagen = "";

  switch (emocion) {
    case "feliz":
      rutaImagen = "../Recursos/Efeliz.png";
      break;
    case "neutral":
      rutaImagen = "../Recursos/Eneutral.png";
      break;
    case "sorprendido":
      rutaImagen = "../Recursos/Esorpresa.png";
      break;
    case "enojado":
      rutaImagen = "../Recursos/Eenojado.png";
      break;
    case "triste":
      rutaImagen = "../Recursos/Etriste.png";
      break;
    case "asqueado":
      rutaImagen = "../Recursos/Easqueado.png";
      break;
    case "asustado":
      rutaImagen = "../Recursos/Easustado.png";
      break;
    default:
      rutaImagen = "../Recursos/Eneutral.png";
  }

  // Cambiar la imagen en la página
  expresionC.src = rutaImagen;
}

var emodect=0;

function cambiarImagen() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../PHP/readStates/nomenclatura.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.responseText);
      var ruta_imagen = response.ruta_imagen;
      var texto_parrafo = response.texto_parrafo;
      var activar_aviso = response.activar_aviso;

      // Cambiar la imagen en la página
      var imagen = document.getElementById("imagenH");
      imagen.src = ruta_imagen;
      // Actualizar el texto del párrafo
      var des_his = document.getElementById("des_his");
      des_his.innerHTML = texto_parrafo;
       // Mostrar el pop-up si está activado
       if (activar_aviso) {
        var popup = document.getElementById("avisa2");
        popup.style.display = "block";
        popup.style.opacity = 1;
        setTimeout(function () {
          popup.style.opacity = 1;
          popup.style.display = "none";
        }, 3000); // Mostrar durante 3 segundos
      }

    } else {
      
    }
  };

  // Enviar los datos de la variable
  xhttp.send("emocion=" + emociondetectada);
}
