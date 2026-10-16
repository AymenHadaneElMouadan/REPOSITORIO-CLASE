const categorias = await retrieveCategorias();
categoriasLista(categorias);


async function retrieveCategorias (){
    const url = 'https://dummyjson.com/products/categories'
    const response = await fetch(url);
    const data = await response.json();
    return data;
}


function categoriasLista(categorias){
    const nSelect = document.getElementById('tSelect');
    nSelect.addEventListener('change', mostrarProductosDeLaCategoria);

    for(const categoria of categorias){

        const nOption = document.createElement('option');
        nSelect.appendChild(nOption);
        nOption.setAttribute('value', categoria.slug);
        nOption.textContent = categoria.name;
    }
}

async function mostrarProductosDeLaCategoria(e){
    const nSelect = e.target;
    const categoriaId = nSelect.value;

    const productos = await recuperarProductosDeLaCategoria(categoriaId);

    const nSection = document.getElementById('tSection');
    nSection.innerHTML = '';
    for(const producto of productos){    
        const nArticle = document.createElement('article');
        nSection.appendChild(nArticle);

        const nHeader = document.createElement('header');
        nArticle.appendChild(nHeader)
        nHeader.textContent = producto.title

        const nImage = document.createElement('img');
        nArticle.appendChild(nImage);
        nImage.setAttribute('src', producto.image[0])


    }  
}

async function recuperarProductosDeLaCategoria(categoriaId){
    const url = 'https://dummyjson.com/products/category/'+categoriaId;
    const response = await fetch(url);
    const data = await response.json();
    return data.products;
}



