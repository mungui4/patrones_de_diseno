<?php
/* 
Ejercicio 3:
Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator. */
interface Equipamento{
    public function tipoArma();
}

class Zombie implements Equipamento{
    public function tipoArma()
    {
        return "\nComo Zombie estás armado con Pistola";
    }
}

class Esqueleto implements Equipamento{
    public function tipoArma()
    {
        return "\n Como esqueleto estás usando bumeran";
    }
}

abstract class EquipamentoDecorador implements Equipamento{
    protected $equipamento;


    public function __construct(Equipamento $equipamento){
        $this->equipamento = $equipamento;        
    }

    public function tipoArma()
    {
        return $this->equipamento->tipoArma();
    }
}

class Equipamento1 extends EquipamentoDecorador{
    public function tipoArma()
    {
        return $this->equipamento->tipoArma() . "-escopeta";
    }
}

class Equipamento2 extends EquipamentoDecorador{
    public function tipoArma()
    {
        return $this->equipamento->tipoArma() . "-ametralladora";
    }
}

$zombie = new Zombie();
echo $zombie->tipoArma();

$zombieEquipamento1 =new Equipamento1($zombie);
echo $zombieEquipamento1->tipoArma();


$zombieEquipamento2 =new Equipamento2($zombieEquipamento1);
echo $zombieEquipamento2->tipoArma();

$esqueleto = new Esqueleto();
echo $esqueleto->tipoArma();

$esqueletoEquipamento1 = new Equipamento1($esqueleto);
echo $esqueletoEquipamento1->tipoArma();

$esqueletoEquipamento2 = new Equipamento2($esqueletoEquipamento1);
echo $esqueletoEquipamento2->tipoArma();