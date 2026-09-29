'use strict'

console.clear();

function mostrarMensaje(    
    nombre = 'Adolfo', 
    apellidos = 'Martin González', 
    poblacion = 'Lorca', 
    pais = 'España'
) {
    console.log(`Hola, soy ${nombre} ${apellidos}. Vivo en ${poblacion} y naci en ${pais}`);

}

mostrarMensaje();
mostrarMensaje('Maria', 'Sánchez López');
mostrarMensaje(undefined, 'Pérez Giménez', undefined, 'Francia');
mostrarMensaje('Pepe', 15);

mostrarMensaje(nombre = 'Gunter', pais = 'Alemania');
