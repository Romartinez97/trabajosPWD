<?php

class AbmUsuario
{

    public function obtenerUsuarioPorId($id)
    {
        $usuario = new Usuario();
        $arregloBusqueda = $usuario->listar("idUsuario = " . $id);
        if (!empty($arregloBusqueda)) {
            return $arregloBusqueda[0]; // Retorna el primer objeto usuario
        } else {
            return null;
        }
    }

    public function agregarUsuario($param)
    {
        $usuario = new Usuario();
        $usuario->setear($param["idusuario"], $param["usnombre"], $param["uspass"], $param["usmail"], $param["usdeshabilitado"]);
        $mensaje = "";

        if ($usuario->insertar()) {
            $mensaje = "Usuario agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el usuario: " . $usuario->getMensajeOperacion();
        }
        return $mensaje;
    }

    public function actualizarUsuario($param)
    {
        $usuario = new Usuario();
        $usuarioExistente = $usuario->listar("idUsuario = " . $param["idusuario"]);
        $mensaje = "";

        if (!empty($usuarioExistente)) {
            $usuario->setear($param["idusuario"], $param["usnombre"], $param["uspass"], $param["usmail"], $param["usdeshabilitado"]);
            if ($usuario->modificar()) {
                $mensaje = "Usuario actualizado correctamente.";
            } else {
                $mensaje = "Error al actualizar el usuario: " . $usuario->getMensajeOperacion();
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }
        return $mensaje;
    }

    public function eliminarUsuario($idUsuario)
    {
        $usuario = new Usuario();
        $usuarioExistente = $usuario->listar("idUsuario = " . $idUsuario);
        $mensaje = "";

        if (!empty($usuarioExistente)) {
            $usuario->setIdUsuario($idUsuario);
            if ($usuario->eliminar()) {
                $mensaje = "Usuario eliminado correctamente.";
            } else {
                $mensaje = "Error al eliminar el usuario: " . $usuario->getMensajeOperacion();
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }
        return $mensaje;
    }

    public function buscar($param)
    {
        error_log("Buscando usuario con parámetros: " . print_r($param, true));
        $usuario = new Usuario();
        $where = "true";
        if ($param !== null) {
            if (isset($param['usmail'])) {
                $where .= " AND usmail = '" . $param['usmail'] . "'";
            }
            if (isset($param['uspass'])) {
                $where .= " AND uspass = '" . $param['uspass'] . "'";
            }
        }
        $resultado = $usuario->listar($where);
        error_log("Resultado de la búsqueda: " . print_r($resultado, true));
        return $resultado;
    }



    public function agregarRol($param)
    {
        $usuario = new Usuario();
        $usuarioExistente = $usuario->listar("idUsuario = " . $param["idusuario"]);
        $mensaje = "";
        if (!empty($usuarioExistente)) {
            $usuarioRol = new UsuarioRol();
            $usuarioRolExistente = $usuarioRol->listar("idusuario = " . $param["idusuario"] . " AND idrol = " . $param["idrol"]);
            if (empty($usuarioRolExistente)) {
                $usuarioRol->setear($param["idusuario"], $param["idrol"]);
                if ($usuarioRol->insertar()) {
                    $mensaje = "Rol agregado correctamente al usuario.";
                } else {
                    $mensaje = "Error al agregar el rol: " . $usuarioRol->getMensajeOperacion() . " al usuario.";
                }
            } else {
                $mensaje = "El usuario ya tiene este rol.";
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }

        return $mensaje;
    }

    public function obtenerRolesPorUsuario($idUsuario)
    {
        $usuarioRol = new UsuarioRol();
        $roles = $usuarioRol->listar("idusuario = " . $idUsuario);
        $rolesDescripcion = [];
        foreach ($roles as $rol) {
            $rolObj = new Rol();
            $rolObj->setIdRol($rol->getIdRol());
            if ($rolObj->cargar()) {
                $rolesDescripcion[] = $rolObj->getRolDescripcion();
            }
        }
        return $rolesDescripcion;
    }

    public function eliminarRol($param)
    {
        $usuarioRol = new UsuarioRol();
        $usuarioRolExistente = $usuarioRol->listar("idusuario = " . $param["idusuario"] . " AND idrol = " . $param["idrol"]);
        $mensaje = "";

        if (!empty($usuarioRolExistente)) {
            $usuarioRol->setear($param["idusuario"], $param["idrol"]);
            if ($usuarioRol->eliminar()) {
                $mensaje = "Rol eliminado correctamente del usuario.";
            } else {
                $mensaje = "Error al eliminar el rol: " . $usuarioRol->getMensajeOperacion() . " del usuario.";
            }
        } else {
            $mensaje = "Rol no encontrado en el usuario.";
        }

        return $mensaje;
    }

    public function borradoLogico($idUsuario)
    {
        $resp = false;
        $base = new BaseDatosPDO();
        $sql = "UPDATE usuario SET usDeshabilitado = 1 WHERE idUsuario = " . $idUsuario;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
                $mensaje = "Usuario deshabilitado correctamente.";
            } else {
                $mensaje = "Error al deshabilitar el usuario: " . $base->getError();
                error_log($mensaje);
            }
        } else {
            $mensaje = "Error al iniciar la base de datos: " . $base->getError();
            error_log($mensaje);
        }
        return $mensaje;
    }

}