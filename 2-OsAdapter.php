<?php
/* Ejercicio 2:
Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. Al compartir archivos como Word, Excel, Power Point, surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos archivos independientemente de que sean de versiones anteriores.
Para ello, aplica el patrón de diseño Adapter. */

interface CompartirArchivo{
    public function compartirVersion7($nombre);
}

class Windows7 implements CompartirArchivo{
    public function compartirVersion7($nombre)
    {
        echo "\nSe está compartiendo: {$nombre}";
    }
}

class Windows10{
    public function compartirVersion10($nombre){
        echo "\nSe está compartiendo: {$nombre}";
    }
}

class Windows10Adapter implements CompartirArchivo{
    private $windows10;

    public function __construct(Windows10 $windows10){
        $this->windows10 = $windows10;
         
    }
    public function compartirVersion7($nombre)
    {
        $this->windows10->compartirVersion10($nombre);
    }
}

$version7 = new Windows7();
echo $version7->compartirVersion7("CarlosDuti.exe");

$windows10Adapter = new Windows10Adapter(new Windows10());
$windows10Adapter->compartirVersion7("GTA");