import { Category } from '../models/category.model.js';

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
    static BASE_URL = 'https://dummyjson.com/products/';
    
    async getCategories(){
        try{
            const url = DummyService.BASE_URL + 'categories';
            const response = await fetch(url);
            const data = await response.json();
            if (!response.ok){
                throw new Error(response.statusText);
            }
            const categories = data.map(({slug, name}) => new Category(slug, name));
            const promises = categories.map(category =>)
            return categories;
        } catch (error){
            throw new DummyServiceError('No puedo recuperar las categorias', error.message, 'getCategorias');
        }

    }
    async getProductById(productId){
        try{
            const url = DummyService.BASE_URL + 'cateogry/' + productId;
            const response = await fetch(url);
            if(!response.ok){
                throw new Error(response.statusText);
            }
            const data = await response.json();
            return data;
        } catch (error) {
            throw new DummyServiceError('No puedo recuperar las categorias', error.message, 'getCategories');
        }
    }
}

export class DummyServiceError extends Error {
    constructor(message, cause , method){
        super(`[DummyServiceError ${method}]: ${message}. ${cause}`);
    }
}