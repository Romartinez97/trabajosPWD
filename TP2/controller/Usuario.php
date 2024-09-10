<?php

class Usuario
{

    private $usuarios;

    public function __construct()
    {
        $this->usuarios = [
            ["usuario" => "pedro182", "clave" => "12345678a"],
            ["usuario" => "usuarioGenerico", "clave" => "c0ntraseña"],
            ["usuario" => "ISSPEED", "clave" => "applejuice98"],
            ["usuario" => "Laura", "clave" => "pedcoNeuquen8"],
        ];
    }

    public function ingreso($datos)
    {
        $usuarios = $this->usuarios;
        $user = $datos['usuario'];
        $pass = $datos['contrasenia'];
        $i = 0;
        $userEncontrado = null;
        while ($i < count($usuarios) && $userEncontrado == null) {
            if ($user == $usuarios[$i]['usuario'] && $pass == $usuarios[$i]['clave']) {
                $userEncontrado = $usuarios[$i]['usuario'];
            } else {
                $i++;
            }
        }
        return $userEncontrado;
    }
}