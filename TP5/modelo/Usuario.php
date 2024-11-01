<?php

class Usuario
{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = "";
        $this->usDeshabilitado = "";
        $this->mensajeOperacion = "";
    }


    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getUsNombre()
    {
        return $this->usNombre;
    }

    public function setUsNombre($usNombre)
    {
        $this->usNombre = $usNombre;
    }

    public function getUsPass()
    {
        return $this->usPass;
    }

    public function setUsPass($usPass)
    {
        $this->usPass = $usPass;
    }

    public function getUsMail()
    {
        return $this->usMail;
    }

    public function setUsMail($usMail)
    {
        $this->usMail = $usMail;
    }

    public function getUsDeshabilitado()
    {
        return $this->usDeshabilitado;
    }

    public function setUsDeshabilitado($usDeshabilitado)
    {
        $this->usDeshabilitado = $usDeshabilitado;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function setear($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM usuario WHERE idUsuario = " . $this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Usuario->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "INSERT INTO usuario (idUsuario, usNombre, usPass, usMail, usDeshabilitado)
        VALUES ('" . $this->getIdUsuario() . "', '" . $this->getUsNombre() . "', '" . $this->getUsPass() . "', '" . $this->getUsMail() . "', '" . $this->getUsDeshabilitado() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE usuario SET
            idUsuario='" . $this->getIdUsuario() . "', usNombre='" . $this->getUsNombre() . "', usPass='" . $this->getUsPass() . "', usMail='" . $this->getUsMail() . "', usDeshabilitado='" . $this->getUsDeshabilitado() . "' 
            WHERE idUsuario='" . $this->getIdUsuario() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "DELETE FROM usuario WHERE idUsuario=" . $this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatosPDO();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Usuario();
                    $obj->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Usuario->listar: " . $base->getError());
        }
        return $arreglo;
    }

}