<?php

class Session
{

    /**
     * Constructor que inicia la sesión
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Actualiza las variables de sesión con los valores ingresados
     * @param mixed $nombreUsuario
     * @param mixed $psw
     * @return bool
     */
    public function iniciar($nombreUsuario, $psw)
    {
        $resp = false;
        if ($this->validar($nombreUsuario, $psw)) {
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            $resp = true;
        }
        return $resp;
    }

    /**
     * Valida si la sesión actual tiene usuario y contraseña válidos.
     * @param mixed $nombreUsuario
     * @param mixed $psw
     * @return bool
     */
    public function validar($nombreUsuario, $psw)
    {
        $resp = false;
        $usuario = new Usuario();
        $arreglo = $usuario->listar("usNombre = '" . $nombreUsuario . "'");
        if (count($arreglo) > 0) {
            if ($arreglo[0]->getUsPass() == $psw) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * Devuelve true o false si la sesión está activa o no
     * @return bool
     */
    public function activa()
    {
        if (isset($_SESSION['nombreUsuario'])) {
            return true;
        }
        return false;
    }

    /**
     * Devuelve el usuario logueado
     * @return mixed
     */
    public function getUsuario()
    {
        if (isset($_SESSION['nombreUsuario'])) {
            return $_SESSION['nombreUsuario'];
        }
        return null;
    }

    /**
     * Devuelve el rol del usuario logueado
     * @return mixed
     */
    public function getRol()
    {
        if (isset($_SESSION['rol'])) {
            return $_SESSION['rol'];
        }
        return null;
    }

    /**
     * Cierra la sesión actual
     * @return void
     */
    public function cerrar()
    {
        session_unset();
        session_destroy();
    }

}