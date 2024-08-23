<?php

class Usuario
{

    private $usuario;
    private $clave;

    public function __construct($datos)
    {
        $this->usuario = $datos["usuario"];
        $this->clave = $datos["clave"];
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

}