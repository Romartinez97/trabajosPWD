<?php

if (file_exists('../configuracion.php')) {
    include_once '../configuracion.php';
} elseif (file_exists('../../configuracion.php')) {
    include_once '../../configuracion.php';
} elseif (file_exists('configuracion.php')) {
    include_once 'configuracion.php';
}

function data_submitted()
{
    $datos = array();
    if (!empty($_POST)) {
        foreach ($_POST as $clave => $valor) {
            $datos[$clave] = $valor;
            if ($valor == "") {
                $datos[$clave] = 'null';
            }
        }
    } else {
        if (!empty($_GET)) {
            foreach ($_GET as $clave => $valor) {
                $datos[$clave] = $valor;
                if ($valor == "") {
                    $datos[$clave] = 'null';
                }
            }
        }
    }
    return $datos;
}

function verEstructura($e)
{
    echo "<pre>";
    print_r($e);
    echo "<pre>";
}

function my_autoloader($class_name)
{
    if (!isset($_SESSION['ROOT'])) {
        echo "Autoloader: ROOT not set in session.\n";
        return;
    }
    // Directorios donde se buscaran las clases
    $directories = array(
        $_SESSION['ROOT'] . 'control/',
        $_SESSION['ROOT'] . 'modelo/',
        $_SESSION['ROOT'] . 'modelo/conector/',
    );
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once($file);
            return;
        }
    }
}

spl_autoload_register('my_autoloader');

?>