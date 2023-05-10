/* function cambioColor(){

  const enlace123= document.querySelectorAll(".menu a");
  const colores = ['#3FA9F5', '#F5CB00', '#FF1D25', '#FF931E', '#FF7BAC'];
  const color = colores[Math.floor(Math.random() * colores.length)];
  localStorage.setItem('color-de-fondo', color);
  enlace123.forEach((enlace,indiceAleatorio)=>{
   
    enlace.addEventListener("mouseover",()=>{
      enlace.style.color=color;
    })
    enlace.addEventListener("mouseout",()=>{
      if(indiceAleatorio!==4){
        enlace.style.color="white";
      }else{
        enlace.style.color="black";
      }
      
    })
  });
}

 */

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
      'url(../Recursos/bg4.jpg)'
    ];
    const indiceAleatorio = Math.floor(Math.random() * imagenes.length);
    localStorage.setItem('imagen-fondo', imagenes[indiceAleatorio]);
    document.documentElement.style.setProperty('--imagen-fondo', localStorage.getItem('imagen-fondo'));
    
  }

