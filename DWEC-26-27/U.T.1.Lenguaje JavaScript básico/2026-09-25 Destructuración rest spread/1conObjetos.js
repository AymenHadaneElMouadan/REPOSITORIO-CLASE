// desestructurar nos permite extraer a mas de una variable partes de un objeto complejo en una única linea
console.clear()
const person = {
    firstname: 'Adolfo',
    lastname: 'Martin',
    age: 36,
    eyes: 'Green',
    height: 195,
    weight: 84,
}

//const height = person.height;
//const weight = person.weight;

//Desestructuración de objetos

const { height, weight } = person;
console.log(height, weight);

const { height: altura, weight: masa } = person;
console.log(altura, masa);

//Operador rest ... permite guardar en una variable todas las variables en una sola

const { firstname, eyes, ...rest } = person;
console.log(firstname, eyes, rest);

console.clear();
//Operador spread ... permite descomponer un elemento en todas sus partes
const teacher = { ...person, subjects: ['dwec', 'diw'], deaprtamento: 'tic' };
console.log(teacher);

// function getFullName(person) {
//     return `${person.firstname} ${person.lastname}`;
// }

function getFullName({ firstname, lastname }) {
    return `${firstname} ${lastname}`;
}


console.log(getFullName(person));

function conseguirMasaCorporal({ heigth: altura, weight: masa }) {
    return masa / Math.pow(altura / 100, 2);
}
