<?php

class UsuarioRol
{

    private $idUsuario;
    private $idRol;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idUsuario = "";
        $this->idRol = "";
        $this->mensajeOperacion = "";
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setear($idUsuario, $idRol)
    {
        $this->setIdUsuario($idUsuario);
        $this->setIdRol($idRol);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM usuario_rol WHERE idUsuario = " . $this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idUsuario'], $row['idRol']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "INSERT INTO usuario_rol(idUsuario, idRol) VALUES('" . $this->getIdUsuario() . "','" . $this->getIdRol() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE usuario_rol SET
            idUsuario='" . $this->getIdUsuario() . "', idRol='" . $this->getIdRol() . "' WHERE idUsuario='" . $this->getIdUsuario() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "DELETE FROM usuario_rol WHERE idUsuario=" . $this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM usuario_rol ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new UsuarioRol();
                    $obj->setear($row['idusuario'], $row['idrol']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->listar: " . $base->getError());
        }
        return $arreglo;
    }

}