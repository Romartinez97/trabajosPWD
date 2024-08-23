<?php

class Cliente
{

    private $edad;
    private $estudiante;

    public function __construct($datos)
    {
        $this->edad = $datos["edad"];
        if (!empty($datos["estudiante"])) {
            $this->estudiante = true;
        } else {
            $this->estudiante = false;
        }
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getEstudiante()
    {
        return $this->estudiante;
    }

    public function calcularPrecio()
    {
        $edad = $this->getEdad();
        $esEstudiante = $this->estudiante;
        $precio = 300;
        if ($edad < 12) {
            $precio = 160;
        } else {
            if ($esEstudiante) {
                $precio = 180;
            }
        }
        return $precio;
    }

}