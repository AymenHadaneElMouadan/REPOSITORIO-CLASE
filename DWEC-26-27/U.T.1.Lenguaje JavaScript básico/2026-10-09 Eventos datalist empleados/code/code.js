import {empleados} from './empleados.js'

llenarListaEmpleados(empleados);
configurarEmpleadoCambiado();

function llenarDetalleEmpleado(e){
    const eText = e.target;
    const dniEmpleado = parseInt(eText.value);
    //const empleado = empleados.find(empleado => empleado.dni === dni);
    //document.getElementById('eTxtNombre').setAttribute('value', empleado.nombre );
    //document.getElementById('eTxtApellido').setAttribute('value', empleado.apellido);
    //document.getElementById('eTxtEdad').setAttribute('value', empleado.edad);
    //document.getElementById('eTxtCategoria').setAttribute('value', cempleado.ategoria);
    //document.getElementById('eTxtSalario').setAttribute('value', empleado.salarioBruto);

    const {nombre, apellido, edad, categoria, salarioBruto: salario} = empleados.find( ({dni}) => dni === dniEmpleado);
    document.getElementById('eTxtNombre').setAttribute('value', nombre );
    document.getElementById('eTxtApellido').setAttribute('value', apellido);
    document.getElementById('eTxtEdad').setAttribute('value', edad);
    document.getElementById('eTxtCategoria').setAttribute('value', categoria);
    document.getElementById('eTxtSalario').setAttribute('value', salario);

    eText.value = `${nombre} ${apellido}`;
}

function configurarEmpleadoCambiado(){
    const nText = document.getElementById('eTxtEjemplos');
    nText.addEventListener('change', llenarDetalleEmpleado);
}

/**
 * @param { [{dni: number, nombre: string, apellido: string, }] } empleados El arreglo de empleados. 
 * @returns {undefined}
 *  
 */
function llenarListaEmpleados() {
    const nDataList = document.getElementById('eDtlsEmpleados');

    empleados.forEach( empleado => {
        const nOption = document.createElement('option');
        nDataList.appendChild(nOption);
        nOption.setAttribute('value', `${empleado.dni}`);
        nOption.setAttribute('label', `${empleado.nombre} ${empleado.apellido}`);
    });
}
