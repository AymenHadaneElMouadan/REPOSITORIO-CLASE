import { empleados } from './empleados.js';

console.clear();
console.log('Numero de empleados: ', empleados.length)

function mostrarNombreCompleto(empleado, i, empleados) {
    console.log(i, `${empleado.nombre} ${empleado.apellido}`);
};

empleados.forEach(mostrarNombreCompleto);

function esInformatico(empleado, i, array){
    if(empleado.categoria === 'informatico')
        return true;
    else
        return false;
}

const informaticos = empleados.filter(esInformatico);
console.clear();
console.log('Numero de informaticos:', informaticos.length);

//Devuelve todos los administrativos con los ojos azules
function esAdministrativo(empleado) {
    return empleado.categoria === 'administrativo'; 
}

function tieneOjosAzules (empleado) {
    return empleado.colorOjos === 'azul'
}

const administrativosDeOjosAzules = empleados
    .filter(esAdministrativo)
    .filter(tieneOjosAzules);

console.clear();
console.log('Número de administrativos con ojos azules.', administrativosDeOjosAzules.length)