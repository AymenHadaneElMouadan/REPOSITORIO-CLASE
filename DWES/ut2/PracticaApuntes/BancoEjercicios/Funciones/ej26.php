<?php
function mostrar(mixed $valor): string{
    if(is_bool($valor)){
        return $valor ? 'true' : 'false';
    }
    
    return (string) $valor;
}

echo mostrar(true)."\n";

echo mostrar(42)."\n";

echo mostrar('Dune')."\n";


// No debe sustituirlo ya que al permitir cualquier tipo de dato, puede generar errores 
//en el codigo si se requiere de un tipo de dato específico