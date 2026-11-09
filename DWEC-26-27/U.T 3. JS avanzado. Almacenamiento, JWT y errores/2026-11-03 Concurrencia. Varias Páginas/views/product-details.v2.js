import { DummyService } from "../services/dummy-service";

await showProductNameInTitle();
    async function showProductNameInTitle(){
    const params = new URLSearchParams(window.location.search);
    const productId = params.get('product');

    const service = new DummyService();
    const product = service.getProductById(productId);
    console.log(product);

    document.querySelector('tH2Producto').textContent = product.title;
}

async function showDetails(){
    const productId = parseInt(window.localStorage.getItem('product-id'));

    const service = new DummyService();
    const product = await service.getProductById(productId);
    
    const productAsString = JSON.stringify(product);
    window.localStorage.setItem('product', )
}