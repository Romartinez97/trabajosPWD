<?php

class Pelicula
{

    private $titulo;
    private $actores;
    private $director;
    private $guion;
    private $produccion;
    private $anio;
    private $nacionalidad;
    private $genero;
    private $duracion;
    private $restriccion;
    private $sinopsis;

    public function __construct($datos)
    {
        $this->titulo = $datos["titulo"];
        $this->actores = $datos["actores"];
        $this->director = $datos["director"];
        $this->guion = $datos["guion"];
        $this->produccion = $datos["produccion"];
        $this->anio = $datos["anio"];
        $this->nacionalidad = $datos["nacionalidad"];
        $this->genero = $datos["genero"];
        $this->duracion = $datos["duracion"];
        $this->restriccion = $datos["restriccion"];
        $this->sinopsis = $datos["sinopsis"];
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getActores()
    {
        return $this->actores;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getGuion()
    {
        return $this->guion;
    }

    public function getProduccion()
    {
        return $this->produccion;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getRestriccion()
    {
        return $this->restriccion;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function getMensajeRestriccion()
    {
        $mensaje = "";
        if ($this->restriccion == "todoPublico") {
            $mensaje = "Apta para todo público";
        } elseif ($this->restriccion == "mayores7") {
            $mensaje = "Apta para mayores de 7 años";
        } else {
            $mensaje = "Apta para mayores de 18 años";
        }
        return $mensaje;
    }

}