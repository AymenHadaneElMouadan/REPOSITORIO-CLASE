export class Category {
    #id;
    #name;

    constructor(id, name){
        this.#id = id;
        this.#name = name;
    }

    get id(){
        return this.#id;
    }
    get name(){
        return this.#name;
    }

    set name(value){
        return this.#name
    }
    
}