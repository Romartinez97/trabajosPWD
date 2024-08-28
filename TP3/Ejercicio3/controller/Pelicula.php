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
    private $dir;
    private $arrayImagen;

    public function __construct($datos, $datosImagen)
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
        $this->arrayImagen = $datosImagen;
        $this->dir = "../files";
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

    public function getDir()
    {
        return $this->dir;
    }

    public function getArrayImagen()
    {
        return $this->arrayImagen;
    }

    public function setArrayImagen($arrayImagen)
    {
        $this->arrayImagen = $arrayImagen;
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

    public function revisarTipo()
    {
        $datosImagen = $this->getArrayImagen();
        $esValido = false;
        if (($datosImagen['type'] == "image/jpeg") || ($datosImagen['type'] == "image/png")) {
            $esValido = true;
        }
        return $esValido;
    }

    public function revisarTamanio()
    {
        $datosImagen = $this->getArrayImagen();
        $esValido = false;
        if ($datosImagen['size'] < 5000000) {
            $esValido = true;
        }
        return $esValido;
    }

    public function subirArchivo($tipo, $tamanio)
    {
        $datosImagen = $this->getArrayImagen();
        if ($tipo && $tamanio) {
            if (!copy($datosImagen['archivo']["tmp_name"], $this->getDir() . $datosImagen['archivo']["name"])) {
                $mensaje = "ERROR: no se pudo cargar el equipo, intente nuevamente";
            } else {
                $mensaje = 1;
            }
        } elseif ($tipo && !$tamanio) {
            $mensaje = "ERROR: el archivo excede el tamaño permitido (5MB)";
        } elseif (!$tipo && $tamanio) {
            $mensaje = "ERROR: el archivo no es de tipo JPG, JPEG o PNG";
        } else {
            $mensaje = "ERROR: el archivo no es de tipo JPG, JPEG o PNG, y excede el tamaño permitido (5MB)";
        }
        return $mensaje;
    }

    public function verArchivo()
    {
        $datosImagen = $this->getArrayImagen();

        if (isset($datosImagen["name"])) {
            $ruta = $this->getDir() . $datosImagen["name"];
            return $ruta;
        } else {
            echo "ERROR: La llave 'name' no está en la información de la imagen.";
            return null;
        }
    }
}