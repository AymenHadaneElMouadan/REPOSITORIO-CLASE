import { empleados } from "./empleados.js";

// mapear es cambiar cada elemento del array por otro elemento
const obtenerNombreCompleto = (empleado) => `${empleado.nombre} ${empleado.apellido}`;

const nombres = empleados.map(obtenerNombreCompleto);
console.log(nombres);
console.log(nombres.length);


function obtenerNombreYSalario(empleado) {
    return {nombre: empleado.nombre, 
            salario: empleado.salarioBruto
    };
}

const nombreYsalarios = empleados.map(obtenerNombreYSalario);
console.clear();
console.log(nombreYsalarios);

// Mostrar nombre y correo electrónico de los gerentes
console.clear();
const nombreYCorreo = empleado=> ({nombre: empleado.nombre, correo: empleado.correoElectronico})
const esGerente = empleado => empleado.categoria === 'gerente'


const gerentes = empleados
    .filter(esGerente)
    .map(nombreYCorreo)
    .sort();

console.table(gerentes)