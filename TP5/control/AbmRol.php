<?php

class AbmRol
{

    public function obtenerRolPorId($id)
    {
        $rol = new Rol();
        $arregloBusqueda = $rol->listar("idRol = " . $id);
        if (!empty($arregloBusqueda)) {
            return $arregloBusqueda;
        } else {
            return null;
        }
    }

    public function agregarRol($rolDescripcion)
    {
        $rol = new Rol();
        $rol->setear(null, $rolDescripcion);
        $mensaje = "";

        if ($rol->insertar()) {
            $mensaje = "Rol agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el rol: " . $rol->getMensajeOperacion();
        }
        return $mensaje;
    }

public function actualizarRol($idRol, $rolDescripcion)
    {
        $rol = new Rol();
        $rolExistente = $rol->listar("idRol = " . $idRol);
        $mensaje = "";

        if (!empty($rolExistente)) {
            $rol->setear($idRol, $rolDescripcion);
            if ($rol->modificar()) {
                $mensaje = "Rol actualizado correctamente.";
            } else {
                $mensaje = "Error al actualizar el rol: " . $rol->getMensajeOperacion();
            }
        } else {
            $mensaje = "Rol no encontrado.";
        }
        return $mensaje;
    }

    public function eliminarRol($idRol)
    {
        $rol = new Rol();
        $rolExistente = $rol->listar("idRol = " . $idRol);
        $mensaje = "";

        if (!empty($rolExistente)) {
            $rol->setIdRol($idRol);
            if ($rol->eliminar()) {
                $mensaje = "Rol eliminado correctamente.";
            } else {
                $mensaje = "Error al eliminar el rol: " . $rol->getMensajeOperacion();
            }
        } else {
            $mensaje = "Rol no encontrado.";
        }
        return $mensaje;
    }


}