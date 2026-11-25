import {DummyService} from "../services/dummy.service.js";

await setup();

async function setup(){
    const token = checkToken();
    const categoryId = extractCategoryFromUrl();
    if(categoryId){
        document.querySelector('#tH1Category').textContent = `Productos de la categoria ${}`
        try {
            const products = await (new DummyService()).retrieveProductsByCategory.retrieveProductsByCategory(token, categoryId, 0 , 3);
            renderProducts(products);
        } catch (error) {
            alert('Hay un problema: ' + error.message);
        }
    }else{

    }
}

function checkToken(){
    const encodedToken = window.localStorage.getItem('-token-2026-11-24');
    if (!encodedToken){
        alert('La sesion no es valida. Será redirigido a la pagina de inicio');
        window.location = './index.html';
        return;
    }

    // Actualizamos la cabecera mostrando el nombre del usuario

    return encodedToken;
}

function extractCategoryFromUrl(){
    const params = new URLSearchParams(window.location.search);
    const category = params.get('category');
    return category;
}

function renderProducts(products){
    const nTbody = document.querySelector('#tTabProducts>body');

    products.forEach(products => {
        nTbody.innerHTML += `
                <tr>
                    <td>${products.title}</td>
                    <td><img src="${products.thumbnail}"></td>
                    <td><input type="checkbox" data-product="${products.id} id="tChk${products.id}"></td>
                </tr>
            `;

        document.querySelector(`#tChk${product.id}`).addEventListener('change', productClickedHandler);
        
        function productClickedHandler(e){
            const Checkbox = e.target.dataset.productId;
            const productID = e.target.dataset.productId;
            if(nCheckbox.chcked){
                const carl = window.localStorage.getItem('cart');
                if(!cart) cart = [];
                cart.push(productId);
                window.localStorage.setItem('cart',JSON.stringify(cart));
            }
        }
    });
}