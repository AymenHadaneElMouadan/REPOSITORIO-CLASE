<?php

declare(strict_types= 1);

use Aymenhadane\Biblioteca\Modelo\LibroDigital;
use Aymenhadane\Biblioteca\Modelo\LibroPapel;

$libros =[
    new LibroPapel("Dune","Frank Herbert", 412, 'ciencia', 2),
    new LibroDigital("Solaris","Stainlaw Lem", 240, 'ciencia', 3),
    new LibroPapel("El Hobbit","J. R. R. Tolkien", 310, 'fantasia', 1),
    new LibroDigital("Drácula","Bram Stoker", 418, 'terror', 2),
    new LibroPapel("Frankenstein","Marky Shelley", 280, 'terror', 2),
    new LibroDigital("Terramar","Ursula L. Le Guin", 200, 'fantasia', 1),
];