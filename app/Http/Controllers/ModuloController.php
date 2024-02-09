<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;

class ModuloController extends Controller
{
    // Funcion para manejar la lógica para obtener los modulos según los permisos del usuario
    function mostrarModulos()
    {
        $modulos = new Modulo();
        $modulos = json_decode($modulos->obtenerModulos(), true);

        session_start();
        $permisos = $_SESSION['permisos'];

        if(is_string($permisos)) {
            $permisos = [$permisos];
        }

        $permisosNecesarios = ['Lectura', 'Edicion', 'Eliminacion'];

        if (count(array_intersect($permisos, $permisosNecesarios)) == count($permisosNecesarios))
        {
            $tienePermisos = true;
        } else {
            $tienePermisos = false;
        }

        if ($_SESSION['alias'] != "cliente" && $tienePermisos)
        {
            return response()->json(["modulos" => $modulos]);
        } else {
            return response()->json(["respuesta" => false]);
        }
    }
}
