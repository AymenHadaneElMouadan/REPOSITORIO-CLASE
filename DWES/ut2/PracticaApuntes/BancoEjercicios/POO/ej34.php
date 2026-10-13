<?php
/*public final class Libro {
    public String titulo;
    public boolean disponible;
    public Libro(String titulo) {
        this.titulo = titulo;
        this.disponible = true;
    }  
    public void prestar() {
        this.disponible = false;
    }
}*/

final class Libro{
    public string $titulo;
    public bool $disponible;
    public function __construct(string $titulo, bool $disponible)
    {
        $this->titulo = $titulo;
        $this->disponible = $disponible;
    }
    public function prestar(){
        $this->disponible = false;
    }
}

$dune = new Libro('Dune', true);

echo($dune->disponible);

$dune->prestar();

echo($dune->disponible);

/* La principal que observamos es: Tanto PHP como JAVA utilizan this en los constructores 
sin embargo PHP utliza el ($) al principio del this, luego para indicar a que estamos señalando 
en el this en PHP se utiliza (->) y JAVA lo une con el punto, y por ultimo los constructores en 
PHP se tiene que indicar con (__consctuct) miesntras que en JAVA no hay que añadir nada mas, 
se trabajan como otro metodo.
*/
