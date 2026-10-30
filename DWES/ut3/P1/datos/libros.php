<?php

declare(strict_types= 1);

use Aymenhadane\Biblioteca\Modelo\LibroDigital;
use Aymenhadane\Biblioteca\Modelo\LibroPapel;

$libros =[
    new LibroPapel("Dune","Frank Herbert", 412, 'ciencia', 2, null, false, ''),
    new LibroDigital("Solaris","Stainlaw Lem", 240, 'ciencia', 3,null, true, ''),
    new LibroPapel("El Hobbit","J. R. R. Tolkien", 310, 'fantasia', 1,null, false, ''),
    new LibroDigital("Drácula","Bram Stoker", 418, 'terror', 2, null, false, ''),
    new LibroPapel("Frankenstein","Marky Shelley", 280, 'terror', 2, null, false, ''),
    new LibroDigital("Terramar","Ursula L. Le Guin", 200, 'fantasia', 1, null, false, ''),
];