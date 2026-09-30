<?php

$diasRestraso = 7;

if($diasRestraso <= 0){
        echo 'Sin Retraso';
    }elseif($diasRestraso > 1){
        echo 'Retraso Leve';
    }elseif($diasRestraso > 7){
        echo 'Retraso Grave';
    }else
        echo 'Bloque Temporal';

