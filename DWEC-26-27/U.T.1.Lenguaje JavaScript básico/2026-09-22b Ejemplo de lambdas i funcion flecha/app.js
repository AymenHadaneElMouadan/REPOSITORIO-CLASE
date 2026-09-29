'use strict'

//1. Le quitamos el nombre
//2. Le ponemos la flecha entre el parentesis y la llave
//3. Quitamos la palabra reservada function
//4. Si la función tiene un único parametro podemos quitar los paréntesis
//5. Si la función tiene una única linea de código, podemos quitar las llaves y el punto y coma 
//6. Si la función tiene una única linea de código, subimos la linea 
//7. Si no hay llaves y hay un return, quitamos el return 

//Solucion 1
const calcularFactorial2 = numero=>{
    if (numer === 1){
        return 1;
    }else{
        return numero * calcularFactorial(numero - 1);
    }
}
console.log(calcularFactorial(1));
console.log(calcularFactorial(2));
console.log(calcularFactorial(5));
console.log(calcularFactorial(100
));

//Solución 2
const calcularFactorial3 = numero => numero === 1 ?  1:numero * calcularFactorial(numero - 1) 

