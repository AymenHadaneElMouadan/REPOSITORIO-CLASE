export class CategoryDTO{
    #slug;
    #name;

    constructor(slug, name, url){
        this.#slug = slug;
        this.#name = name;
    }

    get slug(){
        return this.#slug;
    }
    get name(){
        return this.#name;
    }
}

export class DummyService {
    static BASE_URL = '';
    
    async getCategorie(){
        try{
            const url = DummyService.BASE_URL + 'categories';
            const response = await fetch(url);
            const data = await response.json();
            if (!data.ok){
                throw new DummyServiceError('No puedo recuperar las categorias', error.message, 'getCategorias')
            }
            /* const categories = data.map(categoryDto => new CategoryModel(categoryDto.slug, categoryDto.name)); */
            const categories = data.map(({slug, name}) => new CategoryModel(slug, name));   
        } catch (error){
            throw new DummyServiceError('No puedo recuperar las categorias', error.message, 'getCategorias');
        }

    }
}

export class DummyServiceError extends Error {
    constructor(message, cause , method){
        super(`[DummyServiceError ${method}]: ${message}. ${cause}`);
    }
}