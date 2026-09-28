<?php

function esLargo(int $numPaginas){
    if($numPaginas > 500){
        return true;
    } else {
        return false;
    }
}
$libro1 = esLargo(200);

echo $libro1;
