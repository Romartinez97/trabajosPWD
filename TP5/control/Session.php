<?php

class Session
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function iniciar($nombreUsuario, $psw)
    {
        $resp = false;
        $obj = new AbmUsuario();
        $param['usmail'] = $nombreUsuario;
        $param['uspass'] = $psw;

        error_log("Iniciando sesión para: usmail = $nombreUsuario, uspass = $psw");

        $resultado = $obj->buscar($param);
        if (count($resultado) > 0) {
            $usuario = $resultado[0];
            $_SESSION['idUsuario'] = $usuario->getIdUsuario();
            $resp = true;
            error_log("Usuario encontrado: idUsuario = " . $usuario->getIdUsuario());
        } else {
            $this->cerrar();
            error_log("Usuario no encontrado o contraseña incorrecta.");
        }
        return $resp;
    }

    public function validar()
    {
        return isset($_SESSION['idUsuario']);
    }

    /**
     * Devuelve true o false si la sesión está activa o no
     * @return bool
     */
    public function activa()
    {
        $resp = false;
        if (session_status() === PHP_SESSION_ACTIVE) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * Devuelve el usuario logueado
     * @return mixed
     */
    public function getUsuario()
    {
        $usuario = null;
        if ($this->validar()) {
            $obj = new AbmUsuario();
            $idUsuario = $_SESSION['idUsuario'];
            $usuario = $obj->obtenerUsuarioPorId($idUsuario);
        }
        return $usuario;
    }

    /**
     * Devuelve el rol del usuario logueado
     * @return mixed
     */
    public function getRol()
    {
        $listaRoles = null;
        if ($this->validar()) {
            $obj = new AbmUsuario();
            $idUsuario = $_SESSION['idUsuario'];
            $resultado = $obj->obtenerRolesUsuario($idUsuario);
            if (count($resultado) > 0) {
                $listaRoles = $resultado;
            }
        }
        return $listaRoles;
    }

    public function cerrar()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}
?>