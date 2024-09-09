<?php

class Persona
{

    private $nombre;
    private $apellido;
    private $edad;
    private $direccion;
    private $nivelEstudios;
    private $sexo;
    private $deportesPracticados;

    public function __construct($datos)
    {
        $this->nombre = $datos["nombre"];
        $this->apellido = $datos["apellido"];
        $this->edad = $datos["edad"];
        $this->direccion = $datos["direccion"];
        $this->nivelEstudios = $datos["nivelEstudios"];
        $this->sexo = $datos["sexo"];
        if (!empty($datos["deportes"])) {
            $this->deportesPracticados = $datos["deportes"];
        } else {
            $this->deportesPracticados = [];
        }
        ;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getNivelEstudios()
    {
        return $this->nivelEstudios;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function mayorEdad()
    {
        $edad = $this->edad;
        $mensaje = "";
        $edad < 18 ? $mensaje = "soy menor de edad" : $mensaje = "soy mayor de edad";
        return $mensaje;
    }

    public function mensajeNivelEstudios()
    {
        $nivelEstudios = $this->nivelEstudios;
        $mensaje = "";
        if ($nivelEstudios == "sinEstudios") {
            $mensaje = "No tengo estudios";
        } elseif ($nivelEstudios == "estudiosPrimarios") {
            $mensaje = "Tengo estudios primarios";
        } else {
            $mensaje = "Tengo estudios secundarios";
        }
        return $mensaje;
    }

    public function mostrarDeportes()
    {
        $deportes = $this->deportesPracticados;
        $mensaje = "";
        for ($i = 0; $i < count($deportes); $i++) {
            $mensaje .= "<br>" . ucfirst($deportes[$i]);
        }
        return $mensaje;
    }

    public function totalDeportes()
    {
        $deportes = $this->deportesPracticados;
        $cantDeportes = 0;
        for ($i = 0; $i < count($deportes); $i++) {
            $cantDeportes++;
        }
        return $cantDeportes;
    }

}