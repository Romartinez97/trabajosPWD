<?php

class Operacion
{
    private $numero1;
    private $numero2;
    private $operacion;

    public function __construct($datos)
    {
        $this->numero1 = $datos["numero1"];
        $this->numero2 = $datos["numero2"];
        $this->operacion = $datos["operacion"];
    }

    public function getNumero1()
    {
        return $this->numero1;
    }

    public function getNumero2()
    {
        return $this->numero2;
    }

    public function getOperacion()
    {
        return $this->operacion;
    }

    public function realizarOperacion()
    {
        $numero1 = $this->numero1;
        $numero2 = $this->numero2;
        $operacion = $this->operacion;
        $resultado = "";
        switch ($operacion) {
            case "suma":
                $resultado = "$numero1 + $numero2 es igual a " . $numero1 + $numero2;
                break;
            case "resta":
                $resultado = "$numero1 - $numero2 es igual a " . $numero1 - $numero2;
                break;
            case "multiplicacion":
                $resultado = "$numero1" . " x " . "$numero2 es igual a " . $numero1 * $numero2;
                break;
            case "division":
                if ($numero1 >= $numero2) {
                    $resultado = "$numero1 / $numero2 es igual a " . $numero1 / $numero2;
                } else {
                    $resultado = "En una división, el divisor (segundo número) debe ser igual o menor que el dividendo (primer número).\n";
                }
                break;
        }
        return $resultado;
    }
}