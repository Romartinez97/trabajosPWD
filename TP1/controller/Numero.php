<?php

class Numero
{
    private $num;
    public function __construct($datos)
    {
        $this->num = $datos["numIngresado"];
    }

    public function getNumero()
    {
        return $this->num;
    }

    public function devolverSigno()
    {
        $mensaje = "";
        $numero = intval($this->num);

        if ($numero > 0) {
            $mensaje = "El número (" . $numero . ") es positivo.";
        } elseif ($numero < 0) {
            $mensaje = "El número (" . $numero . ") es negativo.";
        } else {
            $mensaje = "El número es cero.";
        }

        return $mensaje;
    }
}