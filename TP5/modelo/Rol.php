<?php

class Rol
{

    private $idRol;
    private $rolDescripcion;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idRol = "";
        $this->rolDescripcion = "";
        $this->mensajeOperacion = "";
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setRolDescripcion($rolDescripcion)
    {
        $this->rolDescripcion = $rolDescripcion;
    }

    public function getRolDescripcion()
    {
        return $this->rolDescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setear($idRol, $rolDescripcion)
    {
        $this->setIdRol($idRol);
        $this->setRolDescripcion($rolDescripcion);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM rol WHERE idrol = " . $this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['roldescripcion']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Rol->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "INSERT INTO rol(idrol, roldescripcion) VALUES('" . $this->getIdRol() . "','" . $this->getRolDescripcion() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE rol SET
        idrol='" . $this->getIdRol() . "', roldescripcion='" . $this->getRolDescripcion() . "' WHERE idrol='" . $this->getIdRol() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "DELETE FROM rol WHERE idrol=" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM rol ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Rol();
                    $obj->setear($row['idrol'], $row['roldescripcion']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Rol->listar: " . $base->getError());
        }
        return $arreglo;
    }

}