<?php

class Producto
{
    private $idproducto;
    private $pronombre;
    private $prodetalle; 

    private $procantstock;
    private $progenero;
    private $proprecio;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idproducto = "";
        $this->pronombre = "";
        $this->prodetalle = "";
        $this->procantstock = "";
        $this->progenero = "";
        $this->proprecio = "";
        $this->mensajeoperacion = "";
    }

    public function setear($idproducto, $pronombre, $prodetalle, $procantstock, $progenero, $proprecio)
    {
        $this->setidproducto($idproducto);
        $this->setpronombre($pronombre);
        $this->setprodetalle($prodetalle);
        $this->setprocantstock($procantstock);
        $this->setprogenero($progenero);
        $this->setproprecio($proprecio);
    }

    //metodos de acceso

    public function getidproducto()
    {
        return $this->idproducto;
    }
    public function setidproducto($param)
    {
        $this->idproducto = $param;
    }

    public function getpronombre()
    {
        return $this->pronombre;
    }
    public function setpronombre($param)
    {
        $this->pronombre = $param;
    }

    public function getprodetalle()
    {
        return $this->prodetalle;
    }
    public function setprodetalle($param)
    {
        $this->prodetalle = $param;
    }

    public function getprocantstock()
    {
        return $this->procantstock;
    }
    public function setprocantstock($param)
    {
        $this->procantstock = $param;
    }

    public function getprogenero()
    {
        return $this->progenero;
    }
    public function setprogenero($param)
    {
        $this->progenero = $param;
    }

    public function getproprecio()
    {
        return $this->proprecio;
    }
    public function setproprecio($param)
    {
        $this->proprecio = $param;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($param)
    {
        $this->mensajeoperacion = $param;
    }
/*
    public function getLibroAutor()
    {
        if (preg_match('/Autor:\s*([^;]+)/', $this->prodetalle, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }

    public function getLibroGenero()
    {
        if (preg_match('/Género:\s*([^;]+)/', $this->prodetalle, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }

    public function getLibroPrecio()
    {
        if (preg_match('/Precio:\s*([^;]+)/', $this->prodetalle, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }
*/
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM producto WHERE idproducto = " . $this->getidproducto();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['progenero'], $row['proprecio']);
                    $resp = true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        } else {
            $this->setmensajeoperacion("producto->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "INSERT INTO producto (idproducto, pronombre, prodetalle, procantstock, progenero, proprecio)
                VALUES ('" . $this->getidproducto() . "', '" . $this->getpronombre() . "', '" . $this->getprodetalle() . "', '" . $this->getprocantstock() . "', '" . $this->getprogenero() . "', '" . $this->getproprecio() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE producto SET
            pronombre='" . $this->getpronombre() . "', prodetalle='" . $this->getprodetalle() . "', procantstock='" . $this->getprocantstock() . "', progenero='" . $this->getprogenero() . "', proprecio='" . $this->getproprecio() . "' WHERE idproducto='" . $this->getidproducto() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "DELETE FROM producto WHERE idproducto=" . $this->getidproducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM producto ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Producto();
                    $obj->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['progenero'], $row['proprecio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("producto->listar: " . $base->getError());
        }
        return $arreglo;
    }
}