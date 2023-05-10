const video = document.getElementById('video')
const eo = document.getElementsByClassName('s')

var variableNarrativa=1;

//---el arreglo
let emociones;
var emociondetectada="nada";


Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('../API/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('../API/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('../API/models'),
  faceapi.nets.faceExpressionNet.loadFromUri('../API/models')
]).then(startVideo)

function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}


video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()

    emocionesV = detections.map(face => face.expressions)
    if (emocionesV.length === 0) {
      console.log('No se ha detectado ninguna cara o emoción en el video')
    }else{
      emociones = [
        {
          "emocion": "feliz",
          "valor": detections[0].expressions.happy,
        },
        {
          "emocion": "neutral",
          "valor": detections[0].expressions.neutral,
        },
        {
          "emocion": "sorprendido",
          "valor": detections[0].expressions.surprised,
        },
        {
          "emocion": "enojado",
          "valor": detections[0].expressions.angry,
        },
        {
          "emocion": "triste",
          "valor": detections[0].expressions.sad,
        },
        {
          "emocion": "asqueado",
          "valor": detections[0].expressions.disgusted,
        },
        {
          "emocion": "asustado",
          "valor": detections[0].expressions.fearful,
        }
      ]

      
      let emocionesOrdenadas = emociones.sort((c1, c2) => (c1.valor < c2.valor) ? 1 : (c1.valor > c2.valor) ? -1 : 0);
      emociondetectada=emocionesOrdenadas[0].emocion;
   
      
    }


    
    
  
   


    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    faceapi.draw.drawDetections(canvas, resizedDetections)
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
    
  }, 100)
  
})

function cambiarImagen() {
  

  // Crear una instancia de XMLHttpRequest
  var xhttp = new XMLHttpRequest();

  // Configurar la solicitud HTTP POST al archivo PHP
  xhttp.open("POST", "../PHP/no.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Manejar la respuesta del archivo PHP
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
      // Obtener la ruta de la imagen desde la respuesta del archivo PHP
      var response = JSON.parse(this.responseText);
      var ruta_imagen = response.ruta_imagen;

      // Cambiar la imagen en la página
      var imagen = document.getElementById("imagen");
      imagen.src = ruta_imagen;
    }else{
      console.log("Buscando...00");
    }
  };

  // Enviar los datos de la variable id_imagen como un parámetro
  xhttp.send("emocion=" + emociondetectada);
}









