<?php

$a = (5 == "5"); /**True*/
$b = (5 === "5");/**False*/

/** La diferencia es que ( == ) tiene en cuenta solo el contenido  
 * y no es tan esctricto con el tipo de variable que es mientras que ( === ) si lo es*/

$c = (10 > 5 && 3 < 2);/**False*/
$d = !$b || $c; /**True*/
