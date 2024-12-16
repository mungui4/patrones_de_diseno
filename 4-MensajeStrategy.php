<?php
/* Ejercicio 4:
Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT. Debes crear un programa donde se muestren todos estos tipos de salidas.
Para este propósito, aplica el patrón de diseño Strategy. */
interface Formato{
    public function texto();
}


class Consola implements Formato{
    public function texto()
    {
        return "\nEstás mostrando en Consola";
    }
}

class Json implements Formato{
public function texto()
{
    return "\nEstás mostrando en Json";
}

}

class Txt implements Formato{
    public function texto()
    {
        return "\nEstás mostrando en Txt";
    }
}

class Salida{
    private Formato $formato;
    public function setFormato (Formato $formato)
    {
        
        $this->formato = $formato;
    }
    public function mostrarFormato(){
        echo $this->formato->texto();
    }
}

$salida = new Salida();

$salida->setFormato(new Consola());
$salida->mostrarFormato();

$salida->setFormato(new Json());
$salida->mostrarFormato();


$salida->setFormato(new Txt);
$salida->mostrarFormato();