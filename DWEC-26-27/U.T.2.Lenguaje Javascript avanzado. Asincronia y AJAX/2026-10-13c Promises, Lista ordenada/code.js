
const url = 'https://pokeapi.co/api/v2/pokemon';
const response = await fetch(url);
const data = await response.json();

const pokemons = data.results;

const nOl = document.getElementById('eOl');

for(const pokemon of pokemons){    
    const nLi = document.createElement('li');
    nOl.appendChild(nLi);
    nLi.textContent = pokemon.name;
    const eAEnlace = document.createElement('a');
    nLi.appendChild(eAEnlace);
    eAEnlace.setAttribute('href', pokemon.url)
}