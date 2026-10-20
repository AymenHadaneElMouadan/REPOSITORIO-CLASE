<?php
declare(strict_types=1);

// TODO M4. Implementa la base abstracta Juego y las operaciones del préstamo.
abstract class Juego implements Prestable {
    use GenerarEtiqueta;
    private int $id;
    private string $nombre;
    private bool $prestado;
    private int $dias;
    function __construct(int $id, string $nombre)
    {       
        if($id >= 0){
           throw new InvalidArgumentException('Id Incorrecto');
        }elseif($nombre === ''){
            throw new InvalidArgumentException('Nombre Incorrecto');
        }else{
            $this->id = $id;
            $this->nombre = trim($nombre);
        }
    }

    public function id(): int{
        return $this->id;
    }
    public function nombre(): string{
        return $this->nombre;
    }
    public function prestado(): bool{
        return $this->prestado;
    }
    public function dias(): int{
        return $this->dias;
    }

    public abstract function plazoMaximo(): int;

    public function ficha(): string{
        return $this->etiqueta()."·".$this->prestado()."· Dias: ".$this->dias();
    }
    
    #[Override]
    public function prestar(int $dias): void
    {
        if($dias <= 0){
            throw new InvalidArgumentException('Numero de dias invalido');
        }else{
            if($this->prestado() === true){
                throw new PrestamoException('El juego ya esta prestado');
            }
            elseif($this->plazoMaximo() < $this->dias()){
                throw new PrestamoException('Plazo maximo suprado');
            }
            else{
                $this->dias === true;
                $this->dias + $dias;
            }
        }
    }

    #[Override]
    public function renovar(int $diasExtra): void
    {
        if($diasExtra <= 0){
            throw new InvalidArgumentException('Numero de dias invalido');
        }else{
            if($this->prestado() === false){
                throw new PrestamoException('El juego no está prestado');
            }
            elseif($this->plazoMaximo() < $this->dias() + $diasExtra){
                throw new PrestamoException('Plazo maximo superado');
            }
            else{
                $this->dias === true;
                $this->dias + $diasExtra;
            }
        }
    }
    #[Override]
    public function devolver(): void
    {
        if($this->prestado() === false){
            throw new PrestamoException('El juego no esta prestado');
        }else{
            $this->prestado === false;
            $this->dias === 0;
        }
    }
    
}