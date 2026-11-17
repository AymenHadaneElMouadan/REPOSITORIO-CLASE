import { AuthorizationService } from "../services/authorization.service";

const token = window.localStorage.getItem('token-2026-11-17');

if(!token){
    alert('Usted no ha iniciado sesion. Será dirigido a la pagina de inicio')
    window.location = './index.html';    
}

const service = new AuthorizationService();
const categories = await service.retrieveCategories(token);

const nDivCategories = document.querySelector('#');
for (const category of categories){
    const nCheckbox = nDivCategories.appendChild(document.createElement('input'));
    nCheckbox.type = 'checkbox';
    nCheckbox.value = category.slug;
    nCheckbox.id = `tChk${category.slug}`;

    const nLabel = nDivCategories.appendChild(document.createElement('label'));
    nLabel.for = `tChk${category.slug}`;
    nLabel.textContent = category.name;

    nDivCategories.appendChild
}