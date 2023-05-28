const video = document.getElementById("video");
const textHistoria = document.getElementsByClassName("des_his");

// Obtener el elemento del div
const mensajeDiv = document.getElementById("avisa");
const msj = document.getElementById("textoA");
var imagen = document.getElementById("ninoA");

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
  navigator.getUserMedia(
    { video: {} },
    (stream) => (video.srcObject = stream),
    (err) => console.error(err)
  );
}

video.addEventListener("play",() => {
  const canvas = faceapi.createCanvasFromMedia(video);
  document.body.append(canvas);
  const displaySize = { width: video.width, height: video.height };
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

      msj.textContent = "No se está detectando tu expresión.";
  
      mensajeDiv.style.opacity = 1;

 //console.log("No se ha detectado ninguna cara o emoción en el video");
    } else {
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
    }
  }, 100);
});

function cambiarImagen() {

  var xhttp = new XMLHttpRequest();


  xhttp.open("POST", "../PHP/readStates/nomenclatura.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      var response = JSON.parse(this.responseText);
      var ruta_imagen = response.ruta_imagen;
      var texto_parrafo = response.texto_parrafo;

      // Cambiar la imagen en la página
      var imagen = document.getElementById("imagenH");
      imagen.src = ruta_imagen;
      // Actualizar el texto del párrafo
      var des_his = document.getElementById("des_his");
      des_his.innerHTML = texto_parrafo;
    } else {
    }
  };

  // Enviar los datos de la variable
  xhttp.send("emocion=" + emociondetectada);
}

