<?php

class AbmUsuario
{

    public function obtenerUsuarioPorId($id)
    {
        $usuario = new Usuario();
        $arregloBusqueda = $usuario->listar("idUsuario = " . $id);
        if (!empty($arregloBusqueda)) {
            return $arregloBusqueda;
        } else {
            return null;
        }
    }

    public function agregarUsuario($usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $usuario = new Usuario();
        $usuario->setear(null, $usNombre, $usPass, $usMail, $usDeshabilitado);
        $mensaje = "";

        if ($usuario->insertar()) {
            $mensaje = "Usuario agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el usuario: " . $usuario->getMensajeOperacion();
        }
        return $mensaje;
    }

    public function actualizarUsuario($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $usuario = new Usuario();
        $usuarioExistente = $usuario->listar("idUsuario = " . $idUsuario);
        $mensaje = "";

        if (!empty($usuarioExistente)) {
            $usuario->setear($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado);
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



}