<?php

class Compra
{
    private $idcompra;
    private $cofecha;
    private $costo;
    private $objusuario;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idCompra = "";
        $this->cofecha = null;
        $this->costo = "";
        $this->objusuario = null;
        $this->mensajeoperacion = "";
    }

    public function setear($idcompra, $cofecha, $costo, $objusuario)
    {
        $this->setidcompra($idcompra);
        $this->setcofecha($cofecha);
        $this->setcosto($costo);
        $this->setobjusuario($objusuario);
    }

    //metodos de acceso

    public function getidcompra()
    {
        return $this->idcompra;
    }
    public function setidcompra($param)
    {
        $this->idcompra = $param;
    }

    public function getcofecha()
    {
        return $this->cofecha;
    }
    public function setcofecha($param)
    {
        $this->cofecha = $param;
    }

    public function getcosto()
    {
        return $this->costo;
    }

    public function setcosto($param)
    {
        $this->costo = $param;
    }

    public function getobjusuario()
    {
        return $this->objusuario;
    }
    public function setobjusuario($param)
    {
        $this->objusuario = $param;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($param)
    {
        $this->mensajeoperacion = $param;
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM compra WHERE idcompra = " . $this->getidcompra();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    //--
                    $objusuario = new Usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    //--
                    $this->setear($row['idcompra'], $row['cofecha'], $row['costo'], $objusuario);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("compra->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "INSERT INTO compra(idcompra, cofecha, costo, idusuario)
                VALUES ('" . $this->getidcompra() . "', '" . $this->getcofecha() . "', '" . $this->getcosto() . "', '" . $this->getobjusuario()->getidusuario() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("compra->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("compra->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE compra SET
            cofecha='" . $this->getcofecha() . "', costo='" . $this->getcosto() . "', idusuario='" . $this->getobjusuario()->getidusuario() . "' WHERE idcompra='" . $this->getidcompra() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("compra->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("compra->modificar: " . $base->getError());
        }
        return $resp;
    }
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "DELETE FROM compra WHERE idcompra=" . $this->getidcompra();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("compra->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("compra->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM compra ";
        if ($parametro != "") {
            $sql .= "WHERE " . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Compra();
                    //--
                    $objusuario = new Usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    //--
                    $obj->setear($row['idcompra'], $row['cofecha'], $row['costo'], $objusuario);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("compra->listar " . $base->getError());
        }
        return $arreglo;
    }
}