//AJAX => Asynchronous JavaScript And XML

//const response = fetch('https://pokeapi.co/api/v2/pokemon');

// fetch('https://pokeapi.co/api/v2/pokemon')
    //.then(response => response.json())
    //.then(data => console.log(data))
    //.catch(error => console.error(error));
    

//fetch('https://pokeapi.co/api/v2/pokemon')
    //.then(response => response.json())
    //.then(data => console.log(data));


//console.log('fin');

// FORMA MODERNA. async/await

// Una funcion asincrona devuelve una promesa
async function retrievePokemons(){
    const response = await fetch('https://pokeapi.co/api/v2/pokemon');
    const data = await response.json();
    return data;
}

const data = retrievePokemons();
console.log(data);
console.log('FIN');