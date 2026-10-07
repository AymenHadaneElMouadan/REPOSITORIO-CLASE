import { vehicles } from './data.js';

anadirCochesAlDeplegable();
function anadirCochesAlDeplegable(){

    const nSelect = document.getElementById("tSlctVehicle");
    nSelect.addEventListener('change', mostrarFoto);

    for (const vehicle of vehicles){
        const nOption = document.createElement("option");
        nSelect.appendChild(nOption);
        nOption.setAttribute('value', `${vehicle.key}`);

        const nText = document.createTextNode(vehicle.model);    
        nOption.appendChild(nText);

    }

}
function mostrarFoto(e){
    //console.log(e);
    const nImg = document.getElementById("tIMG");
    
    const nSelect = e.target;
    const vehicleKey = nSelect.value;
    console.log(vehicleKey);

    const vehicle = vehicles.find(vehicle => vehicle.key === vehicleKey);
    nImg.setAttribute('src', `./photos/${vehicle.photo}`)
    


}
