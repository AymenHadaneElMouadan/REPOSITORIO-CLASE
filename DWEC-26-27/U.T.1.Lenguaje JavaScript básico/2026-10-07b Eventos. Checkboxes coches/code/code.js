import { vehicles } from './data.js';

crearCheckBox();
function crearCheckBox(){

    const nDiv = document.getElementById("nDiv");

    for (const vehicle of vehicles){
        const nInput = document.createElement("input");
        nInput.setAttribute("type", "checkbox")
        nInput.setAttribute("id", `tChk${vehicle.key}`)
        nInput.setAttribute("value", `tChk${vehicle.key}`)
        nDiv.appendChild(nInput);
    
        const nLabel = document.createElement("label");
        nLabel.setAttribute("for", `tChk${vehicle.key}`);
        nDiv.appendChild(nLabel);


        const nTexto = document.createTextNode(vehicle.model);
        nLabel.appendChild(nTexto);
    }
}

function mostrarEnTabla(){
    const nTabla = getElementById("nTab");
    const nTBody = getElementById("nBod");
    nTabla.appendChild(nTBody);
    for(const vehicle of vehicles){
        const nTr = document.createElement("tr");
        nTBody.appendChild(nTr) 
        const nTd = document.createElement("td");
        nTr.appendChild(nTd) 
        const nNombre = document.createTextNode(vehicle.model)
        nTd.appendChild(nNombre);
    }
}