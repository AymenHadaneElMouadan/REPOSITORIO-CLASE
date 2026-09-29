'use strict'; //obliga a declarar las variables

//4 Fromas de declarar las variables
//edad1 = 10; // variable global          0%
var edad2 = 12; // forma antigua        1%
const edad4 = 14; //forma moderna ES6   95%


{
    let edad3 = 13; //forma moderna ES6     4%
    console.log(edad3);

    console.log(edad2);
    {
        let edad5 = 15;
        console.log(edad5);
        console.log(edad2);
    }

    //console.log(edad5);
}

//console.log(edad3); //Error, ya que la variable edad3 no es visible fuera del bloque
console.clear();

testAmbito();


function testAmbito(){
    var edad;
    
    for (let i=1; i<=3; i++){
        console.log(i, edad)
    }

    var edad = 10; // hoisting
    console.log(edad);

}