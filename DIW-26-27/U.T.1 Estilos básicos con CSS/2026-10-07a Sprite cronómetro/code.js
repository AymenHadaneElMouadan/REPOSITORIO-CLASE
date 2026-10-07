let posicionActual = -810;

const nDivNumero = document.getElementById('eDivNumero');
const nDivNumero2 = document.getElementById('eDivNumero2');


// Ejecuta la funcion indicada de forma indefinida segun los milisegundos indicados
setInterval(
    function(){
    // Puedo acceder al CSS desde JavaScript usando la propiedad style de la etiqueta, 
    nDivNumero.style.backgroundPositionX = `${posicionActual}px`;
        if(posicionActual !== 0){
            posicionActual = posicionActual + 1.4125;
        }
    },
    15.75
    
);
setInterval(
    function(){
    // Puedo acceder al CSS desde JavaScript usando la propiedad style de la etiqueta, 
    nDivNumero2.style.backgroundPositionX = `${posicionActual}px`;
        if(posicionActual !== 0){
            posicionActual = posicionActual + 90;
        }
    },
    8000
    
);
