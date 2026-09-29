'use strict';


var nombre = "Aymen";
var apellidos = 'Hadane El Mouadan';
var poblacion = `Lorca`;
var pais = 'España';
var edad = 20;

var mensaje1 = 'Hola, soy ' + nombre + ' ' + apellidos + '. Vivo en ' + poblacion + '. Nací en ' + pais + '. Tengo ' + edad + ' años';
console.log(mensaje1);

//Interpolacion de cadenas

var mensaje2 = `Hola, soy ${nombre} ${apellidos}. Vivo en ${poblacion}. Naci en ${pais}. Tengo ${edad} años`;
console.log(mensaje2);

var mensaje3 = `Hola, soy ${nombre + ' ' + apellidos}. 
\tVivo en ${poblacion}. 
\nNaci en ${pais}. 
Tengo ${edad + 1} años
Soy ${edad <18 ? 'menor' : 'mayor'} de edad.`; // operador ternario
console.log(mensaje3);