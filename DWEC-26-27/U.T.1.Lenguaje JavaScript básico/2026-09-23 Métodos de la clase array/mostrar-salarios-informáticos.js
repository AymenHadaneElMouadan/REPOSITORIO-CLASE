import { empleados } from './empleados.js';

// function mostrarNombreCompleto(empleado){

//     return {
//         nombre : `{$empleado.nombre} ${empleado.apellido}`, 
//         salario : salarioBruto,
//     }   
// }


empleado =>({
        nombre : `{$empleado.nombre} ${empleado.apellido}`, 
        salario : salarioBruto,  
    })


const informaticos = empleados
    .filter(empleado => empleado.categoria === 'informatico')
    .map(empleado =>({
        nombre : `${empleado.nombre} ${empleado.apellido}`, 
        salario : empleado.salarioBruto,  
    }))

console.table(informaticos);

//.filter(({categoria}) => categoria === 'informatico')