<?php
/* Ejercicio 1:
Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:
- En el nivel fácil se creará un personaje "Esqueleto".
- En el nivel difícil se creará un personaje "Zombi".
Debes aplicar el patrón de diseño Factory para la creación de los personajes. */

interface Habilidad{
    public function ataque();
    public function velocidad();
}
class Esqueleto implements Habilidad{
    public function ataque()
    {
        return "\nPatada nuclear |+20 Damage|";
    }

    public function velocidad()
    {
        return "\nPaso esquelético |+25 Speed|";
    }
}

class Zombie implements Habilidad{
    public function ataque()
    {
        return "\nMordida infestada |+70 Damage|";
    }

    public function velocidad()
    {
        return "\nBraaaains |+5 Speed|";
    }
}

class PersonajeFactory{
    public static function crearPersonaje($nivel){
        return match ($nivel){
            1 => new Esqueleto(),
            2 => new Zombie(),
            default => throw new Exception("\nNivel no encontrado"),
        };
    }
}

try{
    $nivel = 2;
    $personaje = PersonajeFactory::crearPersonaje($nivel);
    echo $personaje->ataque();
    echo $personaje->velocidad();
}catch(Exception $e){
    $e->getMessage();
}