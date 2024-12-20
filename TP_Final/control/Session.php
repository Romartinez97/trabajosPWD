<?php

class Session
{

    public function __construct()
    {
        session_start();
    }

    /**
     * Actualiza las variables de sesion con los valores ingresados.
     */
    public function iniciar($mailUsuario, $psw)
    {
        $resp = false;
        $obj = new AbmUsuario();
        $param['mail'] = $mailUsuario;
        $param['uspass'] = $psw;
        $resultado = $obj->buscar($param);
        if (count($resultado) > 0) {
            $usuario = $resultado[0];
            $_SESSION['idusuario'] = $usuario->getIdUsuario();
            $resp = true;
        } else {
            $this->cerrar();
        }
        return $resp;
    }

    /**
     * valida si la seison actual tiene usuario y psw validos.
     */
    public function validar()
    {
        $resp = false;
        if ($this->activa() && isset($_SESSION['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * devuelve true o false si la sesion esta activa o no.
     */
    public function activa()
    {
        $resp = false;
        if (session_status() == PHP_SESSION_ACTIVE) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * devuelve el usuario logeado.
     */
    public function getUsuario()
    {
        $usuario = null;
        if ($this->validar()) {
            $obj = new AbmUsuario();
            $param['idusuario'] = $_SESSION['idusuario'];
            $resultado = $obj->buscar($param);
            if (count($resultado) > 0) {
                $usuario = $resultado[0]->getidusuario();
            }
        }
        return $usuario;
    }

    /**
     * devuelve el rol del usuario logeado.
     */
    public function getRol()
    {
        $rol = null;
        if ($this->validar()) {
            $obj = new AbmUsuariorol();
            $param['idusuario'] = $_SESSION['idusuario'];
            $resultado = $obj->buscar($param);
            if (count($resultado) > 0) {
                $usuariorol = $resultado[0];
                $rol = $usuariorol->getobjrol()->getidrol();
            }
        }
        return $rol;
    }

    public function cerrar()
    {
        session_unset();
        session_destroy();
        $resp = true;
        return $resp;
    }

    public function estaLogueado()
    {
        return isset($_SESSION['idusuario']);
    }

    public function puedeIngresar()
    {
        $resp = false;
        if ($this->estaLogueado()) {
            $idrol = $this->getRol();
            if ($idrol) {

                $nombreArchivo = basename($_SERVER['PHP_SELF']);
                $url = "../pagsRestringidas/" . $nombreArchivo;

                $menu = new AbmMenu();
                $param = ['medescripcion' => $url];
                $menus = $menu->buscar($param);

                if (!empty($menus)) {
                    $menuRol = new AbmMenurol();
                    $param = ['idmenu' => $menus[0]->getidmenu(), 'idrol' => $idrol];
                    $menusRol = $menuRol->buscar($param);

                    if (!empty($menusRol)) {
                        $resp = true;
                    }
                }
            }
        }

        return $resp;
    }

    public function esPaginaPublica()
    {
        $urlPublico = strpos($_SERVER['REQUEST_URI'], 'pagsPublicas') !== false;
        if ($urlPublico) {
            return true;
        }
        return false;
    }


}